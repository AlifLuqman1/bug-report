<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReportApplicationTest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'section', 'sub_section', 'category', 'attachment', 'comment'];
}
