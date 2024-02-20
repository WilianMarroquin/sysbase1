<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoMovimiento extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'tipo_movimiento';

    public $fillable = [
        'Descripcion'
    ];

    protected $casts = [
        'Descripcion' => 'string'
    ];

    public static $rules = [
        'Descripcion' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function movimientos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Movimiento::class, 'Id_TipoMov');
    }
}
