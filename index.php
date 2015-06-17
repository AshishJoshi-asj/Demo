<?php 

require_once './vendor/autoload.php';

use ashishittechnosoft\Demo\Logger;
use ashishittechnosoft\Demo\MemoryHandler;

$logger = new Logger();
$handler = new MemoryHandler();

$logger->registerHandler('memory', $handler);
$logger->log("yeh, I wrote first simple liberary using TDD");
var_dump($handler->getEntries());
//var_dump($logger);
?>