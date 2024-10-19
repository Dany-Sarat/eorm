<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Seccion extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
    ];
    protected $table = 'secciones';
    // relaciones
    public function docente() : BelongsTo
    {
        return $this->belongsTo(User::class, 'docente_id');
    }
    public function grado() : BelongsTo
    {
        return $this->belongsTo(Grado::class);
    }
    public function asistencias() : HasMany
    {
        return $this->hasMany(Asistencia::class);
    }
    public function alumnos() : HasMany
    {
        return $this->hasMany(Alumno::class);
    }
}