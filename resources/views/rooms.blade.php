@extends('layouts.master')
@section('title')
{{'Rooms'}}
@endsection
@section('content')
@include('layouts.navigation')
 <!-- Breadcrumb Section Begin -->
 <div class="breadcrumb-section mt-7" style="padding-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>All Apartments</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>Apartments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

<section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @if(!empty($rooms))
                @foreach($rooms as $room)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{$room->poster_img}}" alt="">
                        <div class="ri-text">
                            <h4>{{$room->label->room_label}}</h4>
                            <h3>#{{$room->price}}<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                        <td class="r-o">Room Status:</td>
                                       @if($room->status =="Available")
                                       <td><span class="btn btn-success btn-sm">{!!Str::limit(html_entity_decode($room->status),20,"...")!!}</span></td>
                                       @else
                                       <td><span class="btn btn-warning btn-sm">{!!Str::limit(html_entity_decode($room->status),20,"...")!!}</span></td>
                                       @endif
                                        </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>{!!Str::limit(html_entity_decode($room->capacity),20,"...")!!}</td>
                                </tr>
                                
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>{!!Str::limit(html_entity_decode($room->service),20,"...")!!}</td>
                                </tr>
                                </tbody>
                            </table>
                                @if($room->status =="Available")
                                <a href="{{route('room.detail', $room->label->room_label_slug )}}" class="primary-btn">More Details</a>
                                @else
                                <a class="primary-btn " data-toggle="modal" data-target="#exampleModal1" >Unavailable for reservation</a>
                                @endif
                        </div>
                    </div>
                </div>
                @endforeach
            
                <div class="col-lg-12">
                    <div class="room-pagination">
                       
                        {{$rooms->links('paginate')}}
                       
                    </div>
                </div>
            @else
            <div class="text-center text-danger" style="padding:40px 0px"><h3>No Available Room</h3></div>
            @endif
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
    @include('layouts.footer')
@endsection