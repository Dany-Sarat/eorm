<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Alumno extends Model
{
    use HasFactory;
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function asistencias() : BelongsToMany
    {
        return $this->belongsToMany(Asistencia::class);
    }
    
    public function grado(): BelongsTo
    {
        return $this->belongsTo(Grado::class);
    }

    public function notas() : HasMany
    {
        return $this->hasMany(Nota::class);
    }
    public function seccion() : BelongsTo
    {
        return $this->belongsTo(Seccion::class);
    }

    protected $guarded = [
        'id',
        'created_at',
    ];
}