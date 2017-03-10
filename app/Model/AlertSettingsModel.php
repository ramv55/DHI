<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AlertSettingsModel extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alert_settings';
    protected $primaryKey = 'alert_settings_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mile_radius',
				'hail_size',
				'wind_speed'
    ];


}
