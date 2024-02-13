<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CiudadDepartamento
 *
 * @property $id
 * @property $ciudad_id
 * @property $departamento_id
 *
 * @property Ciudade $ciudade
 * @property Departamento $departamento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CiudadDepartamento extends Model
{
    
    static $rules = [
		'ciudad_id' => 'required',
		'departamento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ciudad_id','departamento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ciudade()
    {
        return $this->hasOne('App\Models\Ciudade', 'id', 'ciudad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'departamento_id');
    }
    

}
