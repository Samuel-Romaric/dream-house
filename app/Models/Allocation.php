<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_start',
        'date_end',
        'type_id',
        'amenitie_id',
    ];


    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function amenitie()
    {
        return $this->belongsTo(Allocation::class, 'amenitie_id');
    }
}
