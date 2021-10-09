<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReportApplicationCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['category'];

    public function bugReportApplication()
    {
        return $this->hasOne(BugReportApplication::class, 'category', 'id');
    }

    public function scopeBugReportApplicationCategory($query)
    {
        return $query->pluck('category','id')->filter(function ($value, $key) {
            return $value != null;
        })->sortKeys();
    }
}
