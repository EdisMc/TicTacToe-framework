<?php

namespace App\src\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
//        dd($method);exit;
        $callback = $this->routes[$method][$path] ?? false;

//        dd($callback);exit;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }


        if (is_array($callback)) {

            $callback[0] = new $callback[0]($this->request);
        }


        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
//        include_once Application::$ROOT_DIR . "/views/$view.php";
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * Return the layout or throw an error
     * @return false|string
     */
    protected function layoutContent()
    {
        return file_get_contents(App::$ROOT_DIR . "/src/view/layouts/main.php");

    }


    /**
     * Return dynamically the needed view
     * @param $view
     * @return false|string
     */
    protected function renderOnlyView($view, $params)
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }
//        ob_start();
        include_once App::$ROOT_DIR . "/src/view/$view.php";
//        return ob_get_clean();
    }
}