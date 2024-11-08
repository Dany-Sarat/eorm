<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nota extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
    ];
    public function seccion() : BelongsTo
    {
        return $this->belongsTo(Seccion::class);
    }
    public function alumno() : BelongsTo
    {
        return $this->belongsTo(Alumno::class);
    }
    public function detalles() : HasMany
    {
        return $this->hasMany(NotaDetalle::class);
    }
}