<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingOrder;
use App\Models\Room;
use App\Models\RoomLabel;
use App\Models\PaymentConfirm;
use App\Models\User;
use Auth;
use Pdf;
use App\Mail\paymentConfirmation;
use Mail;

class MyBookingController extends Controller
{
    public function bpage(){
        $user_email = Auth::user()->email;

        $bookings = BookingOrder::where('user_email', '=', $user_email)
        ->where(function ($query) {
            $query->where('payment_status', '=','Paid')
                  ->orWhere('payment_method', '=', 'Offline');
        })->paginate(10);
        return view('mybooking', compact('bookings'));
    }

    
    public function view_invoice($id){
        $booking = BookingOrder::findOrFail($id);
        $apartment_id = $booking->apartment_id;
        $label_id = Room::where('id', '=', $apartment_id)->first();
        $room_label = RoomLabel::where('id', '=', $label_id->room_label_id)->first();
        $amount_in_word = $this->convertNumber($booking->price);
        return view('invoice', compact('booking', 'room_label', 'amount_in_word'));
    }

    public function download_invoice($id){
        $booking = BookingOrder::findOrFail($id);
        $apartment_id = $booking->apartment_id;
        $label_id = Room::where('id', '=', $apartment_id)->first();
        $room_label = RoomLabel::where('id', '=', $label_id->room_label_id)->first();
        $amount_in_word = $this->convertNumber($booking->price);
        $data = ['booking' => $booking,
                'room_label' => $room_label,
                'amount_in_word'=> $amount_in_word
    ];
        $pdf = Pdf::loadView('invoice', $data);
         return $pdf->download('invoice'.$booking->bookingId.'.pdf');
    }


    public function make_payment($id){
        $booking = BookingOrder::findOrFail($id);
        return view('make_payment', compact('booking'));
    }

  public  function convertNumber($num = false){
    $num = str_replace(array(',', ''), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '' );
        } elseif ($tens >= 20) {
            $tens = (int)($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    $words = implode(' ',  $words);
    $words = preg_replace('/^\s\b(and)/', '', $words );
    $words = trim($words);
    $words = ucfirst($words);
    $words = $words . ".";
    return $words;
}
     public function payment_confirm(Request $request){
        $request->validate([
            'account_name'          =>  'required',
            'bank_name'          =>  'required',
            'amount_sent'          =>  'required',
        ]);
        $newPaymentConfirm = new PaymentConfirm;
        $bookingId = $request->bookingId;
        $amount_sending = $request->amount_sent;
       
        $checkBookingOrder = BookingOrder::where('bookingId' , '=', $bookingId)->first();
        $amount_to_pay = $checkBookingOrder->price;
       
        if ($amount_to_pay > $amount_sending) {
            $notification = array(
                'message' => 'Amount input is less than amount to be paid',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
        $newPaymentConfirm->bookingId = $bookingId;
        $newPaymentConfirm->account_name = $request->account_name;
        $newPaymentConfirm->amount_sent = $request->amount_sent;
        $newPaymentConfirm->bank_name = $request->bank_name;
        $newPaymentConfirm->full_name = $request->name;
        $newPaymentConfirm->email = $request->email;

        $newPaymentConfirm->save();
        $updateBookingOrder = BookingOrder::where('bookingId' , '=', $bookingId)->update(['payment_status' => "Pending"]);
        
        $notification = array(
            'message' => 'Confirmation sent Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('booking.user')->with($notification);
     }

     public function all_booking_admin(){
         $orders = BookingOrder::where('admin_delete', '=', 0)
         ->where('payment_status', '=', 'Paid')
         ->where('time_up', '=', 0)
         ->get();
         return view('backend.active-booking', compact('orders'));
     }
     public function booking_admin_edit($id){
        $bookingD = BookingOrder::findOrFail($id);
        return view('backend.edit-booking', compact('bookingD'));
     }

     public function booking_admin_update(Request $request, $id){
        $updateBooking = BookingOrder::findOrFail($id);
        $time_status = $request->time_up;
        if ($time_status ==1) {
            $apartment_id = $updateBooking->apartment_id;

            $updateRoom = Room::where('id', '=', $apartment_id)->update(['status' => "Available"]);
        }
        $updateBooking->time_up = $time_status;
        
        $updateBooking->save();
        $notification = array(
            'message' => 'Booking Successfully updated',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.booking.all')->with($notification);
     }

     public function booking_admin_delete($id){
        $deleteBooking = BookingOrder::findOrFail($id);

        $deleteBooking->admin_delete = 1;
        $deleteBooking->save();
        
        $notification = array(
            'message' => 'Booking Successfully deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.booking.all')->with($notification); 
     }

     public function booking_admin_reservations(){
        $orders = BookingOrder::where( 'payment_status', '=', "Paid")
        ->where('admin_delete', '=', 0)
        ->orWhere('payment_method', '=', "Offline")->get();
        return view('backend.all_reservations', compact('orders'));
     }

     public function payment_confirm_admin(){
         $confirms = PaymentConfirm::all();
         return view('backend.all_confirms', compact('confirms'));
     }

     public function payment_confirm_admin_edit($id){
        $confirmd = PaymentConfirm::findOrFail($id);
        return view('backend.confirm_edit', compact('confirmd')); 
     }
     public function payment_confirm_admin_delete($id){
        PaymentConfirm::findOrFail($id)->delete();

        $notification = array(
           'message' => 'confirmation Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
     }

     public function payment_confirm_admin_update(Request $request, $id){
        $updateConfirm = PaymentConfirm::findOrFail($id);
        $confirm_status = $request->confirm;
        if ($confirm_status == "accepted") {
            $bookingId = $updateConfirm->bookingId;

            $updateBooking = BookingOrder::where('bookingId', '=', $bookingId)->update(['payment_status' => "Paid"]);
            $msg = "Your payment has been approved, please login to check your details";
            $details = [
                'msg' => $msg
            ];
            $email = $updateConfirm->email;

            Mail::to($email)->send(new paymentConfirmation($details));
        }else{
            $bookingId = $updateConfirm->bookingId;
            $msg = "Your payment has not been approved, please login to check your details";
            $details = [
                'msg' => $msg
            ];
            $email = $updateConfirm->email;
            Mail::to($email)->send(new paymentConfirmation($details));
            $updateBooking = BookingOrder::where('bookingId', '=', $bookingId)->update(['payment_status' => "Not Verified"]);
        }
        $updateConfirm->verify_status = $confirm_status;
        $updateConfirm->save();
        $notification = array(
            'message' => 'Payment Confirmation Successfully updated',
            'alert-type' => 'success'
        );

        return redirect()->route('payment.confirm.admin')->with($notification);
     }
}
