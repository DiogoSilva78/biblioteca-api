<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'data_reserva',
        'data_devolucao',
        'estado',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function livros(): BelongsToMany
    {
        return $this->belongsToMany(Livro::class, 'livro_reserva')
            ->withPivot('quantidade')
            ->withTimestamps();
    }
}
