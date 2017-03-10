<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company_details';
    protected $primaryKey = 'company_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
				'customer',
				'contact_name',
				'phone',
				'email',
				'address',
				'city',
				'state',
				'zipcode',
				'min_radius',
				'min_hail_size',
				'min_wind_size'
    ];


}
