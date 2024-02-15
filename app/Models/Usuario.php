<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $nombre
 * @property $vuelo_id
 * @property $pais_id
 * @property $departamento_id
 * @property $ciudad_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ciudade $ciudade
 * @property Departamento $departamento
 * @property Paise $paise
 * @property Vuelo $vuelo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
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
    protected $fillable = ['nombre','vuelo_id','pais_id','departamento_id','ciudad_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ciudade()
    {
        return $this->hasOne('App\Models\Ciudade', 'id', 'ciudad_id'); // Cambié Ciudade a Ciudad
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'departamento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paise()
    {
        return $this->hasOne('App\Models\Paise', 'id', 'pais_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vuelo()
    {
        return $this->hasOne('App\Models\Vuelo', 'id', 'vuelo_id');
    }
    

}
