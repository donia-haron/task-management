<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=['first_name','last_name','company_id','email','phone_number'];

    use HasFactory;
}
