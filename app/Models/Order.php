<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory,HasUuids;
    protected $primaryKey = "order_id";
    protected $guarded = "order_id";


    public function tour(){
        return $this->belongsTo(Tour::class,"tour_id");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
