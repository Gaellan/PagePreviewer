<?php

abstract class AbstractController
{
    protected function renderPartial(string $template, array $values)
    {
        $data = $values;
        
        require "templates/".$template.".phtml";
    }
    
    protected function render(string $template, array $values)
    {
        $data = $values;
        $page = $template;
        
        require "templates/layout.phtml";
    }
}