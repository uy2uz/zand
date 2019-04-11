<?php
/**
 * Description of Router
 *
 * @author akuryakov
 */
namespace vendor\core;


class Router {
    /**
     *table routes
     * @var array
     */
    protected static $routes = [];
    
    /**
     *current route
     * @var array
     */
    protected static $route = [];
    
    
    /**
     * add route to table routes
     * @param string $regexp
     * @param array $route route([controller, action, param])
     */
    public static function add(string $regexp, array $route = [])
    {
        self::$routes[$regexp] = $route;
    }
    
    
    /**
     * get table routes
     * @return array
     */
    public static function getRoutes():array
    {
        return self::$routes;
    }
    
    
    /**
     * get table route
     * @return array
     */
    public static function getRoute():array
    {
        return self::$route;
    }
    
    /**
     * search URL in tables routes
     * @param string $url
     * @return bool
     */
    private static function matchRoute(?string $url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach($matches as $key => $value){
                    if (is_string($key)){
                        $route[$key] = $value;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return TRUE;
            }
        }
        return FALSE;
    }
    
    
    /**
     * redirect URL correctly route
     * @param string $url  URL
     * @return void
     */
    public static function dispetch(string $url):void
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'];
            
            if (class_exists($controller)) {
                $controllerObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                d(self::$route);

                if(method_exists($controllerObj, $action)){
                    $controllerObj->$action();
                    $controllerObj->getView();
                } else {
                    echo "Метод $controller::$action не найден";
                }
            } else {
                echo "Контроллер $controller не найден";
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }
    
    /**
     * upper Camel Case transformation
     * @param string $name
     * @return string
     */
    protected static function upperCamelCase(string $name):string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    
    /**
     * lower Camel Case transformation
     * @param string $name
     * @return string
     */
    protected static function lowerCamelCase(string $name):string
    {
        return lcfirst(self::upperCamelCase($name));
    }
    
    protected static function removeQueryString($url)
    {   
        if($url){
            $params = explode('&', $url, 2);
            if (FALSE === strpos ($params[0], '=')){
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }
    
}
