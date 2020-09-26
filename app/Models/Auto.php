<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = ['idauto', 'name', 'model', 'build_year', 'release_year', 'description', 'idfactory'];

    protected $dates = ['deleted_at'];

    public function makers()
    {
        return $this->belongsTo('App\Maker');
    }
}
