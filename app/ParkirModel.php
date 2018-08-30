<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkirModel extends Model
{
    protected $table = 'tb_parkir';
    public $timestamps = false;
    protected $guarded = [];
}
