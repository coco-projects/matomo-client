<?php

    require 'common.php';


    $session = \Coco\matomo\Session::getInsById('6c9c0991a97ad81d');
    $session = \Coco\matomo\Session::getInsById('f4927f8804dd59bf');
    echo $session->getId();