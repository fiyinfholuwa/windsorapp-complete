<?php

namespace App\Http\Controllers;
use App\Models\RoomLabel;
use App\Models\Room;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
class RoomsController extends Controller
{
    public function roomDetails(Request $request, $name){
        $label_slug = $name;
        $check_label_slug = RoomLabel::where('room_label_slug', $label_slug)->get()->first();
        $label_name = $check_label_slug->room_label;
        $label_id = $check_label_slug->id;
        $get_room_detail = Room::where('room_label_id', $label_id)->get()->first();
        $room_id = $get_room_detail->id;
        $fetch_reviews = Review::where('room_id', $room_id)->get();
        $reviews = $fetch_reviews;
        // update room details review 
        
        return view('room_details', compact('get_room_detail', 'label_name', 'reviews'));
    }
    public function showRooms(){
        $rooms  = Room::paginate(6);
        return view('rooms', compact('rooms'));
    }

    public function view_room_manage(){
        $get_all_labels = RoomLabel::all();
        return view('backend.manage-room-label', compact('get_all_labels'));
    }

    public function storeLabel(Request $request){
        $request->validate([
            'room_label'   =>  'required'
        ]);

        $newLabel = new RoomLabel;
        $url_slug = strtolower($request->room_label);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $newLabel->room_label = $request->room_label;
        $newLabel->room_label_slug = $label_slug;
        $newLabel->label_status = "pending";
        $newLabel->save();

        $notification = array(
            'message' => 'Room Label saved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editLabel($id){
        $room_label = $id;
        $room_label_d = RoomLabel::where('id', $room_label)->first();
        $get_all_labels = RoomLabel::all();
        return view('backend.manage-room-label-edit', compact('get_all_labels', 'room_label_d'));
    }

    public function deleteLabel($id){
        RoomLabel::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Room Label Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('room.manage')->with($notification);
    }

    public function updateLabel(Request $request, $id){
        $request->validate([
            'room_label'    =>  'required'
        ]);

        $updateLabel = RoomLabel::findOrFail($id);
        $url_slug = strtolower($request->room_label);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $updateLabel->room_label = $request->room_label;
        $updateLabel->room_label_slug = $label_slug;
       
        $updateLabel->save();
        $notification = array(
            'message' => 'Room Label updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('room.manage')->with($notification);
    }

    public function addRoom(){
        $fetch_room_label = RoomLabel::where('label_status', "pending")->get();
        return view('backend.create-room', compact('fetch_room_label'));
    }


    public function storeRoom(Request $request){
        $request->validate([
            'room_label_id'          =>  'required',
            'price'          =>  'required',
            'capacity'          =>  'required',
            'services'          =>  'required',
            'poster_image'          =>  'required|mimes:jpeg,jpg,png|max:4000',
            'image_2'          =>  'required|mimes:jpeg,jpg,png|max:4000',
            'image_3'          =>  'required|mimes:jpeg,jpg,png|max:4000',
            'image_4'          =>  'required|mimes:jpeg,jpg,png|max:4000',
            
        ]);

        $poster_image = $request->file('poster_image');
        $extension1 = $poster_image->getClientOriginalExtension();
        $filename1= rand (10,10000000).".".$extension1;
        $poster_image->move('upload/rooms/', $filename1);
        $resized_image1 = Image::make(public_path('upload/rooms/'.$filename1))->fit(700, 700)->save();
        $image_url1 = '/upload/rooms/'.$filename1;

        $image_2 = $request->file('image_2');
        $extension2 = $image_2->getClientOriginalExtension();
        $filename2= rand (10,1000000000).".".$extension2;
        $image_2->move('upload/rooms/', $filename2);
        $resized_image2 = Image::make(public_path('upload/rooms/'.$filename2))->fit(700, 700)->save();
        $image_url2 = '/upload/rooms/'.$filename2;

        $image_3 = $request->file('image_3');
        $extension3 = $image_3->getClientOriginalExtension();
        $filename3= rand (10,1000000000).".".$extension3;
        $image_3->move('upload/rooms/', $filename3);
        $resized_image3 = Image::make(public_path('upload/rooms/'.$filename3))->fit(700, 700)->save();
        $image_url3 = '/upload/rooms/'.$filename3;

        $image_4 = $request->file('image_4');
        $extension4 = $image_4->getClientOriginalExtension();
        $filename4= rand (10,1000000000).".".$extension4;
        $image_4->move('upload/rooms/', $filename4);
        $resized_image4 = Image::make(public_path('upload/rooms/'.$filename4))->fit(700, 700)->save();
        $image_url4 = '/upload/rooms/'.$filename4;


        $newRoom = new Room;
       
        $newRoom->room_label_id = $request->room_label_id;
        $newRoom->price = $request->price;
        $newRoom->capacity = $request->capacity;
        $newRoom->service = $request->services;
        $newRoom->poster_img = $image_url1;
        $newRoom->image_2 = $image_url2;
        $newRoom->image_3 = $image_url3;
        $newRoom->image_4 = $image_url4;
        $newRoom->status = "Available";
        $newRoom->save();
        
        // updating room label after attaching it to the room 

        $updateLabel = RoomLabel::findOrFail($request->room_label_id);
        $updateLabel->label_status = "active";
        $updateLabel->save();

        $notification = array(
            'message' => 'Room unit successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function allRooms(){
        $rooms = Room::all();
        return view('backend.all-rooms', compact('rooms'));
    }

    public function editRoom($id){
        $get_room = Room::findOrFail($id);
        $fetch_room_label = RoomLabel::where('label_status', "pending")->get();
        return view('backend.edit-room', compact('get_room', 'fetch_room_label'));
    }

    public function deleteRoom($id){
        $room_d = Room::findOrFail($id);
        
        $path1 = parse_url($room_d->poster_image);
        $path2 = parse_url($room_d->image_2);
        $path3 = parse_url($room_d->image_3);
        $path4 = parse_url($room_d->image_4);

        File::delete(public_path($path1['path']));
        File::delete(public_path($path2['path']));
        File::delete(public_path($path3['path']));
        File::delete(public_path($path4['path']));
        $room_d->delete();

         $notification = array(
            'message' => 'room deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateRoom(Request $request, $id){
        $request->validate([
            'room_label_id'          =>  'required',
            'price'          =>  'required',
            'capacity'          =>  'required',
            'services'          =>  'required', 
        ]);
        $updateRoom = Room::findOrFail($id);
        if ($request->hasFile('poster_image')) {
              
            $path = parse_url($updateRoom->poster_img);

            File::delete(public_path($path['path']));

            $poster_image = $request->file('poster_image');
            
            $extension = $poster_image->getClientOriginalExtension();
            $filename= time().".".$extension;
            $poster_image->move('upload/rooms/', $filename);
            $resized_image = Image::make(public_path('upload/rooms/'.$filename))->fit(700, 700)->save();
        
            $image_url = '/upload/rooms/'.$filename;

            
            $updateRoom->room_label_id = $request->room_label_id;
            $updateRoom->price = $request->price;
            $updateRoom->capacity = $request->capacity;
            $updateRoom->service = $request->services;
            $updateRoom->poster_img = $image_url;
           
             $updateRoom->save();
            $notification = array(
                'message' => 'Room successfully updated',
                'alert-type' => 'success'
            );

            return redirect()->route('all.room')->with($notification);
        }else{
            
            $updateRoom->room_label_id = $request->room_label_id;
            $updateRoom->price = $request->price;
            $updateRoom->capacity = $request->capacity;
            $updateRoom->service = $request->services;
            $updateRoom->save();
            $notification = array(
                'message' => 'Room successfully updated',
                'alert-type' => 'success'
            );

            return redirect()->route('all.room')->with($notification);
        }
       
    }

    // review section for each room 

    public function storeReview(Request $request){
        $request->validate([
            'room_id'          =>  'required',
            'reviewer_name'    =>  'required',
            'review_content'   =>  'required', 
        ]);

        $newReview = new Review;
    
        $newReview->room_id = $request->room_id;
        $newReview->reviewer_name = $request->reviewer_name;
        $newReview->review_content =  $request->review_content;
        $newReview->save();

        $notification = array(
            'message' => 'Review Successfully saved',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function allReview(){
        $reviews = Review::all();
        return view('backend.reviews', compact('reviews'));
    }
    public function deleteReview($id){
        Review::findOrFail($id)->delete();

         $notification = array(
            'message' => 'review deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('review.all')->with($notification);
    }

}
