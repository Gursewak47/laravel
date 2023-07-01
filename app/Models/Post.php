<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tittle',
    ];
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tittle' => 'string',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** @return BelongsTo  */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
