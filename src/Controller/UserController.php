<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:48
 */

use Form\UserForm;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Model\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Model\Activity;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class UserController
{


    /*********** ADDITION, MODIFICATION, DELETION AND DISPLAY OF USERS *****************/

    //Adds user to current organization (limited to HR)  (ajax call)
    public function addUserAction(Request $request, Application $app){

        if (!$request->request->has('usr_firstname')) {
            $message = 'usr_firstname must be defined';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }

        if (!$request->request->has('usr_lastname')) {
            $message = 'usr_lastname must be defined';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }

        if (!$request->request->has('usr_email')) {
            $message = 'usr_username must be defined';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }

    }

    // Modify user info  (ajax call)
    public function modifyUserAction(Request $request, Application $app){

    }

    // Delete user (ajax call)
    public function deleteUserAction(Request $request, Application $app){

    }

    // Display all users (when HR clicks on "users" from /settings)
    public function getAllUsersAction(Request $request, Application $app){

        $repository = $app['orm.em']->getRepository(\Model\User::class);

        $result = [];
        foreach ($repository->findAll() as $user) {
            $result[] = $user->toArray();
        }

        return $app->json($result);

    }

    /*********** USER LOGIN AND CONTEXTUAL MENU *****************/
    //Logs current user
    public function loginAction(Request $request, Application $app){

    }

    //Displays the menu in relation with user role
    public function homeAction(Request $request, Application $app){

    }

    /*********** ADDITION, MODIFICATION AND DELETION *****************/

    // Creates user position and weight
    public function addPositionWeightAction(Request $request, Application $app){

    }

    // Updates user position and weight
    public function modifyPositionWeightAction(Request $request, Application $app){

    }




}