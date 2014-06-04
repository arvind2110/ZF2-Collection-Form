<?php
return array(
    'router' => array(
        'routes' => array(
            'collection' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/zf2-collection-form',
                    'defaults' => array(
                        '__NAMESPACE__' => 'ZF2CollectionForm\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'ZF2CollectionForm\Controller\Index' => 'ZF2CollectionForm\Controller\IndexController'
        )
    ),
    'view_manager' => array(
        'template_map' => array(
            'zf2-collection-form/index/index' => __DIR__ . '/../view/zf2-collection-form/index/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);
