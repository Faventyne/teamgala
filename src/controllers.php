<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//Request::setTrustedProxies(array('127.0.0.1'));

// Login page
$routeLogin = $app->get('/', "Controller\UserController::loginAction") ;
$routeLogin->bind('login') ;

// Home page
$routeHome = $app->get('/home', "Controller\UserController::homeAction") ;
$routeHome->bind('home') ;

// Profile page
$routeProfile = $app->get('/profile', "Controller\UserController::profileAction") ;
$routeProfile->bind('profile') ;

// My activities page
$routeMyActivities = $app->get('/myactivities', "Controller\ActivityController::myActivitiesAction") ;
$routeMyActivities->bind('myActivities') ;

// Activity configuration page
$routeActivityConfiguration = $app->get('/activity/configuration', "Controller\ActivityController::addActivityAction") ;
$routeActivityConfiguration->bind('activityConfiguration') ;

// Activity grade page
$routeActivityGrade = $app->get('/activity/grade', "Controller\ActivityController::gradeAction") ;
$routeActivityGrade->bind('activityGrade') ;

// Activity view page
$routeActivityView = $app->get('/activity/view', "Controller\ActivityController::viewAction") ;
$routeActivityView->bind('activityView') ;

// Activity results page
$routeActivityResults = $app->get('/activity/results', "Controller\ActivityController::resultsAction") ;
$routeActivityResults->bind('activityResults') ;

// Settings organization page
$routeSettingsOrganization = $app->get('/settings/organization', "Controller\OrganizationController::addOrganizationAction") ;
$routeSettingsOrganization->bind('settingsOrganization') ;

// Settings user page
$routeSettingsUser = $app->get('/settings/users', sprintf('%s::getAllUsersAction', \Controller\UserController::class)) ;
$routeSettingsUser->bind('settingsUser') ;

// Settings position page
$routeSettingsPosition = $app->get('/settings/position-weight', "Controller\UserController::positionWeightAction") ;
$routeSettingsPosition->bind('settingsPositionWeight') ;

/* AJAX */
$routeAjaxUserGet = $app->get('/ajax/user/{id}', "Controller\UserController::findById") ;
$routeAjaxUserGet->bind('ajaxUserGet');

$routeAjaxUserAdd = $app->post('/ajax/user', "Controller\UserController::addUserAction") ;
$routeAjaxUserAdd->bind('ajaxUserAdd');

$routeAjaxUserModifiy = $app->post('/ajax/user/{id}', "Controller\UserController::modifyUserAction") ;
$routeAjaxUserModifiy->bind('ajaxUserModify');

$routeAjaxUserDelete = $app->delete('/ajax/user/{id}', "Controller\UserController::deleteUserAction") ;
$routeAjaxUserDelete->bind('ajaxUserDelete') ;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
