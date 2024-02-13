<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DepartamentoPai
 *
 * @property $id
 * @property $departamento_id
 * @property $pais_id
 *
 * @property Departamento $departamento
 * @property Paise $paise
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DepartamentoPai extends Model
{
    
    static $rules = [
		'departamento_id' => 'required',
		'pais_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['departamento_id','pais_id'];


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
    

}
