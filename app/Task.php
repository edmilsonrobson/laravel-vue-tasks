<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Task extends Model
{
    protected $guarded = [];

    protected $appends = [
        'formatted_completed_at',
    ];

    protected $dates = [
      'completed_at',
    ];

    public function getFormattedCompletedAtAttribute() {
        if (isset($this->completed_at)){
            return $this->completed_at->toDayDateTimeString();
        }
    }
}
