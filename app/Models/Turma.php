<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;
    
    protected $fillable=['nome', 'inicio', 'termino', 'carga_horaria', 'vagas'];
    
    public function curso() {
        return $this->belongsTo(Curso::class);
        
    }
}
