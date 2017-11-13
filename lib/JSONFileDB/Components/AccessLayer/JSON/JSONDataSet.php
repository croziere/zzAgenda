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
use JSONFileDB\Components\AccessLayer\Table;

class JSONDataSet implements DataSet
{

    private $table;
    private $data;
    private $rawData;
    private $filt = false;
    private $uids = array();

    /**
     * JSONDataSet constructor.
     * @param $table
     */
    public function __construct(Table $table, $query)
    {
        $this->table = $table;
        $this->execute($query);
    }

    /**
     * @inheritdoc
     */
    public function fetch($includeId = true)
    {
        if ($includeId) {
            return $this->data;
        }

        $res = array();

        foreach ($this->data as $data) {
            unset($data['_id']);
            array_push($res, $data);
        }

        return $res;
    }

    public function count()
    {
        return count($this->data);
    }

    public function delete()
    {
        foreach ($this->data as $d)
        {
            unset($this->table->raw()[$d['_id']]);
        }

        $this->table->write();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function sort($sortFn = null)
    {
        $this->data = usort($this->data, $sortFn);
        return $this;
    }

    private function execute($queries)
    {
        $this->tweak($this->table->raw());
        $this->apply($queries);
    }

    private function tweak($rawData) {
        $counter = 0;
        foreach ($rawData as $data) {
            array_push($this->uids, $counter);
            $data['_id'] = $counter;
            $this->data[] = $data;
            $counter++;
        }
        $this->rawData = $this->data;
    }

    private function apply($queries)
    {
        foreach ($queries as $query) {
            if (count($query) < 3) continue;

            $key = (!empty($query[0])) ? $query[0] : '';
            $con = (!empty($query[3])) ? $query[3] : 'or';

            if($key == '*') return;

            if($con == 'or') $this->check($this->rawd, $query);
            else $this->check($this->data, $query);
        }
    }
}