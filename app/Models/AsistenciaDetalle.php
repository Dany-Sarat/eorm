<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AsistenciaDetalle extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
    ];

    protected $table = 'asistencia_detalles';

    public $timestamps = false;

    public function asistencia() : BelongsTo
    {
        return $this->belongsTo(Asistencia::class);
    }

    public function alumno() : BelongsTo 
    {
        return $this->belongsTo(Alumno::class);
    }
}
