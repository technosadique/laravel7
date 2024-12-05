<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
	use SoftDeletes,Sortable;	
    public $timestamps=false;	
	protected $fillable = ['title'];
	protected $dates = ['deleted_at'];
	public $sortable = ['id','title'];
}
