<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Image;
use App\Models\Testimonial;
class TestimonialController extends Controller
{
    public function addTestimonial(){
        return view('backend.create-testimonial');
    }

    public function allTestimonials(){
        $testimonials = Testimonial::all();
        return view('backend.all-testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request){
        $request->validate([
            'fullname'          =>  'required',
            'content'          =>  'required',
            'occupation'          =>  'required',
            'test_image'          =>  'required|mimes:jpeg,jpg,png|max:4000',
        ]);

        $test_image = $request->file('test_image');
        $extension = $test_image->getClientOriginalExtension();
        $filename= time().".".$extension;
        $test_image->move('upload/testimonials/', $filename);
        $resized_image = Image::make(public_path('upload/testimonials/'.$filename))->fit(400, 400)->save();
     
        $image_url = '/upload/testimonials/'.$filename;

        $newTestimony = new Testimonial;
       
        $newTestimony->fullname = $request->fullname;
        $newTestimony->test_image = $image_url;
        $newTestimony->occupation = $request->occupation;
        $newTestimony->content = $request->content;
        $newTestimony->save();
        $notification = array(
            'message' => 'Testimonial successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function testimonialDelete($id){
        $testimony = Testimonial::findOrFail($id);
        
        $path = parse_url($testimony->test_image);

        File::delete(public_path($path['path']));
        $testimony->delete();

         $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function editTestimonial($id){
        $testimonial_data = Testimonial::find($id);
        return view('backend.edit-testimonial', compact('testimonial_data'));
    }

    public function updateTestimonial(Request $request, $id){
        $request->validate([
            'fullname'          =>  'required',
            'content'          =>  'required',
            'occupation'          =>  'required',
        ]);
        $updateTestimonial = Testimonial::findOrFail($id);
        if ($request->hasFile('test_image')) {
              
            $path = parse_url($updateTestimonial->test_image);

            File::delete(public_path($path['path']));

            $test_image = $request->file('test_image');
            
            $extension = $test_image->getClientOriginalExtension();
            $filename= time().".".$extension;
            $test_image->move('upload/testimonials/', $filename);
            $resized_image = Image::make(public_path('upload/testimonials/'.$filename))->fit(400, 400)->save();
        
            $image_url = '/upload/testimonials/'.$filename;

        
            $updateTestimonial->fullname = $request->fullname;
            $updateTestimonial->test_image = $image_url;
            $updateTestimonial->occupation = $request->occupation;
            $updateTestimonial->content = $request->content;
            $updateTestimonial->save();
            $notification = array(
                'message' => 'Testimonial successfully updated',
                'alert-type' => 'success'
            );

            return redirect()->route('testimonial.all')->with($notification);
        }else{
            
            $updateTestimonial->fullname = $request->fullname;
            $updateTestimonial->occupation = $request->occupation;
            $updateTestimonial->content = $request->content;
            $updateTestimonial->save();
            $notification = array(
                'message' => 'Testimonial successfully updated',
                'alert-type' => 'success'
            );

            return redirect()->route('testimonial.all')->with($notification);
        }
       
    }

}
