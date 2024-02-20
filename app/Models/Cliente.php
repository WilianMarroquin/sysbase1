<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'cliente';

    public $fillable = [
        'Nombre',
        'Apellido',
        'Direccion',
        'Telefono',
        'Fecha_Nac',
        'Estado'
    ];

    protected $casts = [
        'Nombre' => 'string',
        'Apellido' => 'string',
        'Direccion' => 'string',
        'Fecha_Nac' => 'date',
        'Estado' => 'string'
    ];

    public static $rules = [
        'Nombre' => 'required|string|max:255',
        'Apellido' => 'required|string|max:255',
        'Direccion' => 'required|string|max:255',
        'Telefono' => 'required',
        'Fecha_Nac' => 'required',
        'Estado' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function cuenta(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Cuentum::class, 'Id_Cliente');
    }
}
