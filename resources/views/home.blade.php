@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="container position-relative">
        @if($users != null)
            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-3 col-12 mt-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <img src="{{asset('assets/img/user-default.png')}}" alt="User image" class="img-fluid">
                                <h3 class="text-center mt-2">{{$user->name}}</h3>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-block btn-warning send-message" data-to-user="{{$user->id}}">Message</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center mt-4">There is no user to chat! please another user</div>
        @endif
            <div class="position-fixed" id="chatBox"></div>
    </div>
@endsection