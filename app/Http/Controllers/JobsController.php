<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Wjob;
use App\Models\ApplyJob;

class JobsController extends Controller
{
    public function showJobs(){
        $jobs_for_user = Wjob::paginate(6);
        return view('jobs', compact('jobs_for_user'));
    }

    public function jobDetails($title){
        $job_slug = $title;
        $job_details = Wjob::where('position_slug', $job_slug)->first();
        return view('job-details', compact('job_details'));
    }
    public function addJob(){
        return view('backend.create-job');
    }

    public function allJobs(){
        $jobs = Wjob::all();
        return view('backend.all-jobs', compact('jobs'));
    }

    public function jobApplyAll(){
        $jobs_applied = ApplyJob::all();
        return view('backend.jobs-apply-all', compact('jobs_applied'));
    }

    public function storeJob(Request $request){
        $request->validate([
            'position'          =>  'required',
            'location'          =>  'required',
            'jobType'          =>  'required',
            'salary'          =>  'required',
            'deadline'          =>  'required',
            'description'          =>  'required',
            'responsibility'          =>  'required',
            'qualification'          =>  'required',
            'vacancy'          =>  'required'
        ]);

        $newJob = new Wjob;
        $url_slug = strtolower($request->position);
        $position_slug= preg_replace('/\s+/', '-', $url_slug);

        $newJob->position = $request->position;
        $newJob->position_slug = $position_slug;
        $newJob->location = $request->location;
        $newJob->jobType = $request->jobType;
        $newJob->salary = $request->salary;
        $newJob->deadline =  $request->deadline;
        $newJob->description =  $request->description;
        $newJob->responsibility =  $request->responsibility;
        $newJob->qualification =  $request->qualification;
        $newJob->vacancy =  $request->vacancy;

        $newJob->save();
        $notification = array(
            'message' => 'Job saved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function jobDelete($id){
        Wjob::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Job Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function jobEdit($id){
        $job_data = Wjob::find($id);
        return view('backend.edit-job', compact('job_data'));
    }

    public function jobUpdate(Request $request, $id){
        $request->validate([
            'position'          =>  'required',
            'location'          =>  'required',
            'jobType'          =>  'required',
            'salary'          =>  'required',
            'deadline'          =>  'required',
            'description'          =>  'required',
            'responsibility'          =>  'required',
            'qualification'          =>  'required',
            'vacancy'          =>  'required'
        ]);

        $updateJob = Wjob::findOrFail($id);

        $updateJob->position = $request->position;
        $updateJob->location = $request->location;
        $updateJob->jobType = $request->jobType;
        $updateJob->salary = $request->salary;
        $updateJob->deadline =  $request->deadline;
        $updateJob->description =  $request->description;
        $updateJob->responsibility =  $request->responsibility;
        $updateJob->qualification =  $request->qualification;
        $updateJob->vacancy =  $request->vacancy;
        $updateJob->save();
        $notification = array(
            'message' => 'Job Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('jobs.all')->with($notification);
    }

    public function applyJob(Request $request){
        $request->validate([
            'fullname'          =>  'required',
            'phoneNumber'          =>  'required',
            'email'          =>  'required',
            'resume'          =>  'required|mimes:pdf|max:1000',
            'jobTitle'          =>  'required',
           
        ]);

        $resume = $request->file('resume');
        $extension = $resume->getClientOriginalName();
        $filename = $extension;
        $resume->storeAs( '/resume' , "/" . $request->full_name . "_windsor" . "." .$filename, 'public');
        $save_url = "storage/resume/" . $request->full_name . "_windsor" . "." .$filename;

        $newApplication = new ApplyJob;
       
        $newApplication->fullname = $request->fullname;
        $newApplication->resume = $save_url;
        $newApplication->phoneNumber = $request->phoneNumber;
        $newApplication->email = $request->email;
        $newApplication->jobTitle = $request->jobTitle;
        $newApplication->cover_letter =  $request->cover_letter;
      
        $newApplication->save();
        $notification = array(
            'message' => 'You have successfully applied for this role',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ApplyDelete($id){
      $application_data =  ApplyJob::findOrFail($id);
        $path = parse_url($application_data->resume);
        File::delete(public_path($path['path']));
        
       $application_data->delete();
         $notification = array(
            'message' => 'Application Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
