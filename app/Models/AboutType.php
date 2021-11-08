<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutType extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function aboutus()
    {
        return $this->hasMany(AboutUs::class);
    }
}
