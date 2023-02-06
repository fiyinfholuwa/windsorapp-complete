<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Wjob;
use App\Models\ApplyJob;
use App\Models\BookingOrder;
use App\Models\PaymentConfirm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function redirect(){
        if (Auth::id()) {

            if (Auth::user()->user_type=='0') {
                return redirect()->route('home');
            }else{
             
             return redirect()->route('dashboard');
            }
        }else{
            return redirect()->back();
        }
    }

    public function showDashboard(){
        $orders = BookingOrder::where('admin_delete', '=', 0)
         ->where('payment_status', '=', 'Paid')
         ->where('time_up', '=', 0)
         ->get();
        $recent_order = BookingOrder::where('payment_status', '=', "Paid")->orderBy('id', "Desc")->offset(0)->limit(5)->get();
        $all_jobs = Wjob::all();
        $all_apply_job = ApplyJob::all();
        $all_user = User::all();
        $all_testimonials = Testimonial::all();
        return view('backend.dashboard', compact('all_jobs', 'all_apply_job', 'all_user', 'all_testimonials', 'recent_order','orders'));
    }

    public function add_user(){
        return view('backend.create-user');
    }

    public function store_user(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_number'=> 'required',
            'password' => 'required',
        ]);

       $newUser = new User;
       $newUser->name = $request->name;
       $newUser->phone_number = $request->phone_number;
       $newUser->email = $request->email;
       $newUser->user_type = $request->user_type;
       $newUser->password = Hash::make($request->password);
       $newUser->save();
        $notification = array(
            'message' => 'User Successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function all_users(){
        $users = User::all();
        return view('backend.all-users', compact('users'));
    }
    public function edit_user($id){
        $user = User::findorFail($id);
        return view('backend.edit-user', compact('user'));
    }

    public function update_user(Request $request, $id){
        $updateUser =  User::findOrFail($id);
        $updateUser->name = $request->name;
        $updateUser->phone_number = $request->phone_number;
        $updateUser->email = $request->email;
        $updateUser->user_type = $request->user_type;
        $updateUser->password = Hash::make($request->password);
        $updateUser->save();
         $notification = array(
             'message' => 'User Successfully updated',
             'alert-type' => 'success'
         );
 
         return redirect()->route('all.users')->with($notification);
    }

    public function delete_user($id){
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();
        $notification = array(
            'message' => 'User deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
