<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Nota extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
    ];
    public function curso() : BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
    public function alumno() : BelongsTo
    {
        return $this->belongsTo(Alumno::class);
    }
}