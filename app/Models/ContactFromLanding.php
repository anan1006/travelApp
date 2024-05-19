<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFromLanding extends Model
{
    use HasFactory, HasUuid;
    protected $primaryKey = "contact_from_landing_id";
    protected $guarded = "contact_from_landing_id";
}
