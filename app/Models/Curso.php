<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Curso extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
    ];
    // relaciones
    public function grados() : BelongsToMany
    {
        return $this->belongsToMany(Grado::class);
    }
    // public function grado() : BelongsTo
    // {
    //     return $this->belongsTo(Grado::class);
    // }
    public function notas() : HasMany
    {
        return $this->hasMany(Nota::class);
    }
}