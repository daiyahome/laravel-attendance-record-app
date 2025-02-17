<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // 1つの部署は複数のユーザーを属する
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
