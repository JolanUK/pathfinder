<?php

namespace App\Pivots;

use App\Models\Module;
use App\Models\Term;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Courses extends Pivot
{
    public function term()
    {
        return $this->belongsTo(Term::class, 'terms_modules');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'terms_modules');
    }
}
