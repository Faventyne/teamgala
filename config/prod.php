<?php

// configure your app for the production environment
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;

require_once __DIR__.'/../Credentials/config.php';


$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app->register(
    new Silex\Provider\DoctrineServiceProvider(),
    [
        'db.options' => [
            'driver'   => 'pdo_mysql',
            'dbname'   => 'guillaumec_serpico',
            'host'     => 'wf3.progweb.fr',
            'user'     => 'guillaumec',
            'password' => 'webforce3'
        ]
    ]
);

$app->register(
    new DoctrineOrmServiceProvider(),
    [
        'orm.proxies.dir' => sys_get_temp_dir(),
        'orm.em.options' => [
            'mappings' => [
                [
                    'type' => 'annotation',
                    'namespace' => 'Model',
                    'path' => __DIR__.'/../src/Model'
                ]
            ]
        ]
    ]
);
$app->register(new Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider(),
        [
            'orm.proxies.dir' => sys_get_temp_dir(),
            'orm.em.options' => [
                'mappings' => [
                    [
                        'type'      => 'annotation',
                        'namespace' => 'Model',
                        'path'      => __DIR__.'/../src/Model'
                    ]
                ]
            ]
        ]
);

// Security and firewall
$app->register(new Silex\Provider\SecurityServiceProvider(),
        [
            'security.firewalls' => [
                'logged' => [
                    'pattern' => '^/.+$',
                    'http' => true,
                    'users' => function () use ($app) {
                        $repository = $app['orm.em']->getRepository(\Model\User::class);
                        return new Provider\DBUserProvider($repository) ;
                    },
                    'form' => [
                        'login_path' => '/',
                        'check_path' => '/admin/login_check'
                    ], /*
                    'logout' => [
                        'logout_path' => '/admin/logout',
                        'invalide_session' => true,
                        'target_url' => '/'
                    ], */
                ],
            ],          
            'security.role_hierarchy' => [
                'COLLABORATOR' => [],
                'ACTIVITY_MANAGER' => ['COLLABORATOR'],
                'HR' => ['COLLABORATOR','ACTIVITY_MANAGER'],
                'ADMIN' => ['COLLABORATOR','ACTIVITY_MANAGER','HR']   
            ],
            'security.default_encoder' => function() {
                return new Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder() ;
            },
            'security.access_rules' => [
                ['^/activity.*$', 'ACTIVITY_MANAGER'],
                ['^/settings/users/create', 'ADMIN']
            ]
        ]
);
            
// SwiftMailer
$app->register(new Silex\Provider\SwiftmailerServiceProvider());
$app['swiftmailer.options'] = array(
    'host' => 'smtp.gmail.com',
    'port' => '25',
    'username' => $mailProvider['username'],
    'password' => $mailProvider['password'],
    'encryption' => 'tls',
    'auth_mode' => null,
    'stream_context_options' => [
        'ssl' => [
            'allow_self_signed' => true, 
            'verify_peer' => false
            ]
    ]
);

$app->register(new \Silex\Provider\SessionServiceProvider()) ;

$app->register(new \Silex\Provider\ValidatorServiceProvider()) ;
$app->register(new Silex\Provider\FormServiceProvider()) ;
$app['locale'] = 'en_en' ;
$app->register(new Silex\Provider\CsrfServiceProvider());

$app->register(new \Silex\Provider\TranslationServiceProvider(),[
    'translator.domains' => []
]) ;