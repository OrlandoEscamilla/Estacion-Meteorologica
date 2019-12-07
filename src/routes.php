<?php

$app->get('/data/{type}', 'App\Controller\DataDispatcher:getData');