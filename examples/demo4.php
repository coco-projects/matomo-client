<?php

    use Coco\matomo\MatomoClient;

    require 'common.php';

    $faker = Faker\Factory::create('zh_CN');
    $faker->addProvider(new \Coco\matomo\fakerProvider\Request($faker));

    echo $faker->name();
    echo PHP_EOL;

    echo $faker->opera;
    echo PHP_EOL;

    echo $faker->safari();
    echo PHP_EOL;

    echo json_encode($faker->mobileResolution());
    echo PHP_EOL;

    echo json_encode($faker->pcResolution());
    echo PHP_EOL;

