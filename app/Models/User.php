<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * الحقول المسموح بتعبئتها جماعيًا (Mass Assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * المستخدم لديه عدة ملخصات
     */
    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }
}
