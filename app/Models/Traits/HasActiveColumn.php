<?php

namespace App\Models\Traits;

trait HasActiveColumn {
    /**
     * filter only active records
     */
    public function scopeActive($query)
    {
        return $query->where($this->getActiveColumn(), true);
    }

    function getActiveColumn()
    {
        if (!property_exists($this, "active_column")) {
            return "active";
        }

        return $this->active_column;
    }
}