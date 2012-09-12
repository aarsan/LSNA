<?php
//this is the develop branch
require('./Slim/Slim.php');

$app = new Slim(array(
    'log.enable' => true,
    'log.path' => './logs',
    'log.level' => 4
    //'view' => 'MyCustomViewClassName'
));

require('./routes/lsna.php');
require('./routes/properties.php');
require('./routes/users.php');
require('./routes/home.php');


$app->run();

?>