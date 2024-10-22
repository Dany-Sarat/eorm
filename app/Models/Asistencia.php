<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Asistencia extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
    ];
    // relaciones
    public function seccion() : BelongsTo
    {
        return $this->belongsTo(Seccion::class);
    }
    public function alumnos() : BelongsToMany
    {
        return $this->belongsToMany(Alumno::class);
    }
}