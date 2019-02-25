<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Picture extends Model
{
		use Sortable;
		
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pictures';
				
		/**
		* Field to be mass-assigned.
		*
		* @var array
		*/
		protected $fillable = ['id', 'title', 'description', 'full_name'];
		
		public $sortable = ['id', 'title','created_at'];
}
