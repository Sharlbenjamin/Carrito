<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Carbon\Carbon;

class Part extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'duration',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function repairParts(): HasMany
    {
        return $this->hasMany(RepairPart::class);
    }

    public function repairs(): BelongsToMany
    {
        return $this->belongsToMany(Repair::class, 'repair_parts');
    }

    public function lrd($car)
    {
        $date = $this->repairs->where('car_id', $car)->sortByDesc('date')->first()->date;
        return Carbon::parse($date)->format('d-m-Y');
    }

    public function nrd($car)
    {
        $date = $this->repairs->where('car_id', $car)->sortByDesc('date')->first()->date;

        return Carbon::parse($date)->addDay($this->duration)->format('d-m-Y');
    }
}
