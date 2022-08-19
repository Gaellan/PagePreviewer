<?php

class HomeController
{
    public function index(array $post)
    {
        require "templates/home.phtml";
    }
}