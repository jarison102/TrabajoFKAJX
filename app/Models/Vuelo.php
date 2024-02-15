<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vuelo
 *
 * @property $id
 * @property $codigo
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Usuario[] $usuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vuelo extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Models\Usuario', 'vuelo_id', 'id');
    }
    

}
