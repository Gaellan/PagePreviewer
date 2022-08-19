<?php

class Router {
    
    private function parseRequest(string $request)
    {
        $route = []; 
        
        $routeData = explode("/", $request);
        
        $route["path"] = "/".$routeData[1]; 
        
        if(count($routeData) > 2) 
        {
            $route["parameter"] = $routeData[2];
        }
        else
        {
            $route["parameter"] = null;
        }
        
        return $route;
    }
    
    public function route(array $routes, string $request)
    {
        $requestData = $this->parseRequest($request);
        
        $routeFound = false;
        
        foreach($routes as $route)
        {
            $controller = $route["controller"];
            $method = $route["method"];
            $parameter = $route["parameter"];
            
            if($route["path"] === $requestData["path"])
            {
                if($route["parameter"] && $requestData["parameter"] !== null)
                {
                    $routeFound = true;
                    
                    $ctrl = new $controller();
                    $ctrl->$method($_POST, $requestData["parameter"]);
                }
                else if(!$route["parameter"] && $requestData["parameter"] === null)
                {
                    $routeFound = true;
                    
                    $ctrl = new $controller();
                    $ctrl->$method($_POST);
                }
            }
        }
        
        if(!$routeFound)
        {
            throw new Exception("Route not found", 404);
        }
    }
}

?>