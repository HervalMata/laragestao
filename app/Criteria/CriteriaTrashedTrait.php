<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 03/01/2019
 * Time: 13:22
 */

namespace GestaoTrocas\Criteria;


trait CriteriaTrashedTrait
{
    public function onlyTrashed()
    {
        $this->pushCriteria(FindByTrashedCriteria::class);
        return $this;
    }

    public function withTrashed()
    {
        $this->pushCriteria(FindWithTrashedCriteria::class);
        return $this;
    }
}