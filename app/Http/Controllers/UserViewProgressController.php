<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BugReportApplicationTest;

use App\Models\BugReportApplication;
use App\Models\BugReportApplicationSection;
use App\Models\BugReportApplicationSubSection;
use App\Models\BugReportApplicationCategory;
use App\Models\BugReportApplicationStatus;
use App\Models\BugReportApplicationUnitAssign;

class UserViewProgressController extends Controller
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
        // $items = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->findOrFail($id);

        // $parameters = $this->lookup();

        // //$items = BugReportApplicationTest::all();
        // return view('bug-report.user.showprogresslist')->with([
        //     'items' => $items,
        //     'parameters' => $this->lookup(),
        //     'formMode' => null
        // ]);;
        $items = BugReportApplication::all();
        return view('bug-report.user.showprogresslist')->with(['items' => $items,]);

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
        $bugReportApplication = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->findOrFail($id);

        $parameters = $this->lookup();

        return view('bug-report.user.showprogress')->with([
            'bugReportApplication' => $bugReportApplication,
            'parameters' => $this->lookup(),
            'formMode' => null
        ]);
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

        return view('bug-report.user.showprogress')->with([
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
    public function update(Request $request, $id)
    {
        //
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
