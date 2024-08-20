<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aplus_plugin_users extends Model
{
    use HasFactory;
    protected $table = "aplus_plugin_users";

    protected $fillable = ['site_name','site_url','admin_email','php_version','wp_version','site_charset','public_key'];
}
