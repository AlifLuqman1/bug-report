<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReportApplicationUnitAssign extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['unit_assign'];

    public function bugReportApplication(){

        return $this->hasOne(BugReportApplication::class,'unit_assign','id');
    }

    public function scopeBugReportApplicationUnitAssign($query)
    {
        return $query->pluck('unit_assign','id')->filter(function ($value, $key) {
            return $value != null;
        })->sortKeys();
    }
}
