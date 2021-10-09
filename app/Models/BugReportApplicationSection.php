<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReportApplicationSection extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['section'];

    public function bugReportApplication()
    {
        return $this->hasOne(BugReportApplication::class, 'section', 'id');
    }

    public function scopeBugReportApplicationSection($query)
    {
        return $query->pluck('section','id')->filter(function ($value, $key) {
            return $value != null;
        })->sortKeys();
    }
}
