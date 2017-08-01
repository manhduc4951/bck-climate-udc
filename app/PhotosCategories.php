<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PhotosCategories extends Model
{
    use Sortable;

    public $sortable = ['id','name','description','created_at','updated_at'];

    protected $fillable = ['name','description'];

    protected $table = 'photos_categories';
}
