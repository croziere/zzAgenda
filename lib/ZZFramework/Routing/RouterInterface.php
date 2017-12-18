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


interface RouterInterface
{
    public function addRoute($id, Route $route);

    public function getUrl($id, $params);

    public function match($match);

    public function getController($id);
}