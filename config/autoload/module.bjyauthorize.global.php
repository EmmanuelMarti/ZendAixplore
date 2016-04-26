<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'bjyauthorize' => array(
        // default role for unauthenticated users
        'default_role' => 'guest',
        
        // identity provider service name
        'identity_provider' => 'BjyAuthorize\Provider\Identity\ZfcUserZendDb',
        
        // Role providers to be used to load all available roles into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'role_providers' => array(
            'BjyAuthorize\Provider\Role\ZendDb' => array(
                'table' => 'user_role',
                'role_id_field' => 'role_id',
                'parent_role_field' => 'parent'
            )
        ),
        
        // Guard listeners to be attached to the application event manager
        'guards' => array(
            'BjyAuthorize\Guard\Route' => array(
                array('route' => 'zfcadmin', 'roles' => array('admin')),
                array('route' => 'zfcuser', 'roles' => array('user', 'admin')),
                array('route' => 'zfcuser/logout', 'roles' => array('user', 'admin')),
                array('route' => 'zfcuser/login', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'zfcuser/index', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'zfcuser/authenticate', 'roles' => array( 'guest', 'user', 'admin')),
                array('route' => 'zfcuser/register', 'roles' => array('guest')),
                array('route' => 'home', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'home/logout', 'roles' => array('user', 'admin')),
                array('route' => 'home/login', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'home/authenticate', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'home/register', 'roles' => array('guest')),
                array('route' => 'classe', 'roles' => array('user','admin')),
                array('route' => 'classe/edit', 'roles' => array('admin')),
                array('route' => 'classe/add', 'roles' => array('admin')),
                array('route' => 'classe/delete', 'roles' => array('admin')),
                array('route' => 'topic', 'roles' => array('user','admin')),
                array('route' => 'topic/edit', 'roles' => array('admin')),
                array('route' => 'topic/add', 'roles' => array('admin')),
                array('route' => 'topic/delete', 'roles' => array('admin')),
                array('route' => 'cour', 'roles' => array('user','admin')),
                array('route' => 'cour/edit', 'roles' => array('admin')),
                array('route' => 'cour/add', 'roles' => array('admin')),
<<<<<<< HEAD
                array('route' => 'cour/delete', 'roles' => array('admin'))
=======
                array('route' => 'cour/delete', 'roles' => array('admin')),
>>>>>>> origin/master
            )
        )
    )
);