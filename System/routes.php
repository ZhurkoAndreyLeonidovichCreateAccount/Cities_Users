<?php
return (function(){
    return [
        [
            'path' => '/^\/?$/',
            'controller' => 'Controllers\City',
            'method' => 'index'
        ],
        [
            'path' => '/^City\/add\/?$/',
            'controller' => 'Controllers\City',
            'method'=>'add'
            
        ],
        [
            'path' => '/^City\/edit\/?$/',
            'controller' => 'Controllers\City',
            'method'=>'edit'
            
        ],
        [
            'path' => '/^City\/delete\/?$/',
            'controller' => 'Controllers\City',
            'method'=>'delete'
            
        ],
        [
            'path' => '/^City\/sort\/?$/',
            'controller' => 'Controllers\City',
            'method'=>'sort'
            
        ],

        [
            'path' => '/^Users\/?$/',
            'controller' => 'Controllers\User',
            'method'=>'index'
            
        ],

        [
            'path' => '/^User\/add\/?$/',
            'controller' => 'Controllers\User',
            'method'=>'add'
            
        ],

        [
            'path' => '/^User\/edit\/?$/',
            'controller' => 'Controllers\User',
            'method'=>'edit'
            
        ],

        [
            'path' => '/^User\/delete\/?$/',
            'controller' => 'Controllers\User',
            'method'=>'delete'
            
        ],

        [
            'path' => '/^User\/sort\/?$/',
            'controller' => 'Controllers\User',
            'method'=>'sort'
            
        ],

        [
            'path' => '/^User\/filter\/?$/',
            'controller' => 'Controllers\User',
            'method'=>'filter'
            
        ],
        [
            'path' => '/^search\/?$/',
            'controller' => 'Controllers\User',
            'method'=>'search'
            
        ],


       
    ];
})();
