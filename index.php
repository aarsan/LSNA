<?php
require('./Slim/Slim.php');

$app = new Slim(array(
    'log.enable' => true,
    'log.path' => './logs',
    'log.level' => 4
    //'view' => 'MyCustomViewClassName'
));

require('./routes/lsna.php');


$app->run();

?>