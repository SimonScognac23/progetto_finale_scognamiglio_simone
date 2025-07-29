<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}