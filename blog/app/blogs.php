<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class blogs extends Model
{
	use Sortable,SoftDeletes;
	protected $fillable = [ 'title'];
	protected $dates = ['deleted_at'];
    public $timestamps=false;
	public $sortable = ['id', 'title'];
}
