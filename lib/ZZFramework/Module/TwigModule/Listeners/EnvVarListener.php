<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\TwigModule\Listeners;


use ZZFramework\Event\EventSubscriberInterface;
use ZZFramework\Http\Event\GetResponseEvent;
use ZZFramework\Http\Event\HttpEvents;
use ZZFramework\Security\Security;

class EnvVarListener implements EventSubscriberInterface
{

    private $twig;

    private $security;

    /**
     * EnvVarListener constructor.
     * @param \Twig_Environment $twig
     * @param Security $security
     */
    public function __construct(\Twig_Environment $twig, Security $security)
    {
        $this->twig = $twig;
        $this->security = $security;
    }

    public function handle(GetResponseEvent $event, $eventName) {

        if ($this->security->getToken()->isAuthenticated()) {
            $this->twig->addGlobal('authenticated', true);
            $this->twig->addGlobal('user', $this->security->getUser());
        } else {
            $this->twig->addGlobal('authenticated', false);
        }
    }

    public function getObservedEvents()
    {
        return array(HttpEvents::REQUEST => "handle");
    }
}