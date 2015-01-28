<?php namespace Noise\Observer;

use DateTime as DT;
use Norm\Schema\DateTime;

class Timestampable
{
    public function saving($model)
    {
        if ($model->isNew()) {
            $model['updated_time'] = $model['created_time'] = $model->prepare(null, new DT(), DateTime::create());
        } else {
            $model['updated_time'] = $model->prepare(null, new DT(), DateTime::create());
        }
    }
}
