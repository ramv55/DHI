<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class InspectorsSettingsModel extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inspectors';
    protected $primaryKey = 'inspectors_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
				'lastname',
				'email'
    ];


}
