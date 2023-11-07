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
        $filename1 = time() . '_' . uniqid() . '.' . $poster_image->getClientOriginalName();
        $resizedImage1 = Image::make($poster_image)->resize(700, 700);
        $poster_image->storeAs( '/rooms/'.$filename1 , $resizedImage1, 'public');
        $image_url1 = "storage/rooms/".$filename1;

        $image_2 = $request->file('image_2');
        $filename2 = time() . '_' . uniqid() . '.' . $image_2->getClientOriginalName();
        $resizedImage2 = Image::make($image_2)->resize(700, 700);
        $image_2->storeAs( '/rooms/'.$filename2 , $resizedImage2, 'public');
        $image_url2 = "storage/rooms/".$filename2;

        $image_3 = $request->file('image_3');
        $filename3 = time() . '_' . uniqid() . '.' . $image_3->getClientOriginalName();
        $resizedImage3 = Image::make($image_3)->resize(700, 700);
        $image_3->storeAs( '/rooms/'.$filename3 , $resizedImage3, 'public');
        $image_url3 = "storage/rooms/".$filename3;

        $image_4 = $request->file('image_4');
        $filename4 = time() . '_' . uniqid() . '.' . $image_4->getClientOriginalName();
        $resizedImage4 = Image::make($image_4)->resize(700, 700);
        $image_4->storeAs( '/rooms/'.$filename4 , $resizedImage4, 'public');
        $image_url4 = "storage/rooms/".$filename4;

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
            $filename1 = time() . '_' . uniqid() . '.' . $poster_image->getClientOriginalName();
            $resizedImage1 = Image::make($poster_image)->resize(700, 700);
            $poster_image->storeAs( '/rooms/'.$filename1 , $resizedImage1, 'public');
            $image_url1 = "storage/rooms/".$filename1;
        }else{
            $image_url1 = $updateRoom->poster_img;
        }

        if ($request->hasFile('image_2')) {
            $path = parse_url($updateRoom->image_2);
            File::delete(public_path($path['path']));
            $image_2 = $request->file('image_2');
            $filename2 = time() . '_' . uniqid() . '.' . $image_2->getClientOriginalName();
            $resizedImage2 = Image::make($image_2)->resize(700, 700);
            $image_2->storeAs( '/rooms/'.$filename2 , $resizedImage2, 'public');
            $image_url2 = "storage/rooms/".$filename2;

        }else{
            $image_url2 = $updateRoom->image_2;
        }

        if ($request->hasFile('image_3')) { 
            $path = parse_url($updateRoom->image_3);
            File::delete(public_path($path['path']));
            $image_3 = $request->file('image_3');
            $filename3 = time() . '_' . uniqid() . '.' . $image_3->getClientOriginalName();
            $resizedImage3 = Image::make($image_3)->resize(700, 700);
            $image_3->storeAs( '/rooms/'.$filename3 , $resizedImage3, 'public');
            $image_url3 = "storage/rooms/".$filename3;

        }else{
            $image_url3 = $updateRoom->image_3;
        }

        if ($request->hasFile('image_4')) { 
            $path = parse_url($updateRoom->image_4);
            File::delete(public_path($path['path']));

            $image_4 = $request->file('image_4');
            $filename4 = time() . '_' . uniqid() . '.' . $image_4->getClientOriginalName();
            $resizedImage4 = Image::make($image_4)->resize(700, 700);
            $image_4->storeAs( '/rooms/'.$filename4 , $resizedImage4, 'public');
            $image_url4 = "storage/rooms/".$filename4;

        }else{
            $image_url4 = $updateRoom->image_4;
        }
            
            $updateRoom->room_label_id = $request->room_label_id;
            $updateRoom->price = $request->price;
            $updateRoom->capacity = $request->capacity;
            $updateRoom->service = $request->services;
            $updateRoom->poster_img = $image_url1;
            $updateRoom->image_2 = $image_url2;
            $updateRoom->image_3 = $image_url3;
            $updateRoom->image_4 = $image_url4;
            $updateRoom->save();
            $notification = array(
                'message' => 'Room successfully updated',
                'alert-type' => 'success'
            );

            return redirect()->route('all.room')->with($notification);
        
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
