<?php 

    $cms -> router ->  before('GET|POST', '/', 'Middlewares\AuthMiddleware@isLogin');
    $cms -> router ->  before('GET|POST', '/customer.*', 'Middlewares\AuthMiddleware@isLogin');
    $cms -> router ->  before('GET|POST', '/project.*', 'Middlewares\AuthMiddleware@isLogin');

    $cms -> router -> get('/', 'Controllers\Home@Index');
    // Login Page
    $cms -> router -> get('/login', 'Controllers\Auth@Index');
    $cms -> router -> post('/login', 'Controllers\Auth@Login');
    $cms -> router -> get('/logout', 'Controllers\Auth@Logout');

    // Customers
    $cms -> router -> mount('/customer', function() use ($cms) {

        $cms -> router -> get('/', 'Controllers\Customer@Index');
        $cms -> router -> get('/add', 'Controllers\Customer@Add');
        $cms -> router -> get('/edit/([0-9]+)', 'Controllers\Customer@Edit');
        // $cms -> router -> get('/projects/([0-9]+)', 'Customer@Projects');
        // $cms -> router -> post('/edit/([0-9]+)', 'Customer@Edit');
        // $cms -> router -> post('/remove/([0-9]+)', 'Customer@Remove');

    });

    $cms -> router -> mount('/project', function() use ($cms) {

        $cms -> router -> get('/', 'Controllers\Project@Index');
        $cms -> router -> get('/add', 'Controllers\Project@Add');
        $cms -> router -> get('/edit/([0-9]+)', 'Controllers\Project@Edit');

    });

?>