<?php

namespace App\Models;

use App\Models\Tour;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TourGuide extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "tour_guide_id";
    protected $guarded = "tour_guide_id";

    public function tour(){
        return $this->hasMany(Tour::class,'tour_guide_id');
    }
}
