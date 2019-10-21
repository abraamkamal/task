<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crud extends Model
{
	use SoftDeletes;
    protected $fillable = [
       'id', 'name', 'image', 'screen_name','content',
        'description','users_name','date','status'
    ];
    protected $guarded=[];
}
