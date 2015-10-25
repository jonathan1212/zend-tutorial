<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require __DIR__ . '/../vendor/autoload.php';
//require_once 'my_bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app

/*$entityManager = GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);*/

$em = GetMyEntityManager();

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));