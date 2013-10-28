<?php
return array(
	'router' => array(
        'routes' => array(
            'contact-us' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/contact-us',
                    'defaults' => array(
                        'controller' => 'BillyctContactus\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'contact-us-list' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/contact-us/list',
                    'defaults' => array(
                        'controller' => 'BillyctContactus\Controller\Index',
                        'action'     => 'list',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'BillyctContactus\Controller\Index' => 'BillyctContactus\Controller\IndexController'
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'billyct-contact-us' => array(
    	'mongo' => array(
    		'server' => 'mongodb://127.0.0.1',
    		'db' => 'contact',
    		'collection' => 'contact'
    	)
    )
);