<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoCuenta extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'tipo_cuenta';

    public $fillable = [
        'descripcion'
    ];

    protected $casts = [
        'descripcion' => 'string'
    ];

    public static $rules = [
        'descripcion' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function cuenta(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Cuentum::class, 'tipo_cuenta_id');
    }
}
