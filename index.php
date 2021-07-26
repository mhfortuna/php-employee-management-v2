<?php

// require 'views/login/index.php';
require_once 'config/baseConstants.php';
require_once 'config/constants.php';
require_once 'config/db.php';
require_once LIBS . '/Database.php';
require_once LIBS . '/Controller.php';
require_once LIBS . '/View.php';
require_once LIBS . '/Model.php';
require_once LIBS . '/Router.php';
require_once LIBS . '/SessionHelper.php';

$router = new Router();
