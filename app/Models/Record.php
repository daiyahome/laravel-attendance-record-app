<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    // 1つの記録は1つの区分に属する
    public function type() {
        return $this->belongsTo(Type::class);
    }

    // 1つの記録は1人のユーザーが作成する
    public function record() {
        return $this->belongsTo(Record::class);
    }
}
