<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciudade
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property CiudadDepartamento[] $ciudadDepartamentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ciudade extends Model
{
    protected $table = 'ciudades';
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ciudadDepartamentos()
    {
        return $this->hasMany('App\Models\CiudadDepartamento', 'ciudad_id', 'id');
    }
    

}
