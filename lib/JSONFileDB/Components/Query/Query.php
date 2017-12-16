<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\Query;


use JSONFileDB\Components\AccessLayer\DataSet;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class Query
{
    private $criterias = array();

    private $orderBy = array();

    private $executed = false;

    private $dataSet;

    private $results;

    private $queryEvaluator;

    /**
     * Query constructor.
     * @param $dataSet
     * @param array $criterias
     * @param array $orderBy
     */
    public function __construct(DataSet $dataSet, array $criterias = array(), array $orderBy = array())
    {
        $this->criterias = $criterias;
        $this->orderBy = $orderBy;
        $this->dataSet = $dataSet;

        $this->queryEvaluator = new ExpressionLanguage();
    }

    private function execute() {
        if ($this->executed) {
            return;
        }

        $this->results = $this->applyCriterias($this->dataSet->fetchAll(), $this->criterias);

        $this->sort($this->results, $this->orderBy);

        $this->executed = true;
    }

    public function getResults() {
        $this->execute();

        return $this->results;
    }

    public function getSingleResult() {
        $this->execute();

        return $this->results[0];
    }

    private function applyCriterias($rawData, $criterias)
    {
        $results = $rawData;
        foreach ($criterias as $criteria) {
            $results = $this->applyCriteria($criteria, $results);
        }

        return $results;
    }

    private function applyCriteria($criteria, $results)
    {
        $results = array_filter($results, function($item) use ($criteria) {

            return $this->queryEvaluator->evaluate($criteria, array(
                'e' => (object)$item
            ));
        });

        return $results;
    }

    private function sort($results, $orderBy)
    {

    }


}