<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'studentId';

    protected $fillable = [
        'studentId',
        'name',
        'email',
        'phone',
        'birthDate',
    ];

    public function routeNotificationFor($notification)
    {
        return $this->email;
    }

    public function routeNotificationForSms ($notifiable) {
        return $this->phone;
    }
}
