<?php

// configure your app for the production environment
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;

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

// SwiftMailer
$app->register(new Silex\Provider\SwiftmailerServiceProvider());
$app['swiftmailer.options'] = array(
    'host' => 'smtp.gmail.com',
    'port' => '25',
    'username' => 'alexandre.claudon@gmail.com',
    'password' => 'k6gf1moi',
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