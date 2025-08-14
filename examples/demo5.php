<?php

    use Coco\matomo\MatomoClient;

    require 'common.php';

    $client = MatomoClient::getClient($matomoUrl, $matomoToken, $matomoSiteId);

    $session = \Coco\matomo\Session::getInsById('f4927f8804dd59bf');
    $session = \Coco\matomo\Session::getInsById('6c9c0991a97ad81d');

    $session = \Coco\matomo\Session::newIns()->pcDevice();

    $option1 = new \Coco\matomo\Option();
    $option1->setPageUrl('http://dev6080/archives/1');
    $option1->setLocalTime('12:33:32');
//    $option1->setForceVisitDateTime('2025-8-02 23:33:31');
    $option1->setCustomTrackingParameter('bw_bytes', 23);
    $option1->setCustomVariable(3, 'languageCode', 'zh', 'visit');
    $option1->setCustomVariable(1, 'tld', 456, 'page');
    $option1->setCustomVariable(2, 'ean', 789789789, 'page');
    $option1->setCustomDimension(1, 'mail');
    $option1->setUrlReferrer($session->faker->searchEngineUrlWithKeyword('自行车'));
    $option1->getUrlTrackPageView('getUrlTrackPageView');

    $option2 = new \Coco\matomo\Option();
    $option2->setPageUrl('http://dev6080/archives/2');
    $option2->getUrlTrackContentImpression('getUrlTrackContentImpression-$contentName');

    $option3 = new \Coco\matomo\Option();
    $option3->setPageUrl('http://dev6080/archives/3');
    $option3->setPerformanceTimings(22, 33, 44, 11, 55);
    $option3->getUrlTrackAction('http://dev6080/archives/3', 'link');

    $option4 = new \Coco\matomo\Option();
    $option4->setPageUrl('http://dev6080/archives/4');
    $option4->getUrlTrackContentInteraction('click', 'Product 1', '/path/product1.jpg', 'http://product1.example.com');

    $option5 = new \Coco\matomo\Option();
    $option5->setPageUrl('http://dev6080/archives/5');
    $option5->getUrlTrackSiteSearch('php', 'baodu', 4);

    $option6 = new \Coco\matomo\Option();
    $option6->setPageUrl('http://dev6080/archives/6');
    $option6->getUrlTrackEvent('Movies', 'play', 'Movie Name');

    $option7 = new \Coco\matomo\Option();
    $option7->setPageUrl('http://dev6080/archives/7');
    $option7->getUrlPing();

    $options = [
        $option1,
        $option2,
        $option3,
        $option4,
        $option5,
        $option6,
        $option7,
    ];

    $client->setSession($session)->importOptions($options)->sendRequest();
