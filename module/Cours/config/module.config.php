<?php 
return array(
     'controllers' => array(
         'invokables' => array(
             'Classe\Controller\Classe' => 'Classe\Controller\ClasseController',
         ),
     ),
          // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'classe' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/classe[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Classe\Controller\Classe',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
     'view_manager' => array(
         'template_path_stack' => array(
             'classe' => __DIR__ . '/../view',
         ),
     ),
 );
?>