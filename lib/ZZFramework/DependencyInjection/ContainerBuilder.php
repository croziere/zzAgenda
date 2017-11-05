<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\DependencyInjection;


class ContainerBuilder extends Container
{
    private $registers = array();
    private $definitions = array();

    public function get($id) {
        $id = strtolower($id);

        try {
            $service = parent::get($id);
            return $service;
        }
        catch (\Exception $e) {

        }

        if(!array_key_exists($id, $this->definitions)) {
            throw new \LogicException(sprintf("Service definition %s doesn't exists!", $id));
        }

        $service = $this->createService($this->definitions[$id], $id);

        return $service;
    }


}