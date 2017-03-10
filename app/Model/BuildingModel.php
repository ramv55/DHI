<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class BuildingModel extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'building_details';
    protected $primaryKey = 'building_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
				'roof_type',
				'building_size',
				'address',
				'city',
				'state',
				'zipcode'
    ];


}
