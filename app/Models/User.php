<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'start_date',
    ];

    // 勤続年数を計算するアクセサ
    public function getLengthAttribute(){
        if (!$this->start_date) {
            return null; // start_dateがない場合はnull
        }

        $hireDate = Carbon::parse($this->start_date);
        $diff = $hireDate->diff(Carbon::now());

        return "{$diff->y} 年 {$diff->m} ヶ月";
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    // 1人のユーザーは1つの部署に所属する
    public function department() {
        return $this->belongsTo(Department::class);
    }

    // 1人のユーザーは複数の記録ができる
    public function records(){
        return $this->hasMany(Record::class);
    }
}
