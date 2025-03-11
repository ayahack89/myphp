<?php

require_once (__DIR__.'/router.php');

get('/home', 'views/index.php');
get('/fuck', 'views/fuck.php');

any('/404','views/404.php');


?>

