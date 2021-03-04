<?php
session_start();
// Include the required constants
require_once './config/constants.php';
require_once './config/db.php';
// Include the router
require_once LIBS . '/Router.php';
// Include the base classes
include LIBS . '/classes/Model.php';
include LIBS . '/classes/View.php';
include LIBS . '/classes/Controller.php';
include CONTROLLERS . '/SessionController.php';
include CONTROLLERS . '/ErrorController.php';

$router = new Router();
