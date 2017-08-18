<?php

use Symfony\Component\ClassLoader\Psr4ClassLoader;

########################################################### Prepare

error_reporting(E_ALL);

require 'vendor/autoload.php';
require '../vendor/autoload.php';

$loader = new Psr4ClassLoader;
$loader->addPrefix('MiniSuite\\', '../src');
$loader->register();

########################################################### Base

$minisuite = new MiniSuite\Suite('Base');
