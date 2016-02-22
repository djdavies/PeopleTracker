<?php
require 'vendor/autoload.php';
use DebugBar\StandardDebugBar;

if( ! ini_get('date.timezone') )
{
   date_default_timezone_set('GMT');
}

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");
?>
<html>
    <head>
        <?php echo $debugbarRenderer->renderHead() ?>
    </head>
    <body>
        ...
        <?php echo $debugbarRenderer->render() ?>
    </body>
</html>