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
                <li class="tab"><a href="#tabs-1">Users</a></li>
                <li class="tab"><a href="#tabs-2">Feedback Time</a></li>
            </ul>
            <div id="tabs-1" class="tab-view">
                <input type="text" name="first_name" placeholder="User first name">
                <input type="text" name="last_name" placeholder="User last name">
                <input type="email" name="email" placeholder="User e-mail">
                <input type="password" name="password" placeholder="User password">
                <input type="password" name="password_confirmation" placeholder="Confirm password">
                <select>
                    @forelse($positions as $position)

                        <option value="{{$position->id}}">
                            {{$position->name}}
                        </option>

                    @empty

                        <option disabled>No positions</option>

                    @endforelse
                </select>
                <button class="admin-btn">Add user</button>

                <table>

                    @forelse(auth()->user()->company->users() as $user)

                        <tr>
                            <th>Name</th>
                            <th>Team</th>
                            <th>Position</th>
                        </tr>
                        <tr>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->company->name}}</td>
                            <td>{{$user->profile->jobTitle->name}}</td>
                        </tr>
                </table>

                @empty

                    no users.

                @endforelse

            </div>

            <div id="tabs-2" class="tab-view">
                <label for="feedback-time">Change feedback time</label>
                <select name="feedback_time" id="feedback-time">
                    <option value="2649600‬">1 month</option>
                    <option value="7948800">3 months</option>
                    <option value="15897600">6 months</option>
                    <option value="31795200‬">12 months</option>
                </select>
                <button class="admin-btn">Submit</button>
            </div>


        </div>






    </div>

@endsection
