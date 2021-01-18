<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class ModelBase extends Model
{

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
}
