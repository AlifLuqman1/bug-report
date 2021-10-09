<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BugReportApplication;

use App\Models\BugReportApplicationSection;
use App\Models\BugReportApplicationSubSection;
use App\Models\BugReportApplicationCategory;
use App\Models\BugReportApplicationStatus;
use App\Models\BugReportApplicationUnitAssign;
use App\Http\Request\BugReport\StoreBugReportApplication;
use Carbon\Carbon;

class Admin3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lookup()
    {
        $bugReportApplicationCategory = BugReportApplicationCategory::BugReportApplicationCategory()->toArray();
        $bugReportApplicationSubSection = BugReportApplicationSubSection::BugReportApplicationSubSection()->toArray();
        $bugReportApplicationSection = BugReportApplicationSection::BugReportApplicationSection()->toArray();
        $bugReportApplicationUnitAssign = BugReportApplicationUnitAssign::BugReportApplicationUnitAssign()->toArray();
        $bugReportApplicationStatus = BugReportApplicationStatus::BugReportApplicationStatus()->toArray();

        return [

            'bugReportApplicationCategory' => $bugReportApplicationCategory,
            'bugReportApplicationSubSection' => $bugReportApplicationSubSection,
            'bugReportApplicationSection' => $bugReportApplicationSection,
            'bugReportApplicationUnitAssign' => $bugReportApplicationUnitAssign,
            'bugReportApplicationStatus' => $bugReportApplicationStatus,
        ];
    }

    public function index()
    {
        $data = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->where('status', '4')->orWhere('status', '5')->get();

        $checkedData = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->where('status', '6')->orWhere('status', '7')->get();

        //$returnData = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->where('status', '6')->orWhere('status', '7')->get();
        
        return view('bug-report.admin.indexadmin3', compact('data','checkedData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bugReportApplication = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->findOrFail($id);

        $parameters = $this->lookup();

        return view('bug-report.admin.createadmin3')->with([
            'bugReportApplication' => $bugReportApplication,
            'parameters' => $this->lookup(),
            'formMode' => null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBugReportApplication $request, $id)
    {
        $requestData = $request->validated();
        $bugReportApplication = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->findOrFail($id);
        $bugReportApplication->update($requestData);

        $unit_commented_at = Carbon::now();
        // $admin1_commented_at = date('Y-m-d H:i:s');
        $bugReportApplication->unit_commented_at = $unit_commented_at;
        $bugReportApplication->save();


        return redirect('/admin3notify')->with('success', 'Your comment successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
