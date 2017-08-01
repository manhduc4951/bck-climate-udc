<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Votes extends Model
{
    use Sortable;

    public $sortable = ['id','description','count','created_at','updated_at'];

    protected $table = 'votes';

    protected $fillable = ['description','count'];
}
