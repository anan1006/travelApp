<?php

namespace App\Models;

use App\Models\Tour;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "destination_id";
    protected $guarded = "destination_id";

    public function tour(){
        return $this->belongsTo(Tour::class,"tour_id");
    }
}
