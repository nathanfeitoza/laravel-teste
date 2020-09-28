<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Maker extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['name', 'website', 'email', 'logo', 'password'];

    protected $primaryKey = 'idmaker';

    protected $hidden = ['password'];

    protected $dates = ['deleted_at'];

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
}
