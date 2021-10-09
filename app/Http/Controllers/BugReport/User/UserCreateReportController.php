<?php

namespace App\Http\Controllers\BugReport\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\BugReport\StoreBugReport;
use App\Http\Requests\Modules\BugReport\StoreBugReportApplication;
use App\Http\Requests;
use App\Models\Cmxuser\BugReportApplication;
use App\Models\Cmxuser\BugReportApplicationCategory;
use App\Models\Cmxuser\BugReportApplicationSubmodule;
use App\Models\Cmxuser\BugReportApplicationSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cmsadmin\StaffMain;
use App\Models\Cmsadmin\PortalUser;
use App\Models\Cmxuser\BugReportCategory;
use App\Models\Cmxuser\BugReportUnitAssigned;
use File;
use Carbon\Carbon;
use App\Models\User;

class UserCreateReportController extends Controller
{
    //use UploadTrait;

    public function lookup(){

        $bugReportApplicationCategory = BugReportApplicationCategory::BugReportApplicationCategory()->toArray();

        $bugReportApplicationSubmodule = BugReportApplicationSubmodule::BugReportApplicationSubmodule()->toArray();

        $bugReportApplicationSystem = BugReportApplicationSystem::BugReportApplicationSystem()->toArray();

        return[
            'bugReportApplicationCategory' => $bugReportApplicationCategory,
            'bugReportApplicationSubmodule' => $bugReportApplicationSubmodule,
            'bugReportApplicationSystem' => $bugReportApplicationSystem,
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = $request->perPage ?? 10;

        // if (!empty($keyword)) {
        //     $bugReporApplication = BugReportApplication::where('submodule', 'LIKE', "%$keyword%")
        //         ->orWhere('system', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $bugReporApplication = BugReportApplication::latest()->paginate($perPage);
        // }

        // $getUserId = Auth::user()->staff;
        // $userId = $getUserId->sm_staff_id;
        // $staffMain = StaffMain::findOrFail($userId);

        // return view('app.bug-report.report.user.index', compact('userId','staffMain'));

        return view('bug-report.user.index');

        
    }

    public function create1()
    {
        
        // $parameters = $this->lookup();
        // return view('app.bug-report.report.user.create1')
        // ->with([
        //     'parameters' => $this->lookup(), 'bugReportApplication' => null]);

        return view('bug-report.user.create1');
    }

    public function create2()
    {
        
        // $parameters = $this->lookup();
        // return view('app.bug-report.report.user.create1')
        // ->with([
        //     'parameters' => $this->lookup(), 'bugReportApplication' => null]);

        return view('bug-report.user.create2');
    }

    public function progresslist()
    {
        
        // $parameters = $this->lookup();
        // return view('app.bug-report.report.user.create1')
        // ->with([
        //     'parameters' => $this->lookup(), 'bugReportApplication' => null]);

        return view('bug-report.user.showprogresslist');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        
    }

    public function store(StoreBugReportApplication $request){

        //$request['year'] = 2020;
        //$request['staff_id'] = auth()->user()->username;
        $requestData = $request->validated();
        //$applyStatus = AwardStatus::where('description', 'APPLY')->first();
        //$requestData['verification_status']   = $applyStatus->id;

        $request->merge(['bugreportapplication' => $requestData]);

        $bugreportapplication = BugReportApplication::create($request->bugreportapplication);

        if ($request->hasFile('attachment')) {
            //$file = $this->uploadOneFile($request->uploaded_file, $bugreportuser);
            $file = $request->attachment->storeAs('attachment', $request->attachment->getClientOriginalName());
            $bugreportapplication->attachment = $file;
            $bugreportapplication->save();
        }

        $report_submitted_at = date('Y-m-d H:i:s');
        $bugreportapplication->report_submitted_at = $report_submitted_at;
        $bugreportapplication->save();

        // $getUserId = Auth::user()->staff;
        // $userId = $getUserId->sm_staff_id;
        // $staffMain = StaffMain::findOrFail($userId);
        // $bugreportapplication->reported_by = $staffMain->sm_staff_name;
        // $bugreportapplication->save();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $bugreportapplication->reported_by = $user->username;
        $bugreportapplication->save();

        return redirect('bug-report/bruser-web')->with('success', 'Your report have been succesfully submitted!');
    }

    public function adderror(Request $request){
        $request->validate([
            'error_system'=>'required',
            'error_module'=>'required',
            'error_description'=>'required',
            'error_file'=>'required'
        ]);

        $query = DB::table('bug_report_user')->insert([
            'system'=>$request->input('error_system'),
            'submodule'=>$request->input('error_module'),
            'description'=>$request->input('error_description'),
            'uploaded_file'=>$request->input('error_file'),
        ]);

        if($query){
            return back()->with('success','Your report have been succesfully submitted');
        }
        else{
            return back()->with('fail','Something went wrong');
        }
    }
}
