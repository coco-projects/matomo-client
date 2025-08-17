<?php

    require 'common.php';

    $option1 = new \Coco\matomo\Pv();
    $option1->setSiteId(555);
    $option1->setSessionId('666666');
    $option1->setPageUrl('pageUrl');

    $option1->setUserId(11111);
    $option1->setUserAgent('uauaua');
    $option1->setUrlReferrer('referer');
    $option1->setResolution(777, 888);
    $option1->setRegion('regionregion');
    $option1->setPlugins(true, false, true);
    $option1->setPerformanceTimings(10, 20, 30, 40, 50, 60);
    $option1->setPageCharset('charset');
    $option1->setLongitude(1.1);
    $option1->setLocalTime('12:34:55');
    $option1->setLatitude(3.3);
    $option1->setIp('1.2.3.4');
    $option1->setForceVisitDateTime('2012-3-2 23:4:2');
    $option1->setForceNewVisit();
    $option1->setEcommerceView('sku', 'name', ['category'], '999');
    $option1->setCustomVariable(1, 'customVariable11', 'customVariableValue11', 'visit');
    $option1->setCustomVariable(2, 'customVariable22', 'customVariableValue22', 'event');
    $option1->setCustomVariable(3, 'customVariable33', 'customVariableValue33', 'page');
    $option1->setCustomTrackingParameter('aaa', 'bbb');
    $option1->setCustomDimension(1, 'aaa');
    $option1->setCustomDimension(2, 'bbb');
    $option1->setCountry('country');
    $option1->setCity('city');

    $option1->addEcommerceItem('sku11', 'name11', ['cat11'], 2.5, 30);
    $option1->addEcommerceItem('sku22', 'name22', ['cat22'], 5.5, 50);

//    echo $option1->getUrlTrackEcommerce(111, 222, 333, 444, 555)->makeUrl();;
//    echo $option1->doTrackPhpThrowable(new \Exception('ececec'))->makeUrl();;
    echo $option1->getUrlTrackEcommerceOrder('123456', 555)->makeUrl();;


