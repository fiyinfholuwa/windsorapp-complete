<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingOrder;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DateTime;
use App\Models\Room;
class OrderController extends Controller
{
    public function paymentCallback(){
        $response = json_decode($this->verifyPayment(request('reference')));
        
        $data = $response->data;
        $reference = $data->reference;
        // dd($reference);
        $bookingId = $data->metadata->bookingId;
        // dd($bookingId);
        if ($response) {
    
            BookingOrder::where('bookingId',$bookingId)->update(['reference' => $reference, 'payment_status' => "Paid", 'payment_method' => "Online"]);
         
            $notification = array(
                'message' => 'Payment successful',
                'alert-type' => 'success'
            );
    
            return redirect()->route('booking.user')->with($notification);
        } else {
            return back()->withError('something went wrong');
        }
      
    }

    public function makePayment(Request $request){
        $request->validate([
            'checkIn'          =>  'required',
            'checkOut'          =>  'required',
            'guest'          =>  'required',
        ]);
        
      if($request->has('online_pay')){
        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;
        $guest = $request->guest;
        $price = $request->price;
        $user_email = $request->user_email;
        $bookingId = "WindSor".rand(0, 100000);

        $datetime1 = new DateTime($checkIn);
        $datetime2 = new DateTime($checkOut);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days
        $amount = $price * $days * 100;
        $amount_to_save = $amount/100;
        $newBooking = new BookingOrder;

        $newBooking->bookingId = $bookingId;
        $newBooking->checkIn = $request->checkIn;
        $newBooking->checkOut = $request->checkOut;
        $newBooking->user_email = $request->user_email;
        $newBooking->apartment_id = $request->apartment_id;
        $newBooking->guest = $guest;
        $newBooking->price = $amount_to_save;
        $newBooking->payment_status = "Not Paid";
        $newBooking->payment_method = "Online";
        $newBooking->reference = "Not Paid";
        $newBooking->save();

        $updateRoom = Room::findOrFail($request->apartment_id);
        $updateRoom->status = "Unavailable";
        $updateRoom->save();

        $formData = [
            'email' => $user_email,
            'amount' => $amount,
            'currency' => "NGN",
            'metadata' => [ 'bookingId' => $bookingId],
            'callback_url' => route('pay.callback')
        ];
        $pay =json_decode($this->initializePayment($formData));
        if ($pay) {
            if ($pay->status) {
                return redirect($pay->data->authorization_url);
            } else {
                $notification = array(
                    'message' => 'try again later',
                    'alert-type' => 'error'
                );
        
                return back()->with($notification);
            }
            
        } else {
            return back()->withError('something went wrong');
        }
        
      }else{
        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;
        $guest = $request->guest;
        $price = $request->price;
        $user_email = $request->user_email;
        $bookingId = "WindSor".rand(0, 100000);

        $datetime1 = new DateTime($checkIn);
        $datetime2 = new DateTime($checkOut);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days
        $amount = $price * $days * 100;
        $amount_to_save = $amount/100;
        $newBooking = new BookingOrder;

        $newBooking->bookingId = $bookingId;
        $newBooking->checkIn = $request->checkIn;
        $newBooking->checkOut = $request->checkOut;
        $newBooking->user_email = $request->user_email;
        $newBooking->apartment_id = $request->apartment_id;
        $newBooking->guest = $guest;
        $newBooking->price = $amount_to_save;
        $newBooking->payment_status = "Not Paid";
        $newBooking->payment_method = "Offline";
        $newBooking->reference = "Not Specified";
        $newBooking->save();

        $updateRoom = Room::findOrFail($request->apartment_id);
        $updateRoom->status = "Unavailable";
        $updateRoom->save();
        $notification = array(
            'message' => 'Reservation will be removed within 24hours',
            'alert-type' => 'success'
        );

        return redirect()->route('booking.user')->with($notification);
      }
    }
   public function initializePayment($formData){
       $url = "https://api.paystack.co/transaction/initialize";
       $field_string = http_build_query($formData);
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
           "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
           "Cache-control: no-cache"
       ));
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $result = curl_exec($ch);
       curl_close($ch);
       return $result;
   }

   public function verifyPayment($reference){
       $curl = curl_init();
       curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
            "Cache-control: no-cache"
        )
       ));

       $response = curl_exec($curl);
       curl_close($curl);
       return $response;
   }

   public function make_payment_online(Request $request){
        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;
        $guest = $request->guest;
        $price = $request->price;
        $user_email = $request->user_email;
        $bookingId = $request->bookingId;
        $amount  = $price * 100;

        $formData = [
            'email' => $user_email,
            'amount' => $amount,
            'currency' => "NGN",
            'metadata' => [ 'bookingId' => $bookingId],
            'callback_url' => route('pay.callback')
        ];
        $pay =json_decode($this->initializePayment($formData));
        if ($pay) {
            if ($pay->status) {
                return redirect($pay->data->authorization_url);
            } else {
                return back()->withError($pay->message);
            }
            
        } else {
            return back()->withError('something went wrong');
        }
    }

}
