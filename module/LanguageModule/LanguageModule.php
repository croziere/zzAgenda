<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 20/11/17
 * Time: 18:42
 */

namespace LanguageModule;

use ZZFramework\Application\Module\Module;

class LanguageModule extends Module
{
    public function boot()
    {
        $dispatcher = $this->container->get('event_dispatcher');
        $localeListener = $this->container->get('locale_listener');

        $dispatcher->subscribeObservers($localeListener);

        $twigExtension = $this->container->get('language.twig.trans');
        $twigEnv = $this->container->get('templating');

        $twigExtension->registerExtensions($twigEnv);


        $this->addRoute('changeLang', '/lang/:lang', ':Language:Language:changeLang', array(
            'lang' => 'a-z'
        ));
    }
}