<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class, 'departamento_pais');
    }

}
