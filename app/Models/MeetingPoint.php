<?php

namespace App\Models;

use App\Models\Tour;
// use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingPoint extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "meeting_point_id";
    protected $guarded = "meeting_point_id";
    protected $foreignKey = "tour_id";

    public function tour(){
        return $this->belongsTo(Tour::class,'tour_id');
    }
}
