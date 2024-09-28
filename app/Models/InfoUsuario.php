<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class InfoUsuario extends Model
{
    use HasFactory;
    protected function casts() 
    {
        return [
            'fecha_nacimiento' => 'date',
        ];
    }
    protected $guarded = [
        'id',
        'created_at',
    ];
    // relaciones
    public function usuario() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}