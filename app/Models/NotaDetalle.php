<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class NotaDetalle extends Model
{
    use HasFactory;
    protected $guarded = [
        'id', 
        'created_at',
    ];
    protected $table = 'notas_detalle';
    public function nota() : BelongsTo
    {
        return $this->belongsTo(Nota::class);
    }
    public function curso() : BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
} 