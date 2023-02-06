<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
    	'meta_title',
    	'meta_description',
    	'slug',
    	'breadcrumbs_anchor',

        'banner_img',
        'banner_title',
        'banner_desc',

         'banner_btn_text',
          'banner_btn_link',  

    	'about_subtitle',
    	'about_title',
    	'about_description',
    	'about_buttontext',
    	'about_buttonlink',
    	'about_image',
    	'about_ytlink',
        'member_title_section'


 	];
}
