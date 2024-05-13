<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tech2globe_all_pages extends Model
{
    use HasFactory;
    protected $table = 'tech2globe_all_pages';

    public function subCategory()
    {
        // Assuming the foreign key is 'sub_category_id'
        return $this->belongsTo('App\Models\tech2globe_header_sub_category', 'sub_category_id');
    }

    public function pageCategory()
    {
        // Assuming the foreign key is 'sub_category_id'
        return $this->belongsTo('App\Models\tech2globe_pages_category', 'page_category_id');
    }

}
