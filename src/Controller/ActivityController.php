<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:49
 */
namespace Controller;

use Form\UserForm;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Model\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Model\Criterion;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Form\AddActivityForm;
class ActivityController
{
    //Creates an activity (limited to activity manager)
    public function addActivityAction(Request $request, Application $app){
        $criterion = new Criterion() ;
        $formFactory = $app['form.factory'] ;
        $activityForm = $formFactory->create(AddActivityForm::class, $criterion , ['standalone'=>true]) ;
        $activityForm->handleRequest($request) ;
        
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


    //Displays all activities for current user
    public function myActivitiesAction(Request $request, Application $app){
        $repository = $app['orm.em']->getRepository(Activity::class);

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

    /*Optional : release an activity (all users)
    public function resultsAction(Request $request, Application $app){
        $repository = $app['orm.em']->getRepository(Activity::class);
    */
}
