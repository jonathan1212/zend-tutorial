<?php
namespace GDI;

return array(

	'doctrine' => array(
        'driver' => array(
            'gdi_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array( __DIR__ . '/../src/GDI/Entity')
            ),
            'gdi_model' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/GDI/Model')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'GDI\Entity' => 'gdi_entities',
                    'GDI\Model' => 'gdi_model'
                )
            ),
            /*'cache' => array(
                'class' => 'Doctrine\Common\Cache\ApcCache'
            ),

            'configuration' => array(
                'orm_default' => array(
                    'metadata_cache' => 'apc',
                    'query_cache'    => 'apc',
                    'result_cache'   => 'apc'
                )
            ),*/
        )
    ),

    'controllers' => array(
        'invokables' => array(
            'GDI\Controller\Index' => 'GDI\Controller\IndexController',
            'GDI\Controller\Index2' => 'GDI\Controller\Index2Controller',
        ),
    ),

    'form_elements' => array(
        'factories' => array(
            'GDI\Form\TMarketProductForm' => 'GDI\Factory\Form\MarketProductFactory',
        ),
    ),

    'router' => array(
        'routes' => array(
            'gdi' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/gdi[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'GDI\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'gdi2' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/gdi2[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'GDI\Controller\Index2',
                        'action'     => 'add',
                    ),
                ),
            ),

        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);