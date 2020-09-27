<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Auto extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['idauto', 'name', 'model', 'build_year', 'release_year', 'description', 'idfactory'];

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idauto';
}
