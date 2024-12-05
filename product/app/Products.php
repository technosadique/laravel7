<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Products extends Model
{
    //
	use Sortable;
	protected $fillable = [ 'id','name','qty'];
    public $timestamps=false;
	public $sortable = ['id','name','qty'];
}
