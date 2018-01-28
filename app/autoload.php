<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

/**
 * @var ClassLoader $loader
 */
$loader = include __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

AnnotationDriver::registerAnnotationClasses();

return $loader;
