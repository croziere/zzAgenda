<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Routing;


class Router implements RouterInterface
{
    protected $routes = array();

    public function addRoute($id, Route $route)
    {
        $id = strtolower($id);

        $this->routes[$id] = $route;
    }

    public function getUrl($id, $params)
    {
        // TODO: Implement getUrl() method.
    }

    public function match($match)
    {
        $matches = array();
        foreach ($this->routes as $id => $route) {
            if (1 === preg_match($route->getRegex(), $match, $matches)) {
                return $this->matchParameters($route, $matches);
            }
        }
        return false;
    }

    /**
     * @deprecated Controller is in _controller request attribute
     * @param $id
     * @return mixed
     */
    public function getController($id)
    {
        return $this->routes[$id]->getController();
    }

    private function matchParameters(Route $route, array $matches) {
        $paramsKey = array();
        preg_match_all('/:([[:alnum:]]+)\/?/', $route->getPath(), $paramsKey);
        $paramsKey = $paramsKey[1];
        unset($matches[0]);
        $params = array_combine(array_values($paramsKey), array_values($matches));
        $params["_controller"] = $route->getController();
        return $params;
    }
}