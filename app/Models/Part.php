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
        $date = $this->repairs->where('car_id', $car)->sortByDesc('date')->first();
        if (isset($date)) {
            $date  = $date->date;
        return Carbon::parse($date)->format('d-m-Y');
        }else{
            return 'NA';
        }
    }

    public function nrd($car)
    {
        $date = $this->repairs->where('car_id', $car)->sortByDesc('date')->first();
        if (isset($date)) {
            $date  = $date->date;
            return Carbon::parse($date)->addDay($this->duration)->format('d-m-Y');
        } else {
            return 'NA';
        }
    }

    public function needsRepairing($car)
    {
        $now = Carbon::now();
        $nowDate = strtotime(Carbon::now());
        $h_p_n_r = false;

        if($this->nrd($car->id) == 'NA'){
            $partDate = strtotime(Carbon::now()->addDAy(1));
        }else{
            $partDate = strtotime($this->nrd($car->id));
        }
        
            if ($partDate < $nowDate) {
                $h_p_n_r = true;
            }else{
                $h_p_n_r;
            }

       return $h_p_n_r;
    }
}
