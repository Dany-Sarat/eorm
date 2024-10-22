<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Grado extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
    ];
    // relaciones
    public function secciones () : HasMany
    {
        return $this->hasMany(Seccion::class, 'grado_id');
    }
    public function cursos() : BelongsToMany
    {
        return $this->belongsToMany(Curso::class);
    }

    public function tieneCurso(string $id) : ?Model 
    {
        return $this->cursos()->wherePivot('curso_id', $id)->first(['cursos.id', 'cursos.nombre']);
    }
    
    // public function cursos() : HasMany
    // {
    //     return $this->hasMany(Curso::class);
    // }
}