<?php 

    $cms -> router-> get('/', 'Home@Index');
    // Login Page
    $cms -> router-> get('/login', 'Auth@Index');
    $cms -> router-> post('/login', 'Auth@Login');
    $cms -> router-> get('/logout', 'Auth@Logout');

    // Customers
    $cms -> router -> mount('/customer', function() use ($cms) {

        $cms -> router -> get('/', 'Customer@Index');
        $cms -> router -> get('/add', 'Customer@Add');
        $cms -> router -> get('/edit/([0-9]+)', 'Customer@Edit');
        // $cms -> router -> get('/projects/([0-9]+)', 'Customer@Projects');
        // $cms -> router -> post('/edit/([0-9]+)', 'Customer@Edit');
        // $cms -> router -> post('/remove/([0-9]+)', 'Customer@Remove');

    });

    $cms -> router -> mount('/project', function() use ($cms) {

        $cms -> router -> get('/', 'Project@Index');
        $cms -> router -> get('/add', 'Project@Add');
        $cms -> router -> get('/edit/([0-9]+)', 'Project@Edit');

    });

?>