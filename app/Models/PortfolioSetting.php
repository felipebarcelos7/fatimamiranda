<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSetting extends Model
{
    use HasFactory;

    protected $fillable = [
    	'language_id',
    	'meta_title',
    	'meta_description',
    	'slug',
    	'breadcrumbs_anchor',

    	'title',
    	'description',

         'banner_img',
        'banner_title',
        'banner_desc',      

         'banner_btn_text',
          'banner_btn_link',  


 	];
}
