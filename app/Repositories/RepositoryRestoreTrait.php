<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 03/01/2019
 * Time: 14:22
 */

namespace GestaoTrocas\Repositories;


trait RepositoryRestoreTrait
{
    public function restore($id)
    {
        $this->applyScope();

        $temporarySkipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);

        $model = $this->find($id);

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        $model->restore();
    }
}