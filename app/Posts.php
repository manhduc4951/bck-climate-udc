<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Posts extends Model
{
    use Sortable;

    public $sortable = ['id','title','category_id','user_id','created_at','updated_at'];

    protected $table = 'posts';

    protected $fillable = ['category_id','user_id','title','content','feature_image'];

    protected $featureImageDirectory = '/images/posts/feature_image/thumbnail/';

    public function user() {
        return $this->belongsTo('App\User',$foreignKey = 'user_id');
    }

    public function category()  {
        return $this->belongsTo('App\Categories',$foreignKey = 'category_id');
    }

    public function getFeatureImage() {

        if($this->feature_image) {
            $full_path = url('/').$this->featureImageDirectory.$this->feature_image;

            if(file_exists(public_path().$this->featureImageDirectory.$this->feature_image)) {
                return $full_path;
            }
        }

        return '';

    }

}
