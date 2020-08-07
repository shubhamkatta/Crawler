<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use crawler\CrawlerCommand;

$application = new Application();
$crawler = new CrawlerCommand();

// register commands
$application->add($crawler);

//run application
$application->run();
?>