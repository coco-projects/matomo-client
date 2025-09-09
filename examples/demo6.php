<?php

    use Coco\matomo\MatomoWebApiClient;
    use Coco\matomo\Pv;
    use Coco\matomo\Session;
    use Coco\matomo\Uv;

    require 'common.php';

    MatomoWebApiClient::initLogger('matomo_loggg', true);

    $client = MatomoWebApiClient::getClient($apiUrl, $matomoToken, $matomoSiteId);

    $session = Session::getInsById('f4927f8804dd59bf');
    $session = Session::getInsById('6c9c0991a97ad81d');

    $session = Session::newIns()->pcDevice();

    $pv1 = new Pv();
    $pv1->setPageUrl('http://dev6080/archives/1');
    $pv1->setLocalTime('22:33:32');

    $pv1->setForceVisitDateTime('2025-9-02 22:33:31');

    $pv1->setCustomTrackingParameter('bw_bytes', 23);
    $pv1->setCustomVariable(3, 'languageCode', 'zh', 'visit');
    $pv1->setCustomVariable(1, 'tld', 456, 'page');
    $pv1->setCustomVariable(2, 'ean', 789789789, 'page');
    $pv1->setCustomDimension(1, 'mail');
    $pv1->setUrlReferrer($session->faker->searchEngineUrlWithKeyword('自行车'));
    $pv1->getUrlTrackPageView('getUrlTrackPageView');

    $pv2 = new Pv();
    $pv2->setPageUrl('http://dev6080/archives/2');
    $pv2->getUrlTrackContentImpression('getUrlTrackContentImpression-$contentName');

    $pv3 = new Pv();
    $pv3->setPageUrl('http://dev6080/archives/3');
    $pv3->setPerformanceTimings(22, 33, 44, 11, 55);
    $pv3->getUrlTrackAction('http://dev6080/archives/3', 'link');

    $pv4 = new Pv();
    $pv4->setPageUrl('http://dev6080/archives/4');
    $pv4->getUrlTrackContentInteraction('click', 'Product 1', '/path/product1.jpg', 'http://product1.example.com');

    $pv5 = new Pv();
    $pv5->setPageUrl('http://dev6080/archives/5');
    $pv5->getUrlTrackSiteSearch('php', 'baodu', 4);

    $pv6 = new Pv();
    $pv6->setPageUrl('http://dev6080/archives/6');
    $pv6->getUrlTrackEvent('Movies', 'play', 'Movie Name');

    $pv7 = new Pv();
    $pv7->setPageUrl('http://dev6080/archives/7');
    $pv7->getUrlPing();

    $pvs = [
        $pv1,
        $pv2,
        $pv3,
        $pv4,
        $pv5,
        $pv6,
        $pv7,
    ];

    $uv = new Uv('2025-9-02 22:33:11');
    $uv->setSession($session);
    $uv->importPvs($pvs);

    $client->importUvs([
        $uv,
    ]);

    $client->setChunkSize(5);
    $client->sendRequest();

