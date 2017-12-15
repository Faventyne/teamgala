<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 05/12/2017
 * Time: 00:48
 */

namespace Controller;

use Form\AddUserForm;
use Form\LogInForm;
use Form\SignUpForm;
use Symfony\Component\HttpFoundation\Request;
use Model\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Model\Activity;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController
{


    /*********** ADDITION, MODIFICATION, DELETION AND DISPLAY OF USERS *****************/

    //Adds user to current organization (limited to HR)
    public function addUserAction(Request $request, Application $app){
        $user = new User() ;
        $formFactory = $app['form.factory'] ;
        $userForm = $formFactory->create(AddUserForm::class, $user, ['standalone'=>true]) ;
        $userForm->handleRequest($request) ;
        

        if ($userForm->isSubmitted() /*&& $userForm->isValid()*/) {
            $token = md5(rand()) ;
            $user->setToken($token) ;
            $entityManager = $app['orm.em'] ;
            $entityManager->persist($user) ;
            $entityManager->flush() ;
            
            // Sending a message to the added user
            $message = \Swift_Message::newInstance()
            ->setSubject('Your Serpico account has been created')
            ->setFrom(array('noreply@serpico.com' => 'no reply'))
            ->setTo(array($user->getEmail()))
            ->setBody("url/password/$token", 'text/plain');
            
            $app['mailer']->send($message);
            $app['swiftmailer.spooltransport']
            ->getSpool()
            ->flushQueue($app['swiftmailer.transport']) ;
            
            return $app->redirect($app['url_generator']->generate('settingsUsers'));
                
        } 
        
        return $app['twig']->render('create_user.html.twig',
                [
                    'form' => $userForm->createView()
                ]) ;


    }
    // Modify pwd
    public function modifyPwdAction (Request $request, Application $app, $token)
    {
        $entityManager = $this->getEntityManager($app) ;
        $repository = $entityManager->getRepository(User::class) ;
        $user = $repository->findOneByToken($token);
        
        $formFactory = $app['form.factory'] ;
        $pwdForm = $formFactory->create(SignUpForm::class, $user, ['standalone' => true]) ;
        $pwdForm->handleRequest($request);
        
        if ($pwdForm->isSubmitted() && $pwdForm->isValid()) {
            $user->setToken('');
            $entityManager->persist($user);
            $entityManager->flush;
        }
        
        return $app['twig']->render('signup.html.twig',
            [
                'user' => $user
            ]); 
    }
    
    // Modify user info  (ajax call)
    public function modifyUserAction(Request $request, Application $app){
            
    }

    // Delete user (ajax call)
    public function deleteUserAction(Request $request, Application $app){

    }

    // Display all users (when HR clicks on "users" from /settings)
    public function getAllUsersAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app) ;
        $repository = $entityManager->getRepository(\Model\User::class);
        $result = [];
        foreach ($repository->findAll() as $user) {
            $result[] = $user->toArray();
        }

        return $app['twig']->render('users_list.html.twig',
                [
                    'users' => $result 
                ]) ;

    }

    /*********** USER LOGIN AND CONTEXTUAL MENU *****************/
    //Logs current user
    public function loginAction(Request $request,Application $app){
        return $app['twig']->render('login.html.twig',
            [
                'error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('security.last_username')
            ]);
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


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager (Application $app) {
        return $app['orm.em'] ;
    }

}