<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\UuidModelTrait;

class Clinic extends Model
{

	public $timestamps = false;
        use UuidModelTrait;
    protected $primaryKey = 'id';
    public $incrementing = false;
    private static $uuidOptimization = true;
    
    protected $fillable = [ 'name',
        'doctor_id' , 'from_time' , 'to_time', 'open_sunday' , 'open_monday','open_tuesday','open_wednesday',
        'open_thursday','open_friday' , 'open_saturday' , 'address',
        'gmap_lat' , 'gmap_lng' , 'default_address'
    ];

    public function is_default()
    {
        return $this->default_address == 1 ? true : false;
    }

    public function appointment()
    {
        return $this->belongsTo('App\Appointment', 'doctor_id');
    }

}
