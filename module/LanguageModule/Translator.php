<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 20/11/17
 * Time: 18:54
 */

namespace LanguageModule;


class Translator
{
    private $messages;

    /**
     * Translator constructor.
     * @param $messages
     */
    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    public function translateKey($key){
        return $this->messages[$key];
    }

}