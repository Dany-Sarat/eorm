<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class InfoDocente extends Model
{
    use HasFactory;
    protected function casts() 
    {
        return [
            'inicio_laboral' => 'date',
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