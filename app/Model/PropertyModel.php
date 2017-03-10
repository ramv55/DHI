<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class PropertyModel extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'property_details';
    protected $primaryKey = 'property_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_name',
				'company_id',
				'contact_name',
				'phone',
				'email',
				'address',
				'city',
				'state',
				'zipcode',
				'prop_img',
				'small_coordinate',
				'large_coordinate',
				'total_buildings',
				'small',
				'medium',
				'large',
				'customer'
    ];


}
