<?php
class View{
    public function __construct()
    {
    }

    public function render($view)
    {
        require 'views/'.$view.'.php';
    }
}

