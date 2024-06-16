<?php

namespace App\Models;

use App\Models\Review;
use App\Traits\HasUuid;
use App\Models\TourGuide;
use App\Models\TourImage;
use App\Models\Destination;
use App\Models\MeetingPoint;
use App\Models\TourSchedule;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "tour_id";
    protected $guarded = "tour_id";
    protected $foreignKey = "tour_guide_id";

    public function tour_guide(){
        return $this->belongsTo(TourGuide::class,'tour_guide_id');
    }
    public function meeting_point(){
        return $this->hasMany(MeetingPoint::class,'tour_id');
    }
    public function tour_schedule(){
        return $this->hasMany(TourSchedule::class,'tour_id');
    }
    public function tour_image(){
        return $this->hasMany(TourImage::class,'tour_id');
    }
    public function destination(){
        return $this->hasMany(Destination::class,'tour_id');
    }
    public function review(){
        return $this->hasMany(Review::class,'tour_id');
    }
    public function order(){
        return $this->hasMany(Order::class,'tour_id');
    }
}
