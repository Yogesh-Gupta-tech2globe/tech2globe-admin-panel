<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tech2globe_pages_category extends Model
{
    use HasFactory;
    protected $table = 'tech2globe_pages_category';

    public function subMenu()
    {
        // Assuming the foreign key is 'sub_category_id'
        return $this->belongsTo('App\Models\tech2globe_header_sub_category', 'sub_category_id');
    }
}
