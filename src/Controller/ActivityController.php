<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:49
 */
namespace Controller;

use Form\AddCriterionForm;
use Form\UserForm;
use Model\Activity;
use Model\ActivityUser;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Model\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Model\Criterion;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ActivityController
{


    //Activity creation - 1st step - criterion definition (limited to activity manager)

    public function addCriterionAction(Request $request, Application $app){

        $criterion = new Criterion() ;
        $formFactory = $app['form.factory'] ;
        $activityForm = $formFactory->create(AddCriterionForm::class, $criterion , ['standalone'=>true]) ;
        $activityForm->handleRequest($request);

        if ($activityForm->isSubmitted()){
            if ($activityForm->isValid()){
            return $app->redirect($app['url_generator']->generate('activityCreationParticipants'));
            } else {
            return $activityForm->getErrors();
            }
        }

        return $app['twig']->render('activity.html.twig',
                [
                    'form' => $activityForm->createView()
                ]) ;
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

        return $app['twig']->render('organization_activities_list.html.twig',
            [
                'organization_activities' => $result
            ]) ;

    }

    // Display all activities for current user
    public function getAllUserActivitiesAction(Request $request, Application $app, $id){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Activity::class);
        $result = [];
        foreach ($repository->findByUsrId() as $activity) {
            $result[] = $activity->toArrayUser();
        }

        return $app['twig']->render('user_activities_list.html.twig',
            [
                'users_activities' => $result
            ]) ;

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
