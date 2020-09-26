<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'website', 'email', 'logo', 'password'];

    protected $hidden = ['password'];

    protected $dates = ['deleted_at'];

    public function autos()
    {
        return $this->hasMany('App\Auto');
    }
}
