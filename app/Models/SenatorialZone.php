<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['state_id', 'title', 'status'])]
class SenatorialZone extends BaseModel {}
