<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInformation extends Model
{
    use HasFactory;
    protected $fillable = [
		'user_id',
		'first_name',
		'middle_name',
		'last_name',
		'hired_date',
		'employee_id',
		'birth_date',
		'gender',
		'address',
		'profile_image',
		'status'
    ];
}
