<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Categories extends Model
{
    use Sortable;

    public $sortable = ['id','name','created_at','updated_at'];

    protected $table = 'categories';

    protected $fillable = ['name','front','video_embed_link'];

    public static function generateDropdown() {
        $categories = self::all();
        $result = array();
        if($categories) {
            foreach($categories as $category) {
                $result[$category->id] = $category->name;
            }
        }

        return $result;
    }
}
