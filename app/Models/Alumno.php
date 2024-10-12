<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Alumno extends Model
{
    use HasFactory;
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];
    protected $guarded = [
        'id',
        'created_at',
    ];
}