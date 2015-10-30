<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
// replace with file to your own project bootstrap
(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';


// replace with mechanism to retrieve EntityManager in your app
$entityManager = GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
