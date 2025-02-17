<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // 1つの区分は複数の記録に属する
    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
