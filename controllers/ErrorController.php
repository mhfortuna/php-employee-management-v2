<?php
class ErrorController extends Controller
{
    function __construct()
    {

        parent::__construct(); // inherit view instance
        //This creates a variable inside the view class and you can use it in the view HTML with $this->message
        $this->view->message = "400. Ilegal request";
        $this->view->render('error');
    }
}
