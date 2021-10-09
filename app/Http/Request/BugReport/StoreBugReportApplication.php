<?php

namespace App\Http\Request\BugReport;

use Illuminate\Foundation\Http\FormRequest;

class StoreBugReportApplication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reported_by' => 'max:100',
            'email' => 'max:100',
            'section' => 'max:100',
            'sub_section' => 'max:100',
            'category' => 'max:100',
            'attachment' => 'image|nullable|max:9999',
            'user_comment' => 'max:1000',
            //'attachment' => 'required_if:uploaded_file_dummy,==,null|file|mimes:pdf,png,jpg|max:3000',
            'report_submitted_at' => 'max:100',
            'admin1_comment' => 'max:1000',
            'admin1_commented_at' => 'max:100',
            'admin2_comment' => 'max:1000',
            'admin2_commented_at' => 'max:100',
            'unit_assign' => 'max:100',
            'published_at' => 'max:100',
            'unit_comment' => 'max:1000',
            'unit_commented_at' => 'max:100',
            'status' => 'max:100',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'A name is required',
            // 'guard_name.in'  => 'Values must be only either "web" or "api"',
        ];
    }

    public function attributes()
    {
        return [
       
            'reported_by' => 'reported by',
            'email' => 'email',
            'section' => 'section',
            'sub_section' => 'sub_section',
            'category' => 'category',
            'user_comment' => 'user comment',
            'attachment' => 'attachment',
            'report_submitted_at' => 'report submitted at',
            'admin1_comment' => 'admin1 comment',
            'admin1_commented_at' => 'admin1 commented at',
            'admin2_comment' => 'admin2 comment',
            'admin2_commented_at' => 'admin2 commented at',
            'unit_assign' => 'unit assign',
            'published_at' => 'published at',
            'unit_comment' => 'unit comment',
            'unit_commented_at' => 'unit commented at',
            'status' => 'status',
        ];
    }
}
