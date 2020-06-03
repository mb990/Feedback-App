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

    <div id="companies-div" class="row">

        <div class="col-md-12">

            <input type="submit" name="companies" id="companies" value="Companies">

        </div>

    </div>

    <div id="skills-div" class="row">

        <div class="col-md-12">

            <input type="submit" name="skills" id="skills" value="Skills">

        </div>

    </div>

    <div id="admins-div" class="row">

        <div class="col-md-12">

            <input type="submit" name="admins" id="admins" value="Admins">

        </div>

    </div>

@endsection
