<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'isbn',
        'ano_publicacao',
        'genero',
        'exemplares_disponiveis',
        'autor_id',
    ];

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }

    public function reservas(): BelongsToMany
    {
        return $this->belongsToMany(Reserva::class, 'livro_reserva')
            ->withPivot('quantidade')
            ->withTimestamps();
    }
}
