<?php 
return array(
     'controllers' => array(
         'invokables' => array(
             'Cour\Controller\Cour' => 'Cour\Controller\CourController',
         ),
     ),
          // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'cour' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/cour[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Cour\Controller\Cour',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
     'view_manager' => array(
         'template_path_stack' => array(
             'cour' => __DIR__ . '/../view',
         ),
     ),
 );
?>