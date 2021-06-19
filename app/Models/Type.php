<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
    ];

    public function rooms()
    {
        return $this->hasMany(Type::class, 'room_id');
    }

    public function allocations()
    {
        return $this->hasMany(Allocation::class, 'type_id');
    }
}
