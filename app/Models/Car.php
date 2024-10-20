<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'brand_id',
        'type_id',
        'year',
        'kilometers',
        'license_date',
        'license',
        'l_r_t',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'brand_id' => 'integer',
        'type_id' => 'integer',
        'license_date' => 'date',
    ];

    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hasPartsNeedRepairing()
    {
        $parts = Part::all();
        $now = Carbon::now();
        $nowDate = strtotime(Carbon::now());
        $h_p_n_r = 'false';
        
        foreach ($parts as $part) {
            if($part->nrd($this->id) == 'NA'){
                $partDate = strtotime(Carbon::now()->addDay(1));
            }else{
                $partDate = strtotime($part->nrd($this->id));
            }
            if ($partDate < $nowDate) {
                $h_p_n_r = 'true';
            }else{
                $h_p_n_r;
            }
        }
       return $h_p_n_r;
    }
}
