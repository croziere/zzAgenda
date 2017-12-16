<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\AccessLayer\JSON;


use JSONFileDB\Components\AccessLayer\DataSet;
use JSONFileDB\Components\AccessLayer\Id\UuidGenerator;
use JSONFileDB\Components\AccessLayer\Table;
use Ramsey\Uuid\Uuid;

class JSONDataSet implements DataSet
{
    private $table;

    private $data = array();

    private $filled = false;

    private $idGenerator;

    /**
     * JSONDataSet constructor.
     * @param Table $table
     * @param null|string $raw
     */
    public function __construct(Table $table, $raw = null)
    {
        $this->table = $table;
        $this->idGenerator = new UuidGenerator();
        $this->fill($raw);
    }

    public function count()
    {
        return count($this->data);
    }

    public function delete($id)
    {
        unset($this->data[$id]);
    }

    public function fetchOne($id)
    {
        return $this->data[$id];
    }

    public function fetchAll()
    {
        return $this->data; //Maybe a copy...?
    }

    public function set($id, $data)
    {
        if (!key_exists($id, $this->data)) {
            $id = $this->idGenerator->generateNext();
        }

        $this->data[$id] = $data;

        return $id;
    }

    public function fill($raw)
    {
        if ($this->filled) {
            throw new \LogicException("DataSet already filled!");
        }

        $rawArray = json_decode($raw, true);

        foreach ($rawArray as $e) {
            if (!$e['_id']) {
                throw new \RuntimeException(sprintf("Data format error: Missing _id entry in json!"));
            }

            $this->data[$e['_id']] = $e;
        }

        $this->filled = true;
    }

    public function write()
    {
        return json_encode(array_values($this->data));
    }
}