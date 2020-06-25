<?php
return [
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],
    'admin/dashboard' => [
        'controller' => 'admin',
        'action' => 'dashboard',
    ],
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'admin/add/' => [
        'controller' => 'admin',
        'action' => 'add',
    ],
    'admin/add/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'add',
    ],


];