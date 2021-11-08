<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','email','email_2','tel_no','tel_no_2','mobile_no','mobile_no_2','address','address_2','facebook','instagram','twitter','skype',
        'linkedin','youtube','footer_title','footer_content','header_image','flag_image','footer_image','seo_title','seo_keywords','seo_description'];
}
