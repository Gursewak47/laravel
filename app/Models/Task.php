<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'task_name',
        'content',
        'assign_to',
        'assign_by',
    ];
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'task_name' => 'string',
        'assign_to' => 'string',
        'assign_by' => 'string',
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
