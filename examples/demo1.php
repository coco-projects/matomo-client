<?php

    require 'common.php';

    $session = \Coco\matomo\Session::newIns()->mobileDevice();
    $session->putTocache();

    $session = \Coco\matomo\Session::newIns()->pcDevice();
    $session->putTocache();