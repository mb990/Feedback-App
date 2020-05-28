@extends('layouts.master')

@section("users")
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
        <div class="search-area">
            <h4>YOUR TEAMMATES</h4>
            <input class="search-teammate js-search js-live-search" type="search" placeholder="Search a teammate">
            <ul class="list">

                @forelse($users as $user)

                    <li data-userId="{{$user->id}}" class="teammate js"><a href="#"><img src="https://source.unsplash.com/random" class="teammate-image"></a> <a href="#" class="teammate-name js{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</a>@if($user->hasFeedback())<i class="fas fa-check reviewed"></i>@endif</li>
                <!-- @if($user->hasFeedback())<i class="fas fa-check reviewed"></i>@endif -->

                @empty

                    <p>No users in this team.</p>

                @endforelse
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <p>Average score: {{$data['average_score']}}</p><br>

            @foreach($data['skills_score'] as $key => $score)

                <p>Skill {{$key}}: {{$score}}</p>

            @endforeach

        </div>

    </div>

    <div class="row">

        <h2>Feedbacks:@if(auth()->user()->activeFeedbacks())({{count(auth()->user()->activeFeedbacks())}}) @else (0) @endif</h2>

        <div class="col-md-12">

            @forelse(auth()->user()->activeFeedbacks() as $feedback)

                <div class="user">
                    <img src="https://source.unsplash.com/random" class="user-image">
                    <div class="user-status">
                        <p>{{$feedback->creator->first_name}} {{$feedback->creator->last_name}} avg score: neki value}</p>
                    </div>
                </div>

            @empty

                <p>You dont have any feedback.</p>

            @endforelse

        </div>

    </div>

@endsection
