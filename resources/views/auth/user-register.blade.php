@extends('layouts.master')
@section('navbar', '')
@section('title', 'Create account')

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
                <h3 class="text-center">Create account</h3>
                <form action="{{route('doRegister')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" value="{{old('name')}}"/>
                        @include('partials._error', ['field' => 'name'])
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{old('email')}}"/>
                        @include('partials._error', ['field' => 'email'])
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"/>
                        @include('partials._error', ['field' => 'password'])
                    </div>
                    <div class="form-group">
                        <input type="submit" value="CREATE ACCOUNT" class="btn btn-block  btn-warning">
                    </div>
                </form>
                <div class="d-flex w-100">
                    <div>Already have an account?</div>
                    <a href="{{route('userLogin')}}" class="ml-auto">Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
