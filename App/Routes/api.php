<?php 

$cms -> router -> mount('/api', function() use ($cms) {

    $cms -> router -> get('/user', function() {
        echo 'api user overview';
        
    });
    $cms -> router-> get('user/detail/(\d+)', 'User@showProfile');

});



?>