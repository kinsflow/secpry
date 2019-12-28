<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{

    protected  $fillable = ['first_name', 'last_name', 'date_of_birth', 'date_of_admission', 'guardian_phone_number', 'guardian_email',
        'home_address', 'class_id'];


}
