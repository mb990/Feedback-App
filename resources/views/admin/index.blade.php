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

    <div class="admin">
        <h2>Admin panel</h2>

        <div id="tabs">
            <ul class="inline-flex tabs">
                <li class="tab"><a class="admin-tab current-tab"href="#tabs-1">Users</a></li>
            </ul>
            <div id="tabs-1" class="tab-view">
                <input type="text" name="first-name" id="first-name" placeholder="User first name">
                <input type="text" name="last-name" id="last-name" placeholder="User last name">
                <input type="email" name="email" id="email" placeholder="User e-mail">
                <input type="hidden" name="company-id" id="company-id" value="{{auth()->user()->company_id}}">
                <input type="password" name="password" id="password" placeholder="User password">
                <input type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm password">
                <select name="job-title" id="job-title">
                    @forelse($positions as $position)

                        <option value="{{$position->id}}">
                            {{$position->name}}
                        </option>

                    @empty

                        <option disabled>No positions</option>

                    @endforelse

                </select>

                <button class="admin-btn">Add user</button>

                <table class="js-admins-list">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>

{{--                    @dd(auth()->user()->company->users())--}}
                    @forelse(auth()->user()->company->users() as $user)

                        <!-- <tr>
                            <th>Name</th>
                            <th>Team</th>
                            <th>Position</th>
                        </tr> -->
{{--                        <tr>--}}
{{--                            <td>{{$user->first_name}} {{$user->last_name}}</td>--}}
{{--                            <td>{{$user->company->name}}</td>--}}
{{--                            <td>{{$user->profile->jobTitle->name}}</td>--}}
{{--                        </tr>--}}
                </table>

                @empty

                    no users.

                @endforelse

            </div>

            <div id="tabs-2" class="tab-view" style="margin-left: 0px; width: 10vw; min-width: 100px;">
                <label for="feedback-time">Change feedback time</label>
                <select name="feedback_time" id="feedback-time">
                    @foreach($durations as $duration)

                        <option value="{{$duration->id}}‬" @if(auth()->user()->company->feedback_duration_id === $duration->id) selected @endif >{{$duration->name}} </option>

                    @endforeach

                </select>
                <button data-id="{{auth()->user()->company->id}}" class="admin-btn-feedback-duration">Submit</button>
            </div>

        </div>

    </div>

@endsection

@section('script')
<script>
    $( function() {
        $( "#tabs" ).tabs();
    } );
</script>
@endsection
