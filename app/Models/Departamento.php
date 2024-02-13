<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamento
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property CiudadDepartamento[] $ciudadDepartamentos
 * @property DepartamentoPai[] $departamentoPais
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Departamento extends Model
{
    
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
        return $this->hasMany('App\Models\CiudadDepartamento', 'departamento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departamentoPais()
    {
        return $this->hasMany('App\Models\DepartamentoPai', 'departamento_id', 'id');
    }
    

}
