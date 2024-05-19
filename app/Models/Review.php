<?php

namespace App\Models;

use App\Models\Tour;
use App\Models\User;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory,HasUuid;
    protected $primaryKey = "review_id";
    protected $guarded = "review_id";

    public function tour(){
        return $this->belongsTo(Tour::class,"tour_id");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
