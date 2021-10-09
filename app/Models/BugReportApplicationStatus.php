<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReportApplicationStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['status'];

    public function bugReportApplication()
    {
        return $this->hasOne(BugReportApplication::class, 'status', 'id');
    }

    public function scopeBugReportApplicationStatus($query)
    {
        return $query->pluck('status','id')->filter(function ($value, $key) {
            return $value != null;
        })->sortKeys();
    }
}
