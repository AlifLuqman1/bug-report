<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReportApplicationSubSection extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['sub_section'];

    public function bugReportApplication()
    {
        return $this->hasOne(BugReportApplication::class, 'sub_section', 'id');
    }

    public function scopeBugReportApplicationSubSection($query)
    {
        return $query->pluck('sub_section','id')->filter(function ($value, $key) {
            return $value != null;
        })->sortKeys();
    }
}
