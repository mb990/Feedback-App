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

        <div class="edit-user-modal js-user-modal">
            <div class="edit-title">EDIT USER<button class="close-btn edit-btn js-edit-user-close"><i class="fas fa-times"></i></button></div>
            <div class="edit-form-admin">
                <label>First name</label>
                <input class="js-edit-fname" type="text">
                <label>Last name</label>
                <input class="js-edit-lname" type="text">
                <label>Email</label>
                <input class="js-edit-mail" type="email">
                <input type="hidden" name="hidden_user_id" id="hidden_user_id">
                <label for="job-title">Positions:</label>
                <span>
                    <select name="job-title" id="update-job-title">
                        @forelse($positions as $position)

                            <option value="{{$position->id}}">
                                {{$position->name}}
                            </option>

                        @empty

                            <option disabled>No positions</option>

                        @endforelse

                    </select>
                </span>
                <br>
                <br>

                <label style="background-color: rgb(139, 139, 139);" for="user-password">Password</label>
                <input type="password" name="user-password" id="password1" placeholder="New password" required>
                <label style="background-color: rgb(139, 139, 139);" for="password_confirmation">Password Confirm</label>
                <input type="password" name="password_confirmation" id="password-confirm1" placeholder="Confirm new password" required>
                <div>
                    <button type="button" class="admin-btn js-update-password">Update password</button>
                </div>

                <div>
                    <button class="admin-btn js-update-user">Update</button>
                </div>
            </div>
        </div>

        <h2>Admin panel</h2>

        <div id="tabs">
            <ul class="inline-flex tabs">
                <li class="tab"><a class="admin-tab current-tab">Users</a></li>
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

                <table class="admin-table">
                <thead>
                    <tr>
                        <th style="position: sticky;top: 0;background-color: #22282d;">First Name</th>
                        <th style="position: sticky;top: 0;background-color: #22282d;">Last Name</th>
                        <th style="position: sticky;top: 0;background-color: #22282d;">Email</th>
                        <th style="position: sticky;top: 0;background-color: #22282d;">Status</th>
                        <th style="position: sticky;top: 0;background-color: #22282d;">Options</th>
                    </tr>
                </thead>
                <tbody class="js-admins-list">

                </tbody>
            </div>

            <div id="tabs-2" class="tab-view" style="margin-left: 0px; width: 10vw; min-width: 100px;">
                <label for="feedback-time">Change feedback time</label>
                <select name="feedback_time" id="feedback-time">
                    @foreach($durations as $duration)

                        <option value="{{$duration->id}}‬" @if(auth()->user()->company->feedback_duration_id === $duration->id) selected @endif >{{$duration->name}} </option>

                    @endforeach

                </select>
                <button data-id="{{auth()->user()->company->id}}" class="admin-btn admin-btn-feedback-duration">Submit</button>
            </div>

        </div>

    </div>

@endsection


