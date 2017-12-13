<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LanguageModule\TwigExtensions;


use LanguageModule\Listener\LanguageListener;
use Symfony\Component\Translation\TranslatorInterface;

class TransTwigExtension
{
    private $translator;

    private $localeListener;

    /**
     * TransTwigExtension constructor.
     * @param TranslatorInterface $translator
     * @param LanguageListener $languageListener
     */
    public function __construct(TranslatorInterface $translator, LanguageListener $languageListener)
    {
        $this->translator = $translator;
        $this->localeListener = $languageListener;
    }


    public function translate($key, $params = array()) {
        return $this->translator->trans($key, $params, null, $this->localeListener->getLocale());
    }

    public function registerExtensions(\Twig_Environment $twig) {
        $twig->addFunction(new \Twig_Function('trans', array($this, 'translate')));
    }
}