<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http;


class Request
{
    public $attributes;

    public $request;

    public $query;

    public $server;

    public $files;

    public $cookies;

    public $headers;

    public $session;

    private $uri;

    private $method;

    public function __construct($uri, $method, $request, $query, $server, $cookies, $files, $session = array()) {
        $this->attributes = new ParametersBag();

        $this->request = new ParametersBag($request);
        $this->query = new ParametersBag($query);
        $this->server = new ParametersBag($server);
        $this->files = new ParametersBag($files);
        $this->cookies = new ParametersBag($cookies);
        $this->session = new ParametersBag($session);

        $this->uri = $uri;
        $this->method = $method;
    }

    public static function fromContext() {
        $uri = $_SERVER['REQUEST_URI'];
        $script = $_SERVER['SCRIPT_NAME'];
        $uri = str_replace($script, '', $uri);
        if(strlen($uri) === 0) {
            $uri = '/';
        }
        session_start();

        return new static($uri, $_SERVER['REQUEST_METHOD'], $_POST, $_GET, $_SERVER, $_COOKIE, $_FILES, $_SESSION);
    }

    public function getPath() {
        return $this->uri;
    }
}