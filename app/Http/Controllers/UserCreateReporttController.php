<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BugReportApplicationTest;
use App\Http\Request\BugReport\StoreBugReportApplication;
use Illuminate\Support\Facades\DB;

use App\Models\BugReportApplication;
use App\Models\BugReportApplicationSection;
use App\Models\BugReportApplicationSubSection;
use App\Models\BugReportApplicationCategory;


class UserCreateReporttController extends Controller
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
        // $items = BugReportApplication::all();
        // $items = BugReportApplication::orderBy('name', 'desc')->take(1)->get();
        //return BugReportApplication::where('name', 'Luqman')->get();
        $items = BugReportApplication::orderBy('reported_by', 'desc')->get();
        //$items = BugReportApplication::orderBy('name', 'desc')->paginate(1);

        return view('bug-report.user.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parameters = $this->lookup();
        return view('bug-report.user.create1')->with([
            'parameters' => $this->lookup(), 'bugReportApplication' => null]);;
        // return view('bug-report.user.create1');
        //return view('bug-report.user.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBugReportApplication $request)
    {
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required',
        //     'section'=>'required',
        //     'sub_section'=>'required',
        //     'category'=>'required',
        //     'attachment'=>'required',
        //     'comment'=>'required',
            
        // ]);

        // $query = DB::table('bug_report_applications')->insert([
        //     'name'=>$request->input('name'),
        //     'email'=>$request->input('email'),
        //     'section'=>$request->input('section'),
        //     'sub_section'=>$request->input('sub_section'),
        //     'category'=>$request->input('category'),
        //     'attachment'=>$request->input('attachment'),
        //     'comment'=>$request->input('comment'),
        // ]);

        $requestData = $request->all();

        //$request->merge(['bugreportapplication' => $requestData]);
        $bugreportapplication = BugReportApplication::create($requestData);
        
        // BugReportApplication::create($requestData);

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

        

        // $bugreportapplication = new BugReportApplication;
        // $bugreportapplication->attachment = $fileNameToStore;
        // $bugreportapplication->save();

        

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
        // $data = BugReportApplication::find($id);
        // return view('bug-report.user.show')->with('data', $data);

        $bugReportApplication = BugReportApplication::with(['bugReportApplicationCategory', 'bugReportApplicationSubSection', 'bugReportApplicationSection', 'bugReportApplicationUnitAssign', 'bugReportApplicationStatus'])->findOrFail($id);

        $parameters = $this->lookup();

        return view('bug-report.user.showuploadedattachment')->with([
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
