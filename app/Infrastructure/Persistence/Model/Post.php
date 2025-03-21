<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Model;

/**
 * @property int $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $title 
 * @property string $slug 
 * @property string $content 
 * @property int $score 
 */
class Post extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'posts';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'title',
        'slug',
        'content',
        'score',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'score' => 'integer',
    ];
}
