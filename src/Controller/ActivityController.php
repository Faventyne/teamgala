<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:49
 */
namespace Controller;

use Form\AddActivityCriteriaForm;
use Form\AddActivityParticipantsForm;
use Form\UserForm;
use Model\Activity;
use Model\ActivityUser;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Model\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Model\Criterion;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class ActivityController
{


    //ACTIVITY CREATION

    // 1st step - criterion definition (limited to activity manager)

    public function addCriterionAction(Request $request, Application $app){

        $criterion = new Criterion() ;
        $activity = new Activity();
        $entityManager=$this->getEntityManager($app);
        $formFactory = $app['form.factory'] ;
        $criterionForm = $formFactory->create(AddActivityCriteriaForm::class, $criterion , ['standalone'=>true]) ;
        $criterionForm->handleRequest($request);

        if ($criterionForm->isSubmitted()){
            if ($criterionForm->isValid()){

                //Settings activity parameters before inserting ("forcing") foreign key act_id in criterion
                $activity->setDeadline($criterionForm->get('deadline')->getData());
                $activity->setVisibility($criterionForm->get('visibility')->getData());
                $activity->setObjectives($criterionForm->get('objectives')->getData());
                $activity->setName($criterionForm->get('name')->getData());
                $entityManager->persist($activity);
                $entityManager->flush();
                $activityId = $activity->getId();
                $criterion->setActId($activityId);
                $entityManager->persist($criterion);
                $entityManager->flush();
                $_SESSION['created_act_id']=$activityId;

                return $app->redirect($app['url_generator']->generate('activityCreationParticipants',['actId' => $activityId]));




                /*
                //Subrequest to get to participants and keep param values with post method
                // as activity will not be inserted in DB till act mgr does not finish activity creation
                $subrequest = Request::create($app['url_generator']->generate('activityCreationParticipants'), 'POST', $_POST, $_COOKIE, $_FILES, $_SERVER);
                $app->handle($subrequest,HttpKernelInterface::SUB_REQUEST);
                */
            //return $app->redirect($app['url_generator']->generate('activityCreationParticipants'));
            } else {
                return $criterionForm->getErrors();
            }
        }

        return $app['twig']->render('criteria_list.twig',
                [
                    'form' => $criterionForm->createView()
                ]) ;
    }

    // 2 - Display participants to be added

    public function addParticipantsAction(Request $request, Application $app, $actId){

        // Get all participants (users)
        $entityManager = $this->getEntityManager($app) ;
        $activityuser = new ActivityUser();
        $repository = $entityManager->getRepository(\Model\User::class);
        $result = [];
        foreach ($repository->findAllActive() as $user) {
            $result[] = $user->toArray($app);
        }

        return $app['twig']->render('participants_list.html.twig',
            [
                'participants' => $result,
            ]);


    }


    //AJAX call which inserts users in created activity

    public function insertParticipantsAction(Request $request, Application $app, $actId){

        // Get all participants (users)
        $entityManager = $this->getEntityManager($app) ;

        //return print_r($_POST['parId'])

        foreach ($_POST['usrId'] as $usrId) {
            $activityuser = new ActivityUser();
            $activityuser->setActId($actId);
            $activityuser->setUsrId($usrId);
            $entityManager->persist($activityuser);


        }
        $entityManager->flush();

        return true;

        /*
        return $app['twig']->render('participants_list.html.twig',
            [
                'participants' => $result,
                //'form' => $participantsForm->createView()
            ]);
        */

    }



    //Update activity (limited to activity manager)
    public function modifyActivityAction(Request $request, Application $app){

    }
    //Delete activity (limited to HR)
    public function deleteActivityAction(Request $request, Application $app){

    }

    /*********** ADDITION, MODIFICATION, DELETION AND DISPLAY OF PARTICIPANTS *****************/

    // Display all participants (after Activity Mgr sets activities parameters)
    public function getAllParticipantsAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app) ;
        $repository = $entityManager->getRepository(\Model\User::class);
        $result = [];
        foreach ($repository->findAll() as $user) {
            $result[] = $user->toArray();
        }

        return $app['twig']->render('participants_list.html.twig',
            [
                'users' => $result
            ]) ;

    }

    //Display selected activity (all users)
    public function viewAction(Request $request, Application $app){
        $repository = $app['orm.em']->getRepository(Activity::class);

    }

    //Grade an activity (all users)
    public function gradeAction(Request $request, Application $app){
        $repository = $app['orm.em']->getRepository(Activity::class);

    }

    //Grade an activity (all users)
    public function resultsAction(Request $request, Application $app){
        $repository = $app['orm.em']->getRepository(Activity::class);

    }

    // Display all organization activities (limited to HR)
    public function getAllOrganizationActivitiesAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Activity::class);
        $result = [];
        foreach ($repository->findAll() as $activity) {
            $result[] = $activity->toArray();
        }

        return $app['twig']->render('activities_list.html.twig',
            [
                'activities' => $result
            ]) ;

    }

    // Display all activities for current user
    public function getAllUserActivitiesAction(Request $request, Application $app){
        $id = $app['security.token_storage']->getToken()->getUser()->getId();
        $sql = "SELECT * FROM activity INNER JOIN activity_user ON activity_user.activity_act_id=activity.act_id INNER JOIN user ON user.usr_id=activity_user.user_usr_id WHERE user.usr_id=:id";
        $pdoStatement = $app['db']->prepare($sql) ;
        $pdoStatement->bindValue(':id',$id);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll();
        return print_r($result);
        /*
        $repository = $entityManager->getRepository(Activity::class);
        $result = [];
        foreach ($repository->findByUsrId() as $activity) {
            $result[] = $activity->toArrayUser();
        }

        return $app['twig']->render('activities_list.html.twig',
            [
                'activities' => $result
            ]) ;
                */
    }


    /*Optional : release an activity (all users)
    public function resultsAction(Request $request, Application $app){
        $repository = $app['orm.em']->getRepository(Activity::class);
    */

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager (Application $app) {
        return $app['orm.em'] ;
    }
}
