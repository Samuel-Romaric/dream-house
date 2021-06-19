<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenitie extends Model
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

    public function allocations()
    {
        return $this->hasMany(Allocation::class, 'amenitie_id');
    }

    public function hasAllocations()
    {
        return $this->allocations()->exists();
    }

    public function getAllocation()
    {
        if ($this->hasAllocations()) {
            $allocation = Allocation::where('amenitie_id', $this->id)->first();
            // dd($allocation);
            if ($allocation->amenitie_id == $this->id) {
                return true;
            }
        }

        return "No";
    }
}
