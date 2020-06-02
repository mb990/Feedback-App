@extends('layouts.master')

@section('users')

    <div class="user-box">
        <div class="user">
            <img src="https://source.unsplash.com/random" class="user-image">
            <div class="user-status">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <a class="user-name" href="{{route('user.profile', auth()->user()->id)}}">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
                    <span><button type="submit" class="logout-btn">Log out</button></span>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h2><a href="{{route('superadmin.companies')}}">Companies</a></h2>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <h2><a href="{{route('superadmin.skills')}}">Skills</a></h2>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <h2><a href="{{route('superadmin.admins')}}">Admins</a></h2>

        </div>

    </div>

@endsection
