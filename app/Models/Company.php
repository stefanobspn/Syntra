<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'industry', 'quota', 'rating', 'location'])]
class Company extends Model
{
    /**
     * Get the students placed in this company.
     */
    public function students(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
