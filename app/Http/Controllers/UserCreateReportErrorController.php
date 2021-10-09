<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BugReportApplicationTest;
use App\Http\Request\BugReport\StoreBugReportApplication;
use App\Models\BugReportApplication;
use App\Models\BugReportApplicationSection;
use App\Models\BugReportApplicationSubSection;
use App\Models\BugReportApplicationCategory;

class UserCreateReportErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lookup(){

        $bugReportApplicationCategory = BugReportApplicationCategory::BugReportApplicationCategory()->toArray();

        $bugReportApplicationSubSection = BugReportApplicationSubSection::BugReportApplicationSubSection()->toArray();

        $bugReportApplicationSection = BugReportApplicationSection::BugReportApplicationSection()->toArray();

        return[
            'bugReportApplicationCategory' => $bugReportApplicationCategory,
            'bugReportApplicationSubSection' => $bugReportApplicationSubSection,
            'bugReportApplicationSection' => $bugReportApplicationSection,
        ];
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parameters = $this->lookup();
        return view('bug-report.user.create2')->with([
            'parameters' => $this->lookup(), 'bugReportApplication' => null]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBugReportApplication $request)
    {
        $requestData = $request->all();
        $bugreportapplication = BugReportApplication::create($requestData);

        if ($request->hasFile('attachment')) {
            //get file name with extension
            $filenameWithExt = $request->attachment->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->attachment->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->attachment->storeAs('public/attachments', $fileNameToStore);
            $bugreportapplication->attachment = $fileNameToStore;
            $bugreportapplication->save();
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        return redirect('/report')->with('success', 'Your report have been succesfully submitted!');

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
        //
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
