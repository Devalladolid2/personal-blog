<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la entidad Article.
 *
 * Representa un artículo con título, contenido y fecha de publicación.
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon $published_at
 */
class Article extends Model
{
    use HasFactory;

    /**
     * Atributos que pueden asignarse de forma masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'content', 'published_at'];

    /**
     * Casts automáticos de atributos a tipos específicos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
    ];

    /**
     * Desactiva los timestamps automáticos (created_at y updated_at).
     *
     * @var bool
     */
    public $timestamps = false;
}
