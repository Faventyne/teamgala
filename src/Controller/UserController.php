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
    //Adds user to current organization (limited to HR)
    public function addUserAction(Request $request, Application $app){

    }

    //Logs current user
    public function loginAction(Request $request, Application $app){

    }

    //Displays the menu in relation with user role
    public function homeAction(Request $request, Application $app){

    }

    // Creates user position and weight
    public function addPositionWeightAction(Request $request, Application $app){

    }

    // Updates user position and weight
    public function modifyPositionWeightAction(Request $request, Application $app){

    }

    // Modify user info
    public function modifyUserAction(Request $request, Application $app){

    }

    // Delete user
    public function deleteUserAction(Request $request, Application $app){

    }

    // Display all users
    public function getAllUsersAction(Request $request, Application $app){

    }


}