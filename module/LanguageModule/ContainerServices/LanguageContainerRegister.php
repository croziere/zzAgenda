<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace LanguageModule\ContainerServices;

use LanguageModule\Listener\LanguageListener;
use LanguageModule\TwigExtensions\TransTwigExtension;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Translator;
use ZZFramework\Application\ApplicationKernelInterface;
use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;
use ZZFramework\DependencyInjection\Injectable\Definition;
use ZZFramework\DependencyInjection\Injectable\Reference;

class LanguageContainerRegister implements ContainerRegisterInterface
{
    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $translator = new Translator('en', new MessageSelector());

        $translator->addLoader('php', new PhpFileLoader());

        $path = $this->getTranslationDirectory($container->get('kernel'));

        $translator->addResource('php', $path.'en.php', 'en');
        $translator->addResource('php', $path.'fr.php', 'fr');

        $languageListener = new LanguageListener();

        $twigExtRef = new Definition(TransTwigExtension::class);

        $twigExtRef->addArgument(new Reference('translator'));
        $twigExtRef->addArgument(new Reference('locale_listener'));

        $container->set('translator', $translator);
        $container->set('locale_listener', $languageListener);
        $container->register('language.twig.trans', $twigExtRef);

    }

    private function getTranslationDirectory(ApplicationKernelInterface $kernel) {
        return $kernel->getAppRootDir().'/../module/LanguageModule/Translations/';
    }

}