<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReportApplication extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['reported_by', 'email', 'section','sub_section', 'category','attachment', 'user_comment', 
    'report_submitted_at', 'admin1_comment', 'admin1_commented_at', 'admin2_comment', 
    'admin2_commented_at', 'unit_assign', 'published_at', 'unit_comment', 'unit_commented_at', 'status'];


    public function bugReportApplicationCategory(){
        return $this->belongsTo(BugReportApplicationCategory::class,'category','id');
    }

    public function bugReportApplicationSubSection(){
        return $this->belongsTo(BugReportApplicationSubSection::class,'sub_section','id');
    }

    public function bugReportApplicationSection(){
        return $this->belongsTo(BugReportApplicationSection::class,'section','id');
    }

    public function bugReportApplicationUnitAssign(){
        return $this->belongsTo(BugReportApplicationUnitAssign::class,'unit_assign','id');
    }

    public function bugReportApplicationStatus(){
        return $this->belongsTo(BugReportApplicationStatus::class,'status','id');
    }

    // public function bugReportApplicationReportedBy()
    // {
    //     return $this->belongsTo(PortalUser::class,'reported_by', 'cms_id');
    // }
}
