<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFromLanding extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "contact_from_landing_id";
    protected $guarded = "contact_from_landing_id";
}
