<?php

namespace App\Traits;

use Carbon\Carbon;

trait ManageFormatDateTrait
{
    /**
     * Format created_at date
     *
     * @return string
     */
    public function getCreatedAtFormattedAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }
}
