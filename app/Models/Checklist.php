<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Checklist extends Model
{
    use HasFactory;

    protected $table = 'checklists';

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'due_date'
    ];

    /**
     * Relasi ke model Item (Checklist memiliki banyak Item)
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Relasi ke model User (Checklist dimiliki oleh satu User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
