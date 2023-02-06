<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderFooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'sidebar_title',
        'sidebar_description',
        'sidebar_title2',
        'sidebar_description2',
        
        'typed_title',
        'typed_text',
        'typed_buttontext',
        'typed_buttonlink',
        'typed_titlebig',
        'typed_desc',
        'typed_subtitle',
        
        'footer_col1_subtitle',
        'footer_col1_title',
        'footer_col1_buttontext',
        'footer_col1_buttonlink',
        
        'footer_col2_title1',
        'footer_col2_title2',
        'footer_col2_html1',
        'footer_col2_html2',
        'footer_copyright',
        'social_links',


    ];
}
