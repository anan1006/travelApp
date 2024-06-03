<?php

namespace App\Models;

use App\Models\Tour;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TourImage extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "tour_image_id";
    protected $guarded = "tour_image_id";

    public function tour(){
        return $this->belongsTo(Tour::class,"tour_id");
    }
}
