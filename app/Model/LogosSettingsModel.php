<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class LogosSettingsModel extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logos';
    protected $primaryKey = 'logo_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
				'logo_img'
    ];


}
