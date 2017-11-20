<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 20/11/17
 * Time: 18:42
 */

namespace LanguageModule;

class LanguageModule
{
    public function boot()
    {
        // TODO : register twig filter in twig environment variable
        // register listener
        $this->addRoute('changeLang', '/changeLang/:lang', ':Language:Language:changeLang', array(
        'lang' => 'a-z'
    ));
    }
}