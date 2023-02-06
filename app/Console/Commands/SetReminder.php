<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\ReservationCancel;
use App\Models\BookingOrder;
use App\Models\Room;
use Carbon\Carbon;

class SetReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to Client for Reservation cancellation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $to_cancel = BookingOrder::where('created_at', '<=', Carbon::now()->subDay())
        ->where('payment_status', '=', 'Not Paid')
        ->first();
        if($to_cancel){
            $bookingId = $to_cancel->bookingId;
            $apartment_id = $to_cancel->apartment_id;
            Room::where('id', '=', $apartment_id)->update(['status' => "Available"]);
            $email = $to_cancel->user_email;
            Mail::to($email)->send(new ReservationCancel());
            BookingOrder::where('bookingId', '=', $bookingId)->delete();
            return Command::SUCCESS;
        }
    }
}