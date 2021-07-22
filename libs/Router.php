<?php
require_once(CONTROLLERS . '/ErrorController.php');

class Router
{
    function __construct()
    {
        // URL position [0] it's for controllers
        // URL position [1] it's for methods

        // We can GET the URL because we specified this in the htaccess
        $url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : null;

        // When there is no controller in the URL
        if ($url === null || $url[0] == "main") {
            $urlOfController = CONTROLLERS . '/' . 'userController.php';
            require_once($urlOfController);
            $controller = new UserController();
            $controller->loadModel('user');
            // $controller->view->render('login');
            $controller->defaultMethod();
            return false;
        }

        $class = ucfirst($url[0]); // example: employee to Employee
        $urlOfController = CONTROLLERS . '/' . $class . 'Controller.php'; // CONTROLLERS/EmployeeController
        $classController = $class . 'Controller'; // EmployeeController

        if (file_exists($urlOfController)) {
            require_once($urlOfController);

            //Initialize the controller
            $controller = new $classController;
            $controller->loadModel($class);

            //Number of array elements
            $nParams = sizeof($url);
            if ($nParams == 1) {
                $controller->defaultMethod();
            }
            if ($nParams == 2) {
                // Call the controller's method in the 2nd position of the url
                if ($controller->{$url[1] . $class}() === false) {
                    $controller = new ErrorController();
                }
                // If url has more than 2 params, then we have arguments
            } else if ($nParams > 2) {
                $params = [];
                for ($i = 2; $i < $nParams; $i++) {
                    array_push($params, $url[$i]);
                }
                if ($controller->{$url[1] . $class}($params) === false) {
                    $controller = new ErrorController();
                }
            }
        } else {
            $controller = new ErrorController();
        }
    }
}
