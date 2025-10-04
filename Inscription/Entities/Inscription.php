<?php

namespace Modules\Inscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;
    protected $table = 'inscription';

    protected $fillable = [
        'address',
        'aircraftOwner',
        'aircraftType',
        'cruiseSpeed',
        'email',
        'firstName',
        'flightHours',
        'fuelType',
        'hotelRoomType',
        'hourlyConsumption',
        'lastName',
        'licenseNumber',
        'licenseValidity',
        'nationality',
        'participants',
        'passportNumber',
        'passportValidity',
        'phone',
        'pilotFirstName',
        'pilotLastName',
        'range',
        'registration',
        'is_preregister',

    ];

    protected $casts = [
        'participants' => 'array', // Automatically casts JSON to array
        'licenseValidity' => 'date',
        'passportValidity' => 'date',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected static function newFactory()
    {
        return \Modules\Inscription\Database\factories\InscriptionFactory::new();
    }
}
