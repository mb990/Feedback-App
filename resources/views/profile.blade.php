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
@if(count(auth()->user()->activeFeedbacks()))
<div data-userId="{{$user->id}}" class=" modal{{$user->id}}">
    <div class="single-feedback">
        <div class="feedback-person">
            <img class="feedback-image">
            <div class="feedback-person-info">
                <span class="js-user">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                <span class="js-position">{{$user->profile->position}}</span>
            </div>
            <div class="feedback-person-info">Average score: <br>
                <span>{{round(auth()->user()->averageFeedbackScore(), 1)}}</span><span class="star-rating">{{round(auth()->user()->averageFeedbackScore(), 1)}}</span></div>
            <button class="close-btn js-close{{$user->id}}"><i class="fas fa-times"> <br> ESC</i></button>
        </div>
    <div class="row">

        <div class="col-md-12">

            <div class="my-rating"></div>
                @foreach($skills as $skill)
                <span>
                    <p>{{$skill->name}}: <span class="test1">@if($skill->averageForUser(auth()->user())){{$skill->averageForUser(auth()->user())}}</span> @else 0 @endif</p>
                </span>
                @endforeach

            @endif

        </div>

    </div>

    <div class="row">
    <div class="all-feedbacks">
        <div style="flex-grow: 1;">
            <h2>Feedbacks:@if(auth()->user()->activeFeedbacks())({{count(auth()->user()->activeFeedbacks())}}) @else (0) @endif</h2>
        </div>
        <div class="btn-container">
            <button class="all-feedback-btn js-comments"><i class="fas fa-chevron-down"></i></button>

        </div>

    </div>


        <div class="col-md-12 comments">

            @forelse(auth()->user()->activeFeedbacks() as $feedback)
<div class="single-review">
                <div class="user">
                    <img src="https://source.unsplash.com/random" class="user-image">
                    <div class="user-status">
                        <p>{{$feedback->creator->first_name}} {{$feedback->creator->last_name}}
                            avg score: @if($feedback->creator->averageFeedbackScore()){{round($feedback->creator->averageFeedbackScore(), 1)}} @else 0 @endif</p>
                        <p class="position">{{$user->profile->position}}</p>
                    </div>

                </div>
                <div>
                    <h4><i class="fas fa-quote-right red"></i> WHAT IS WRONG</h3>
                    <p class="feed">{{$feedback->comment_wrong}}</p>
                    <h4><i class="fas fa-quote-right red"></i> WHAT COULD BE IMPROVED</h3>
                    <p class="feed">{{$feedback->comment_improve}}</p>
                </div>
            </div>
            @empty

                <p>You dont have any feedback.</p>

            @endforelse

        </div>

    </div>
</div>
</div>
@endsection
