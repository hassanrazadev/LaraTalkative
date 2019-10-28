@extends('layouts.master')
@section('navbar', '')
@section('title', 'Login')

@section('styles')

@endsection

@section('content')
    <div class="container h-100vh d-flex w-100">
        <div class="row w-100 align-self-center">
            <div class="col-md-6 text-center border-right border-warning">
                <div class="d-flex w-100 h-100">
                    <div class="align-self-center">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets/img/chat-logo.png')}}" alt="Chat Logo" class="img-fluid chat-img-login">
                        </a>
                        <h1>{{config('app.name')}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Login</h3>
                <form action="{{route('doLogin')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{old('email')}}"/>
                        @include('partials._error', ['field' => 'email'])
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"/>
                        @include('partials._error', ['field' => 'password'])
                    </div>
                    <div class="form-group">
                        <input type="submit" value="LOGIN" class="btn btn-block  btn-warning">
                    </div>
                </form>
                <div class="d-flex w-100">
                    <div>Don't have and account?</div>
                    <a href="{{route('userRegister')}}" class="ml-auto">Create account</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('echo-script')
@stop
