<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovidSurvey extends Model
{
    protected $table = 'covid_survey';

    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'division',
        'gender',
        'vaccine_doses',
        'problems',
        'symptoms',
        '1_dose_name',
        '2_dose_name',
        '3_dose_name',
        '4_dose_name',
    ];

    protected $casts = [
        'symptoms' => 'array',
    ];
}
