<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomLabel;
class Room extends Model
{
    use HasFactory;
    protected $fillable = ['room_label_id', 'price', 'capacity', 'services', 'poster_image', 'image_2', 'image_3', 'image_4'];

    public function label(){

        return $this->belongsTo(RoomLabel::class, "room_label_id", "id");
    }
}
