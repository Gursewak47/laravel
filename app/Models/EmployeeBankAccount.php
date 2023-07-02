<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeBankAccount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'account_name',
        'code',
        'account_number'
    ];
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'account_name' => 'string',
        'code' => 'string',
        'account_number' => 'string'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** @return BelongsTo  */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
