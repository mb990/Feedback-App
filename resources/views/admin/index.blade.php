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

    @if(!auth()->user()->active)
        <h2>Your account is temporarily deactivated</h2>
    @else

    <div class="admin">

        <div class="edit-user-modal js-user-modal">
            <div class="edit-title">EDIT USER<button class="close-btn edit-btn js-edit-user-close"><i class="fas fa-times"></i></button></div>
            <div class="edit-form-admin">
                <div>
                <label>First name</label>
                <input class="js-edit-fname" type="text" required>
                <br>
                <label>Last name</label>
                <input class="js-edit-lname" type="text" required>
                <br>
                <label>User email</label>
                <input class="js-edit-mail" type="email" required>
                <br>
                <input type="hidden" name="hidden_user_id" id="hidden_user_id">
                <label for="job-title">Positions:</label>
                <span>
                    <select name="job-title" id="update-job-title" required>
                        @forelse($positions as $position)

                            <option value="{{$position->id}}">
                                {{$position->name}}
                            </option>

                        @empty

                            <option disabled>No positions</option>

                        @endforelse

                    </select>
                </span>
            </div>
                <br>
                <div style="background-color: rgb(139, 139, 139);">
{{--                    <form name="picture-form" id="picture-form" enctype="multipart/form-data">--}}
                <label for="add-img">Add profile picture</label>
                <br>
                    <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" id="file" required />
                        <button type="submit">Submit</button>
                    </form>
{{--                    </form>--}}
                </div>
                <br>
                <div style="background-color: rgb(139, 139, 139);">
                <label style="background-color: rgb(139, 139, 139);" for="user-password">Password</label>
                <input type="password" name="user-password" id="password1" placeholder="New password" required>
                <br><label style="background-color: rgb(139, 139, 139);" for="password_confirmation">Password Confirm</label>
                <input type="password" name="password_confirmation" id="password-confirm1" placeholder="Confirm new password" required>
                </div>
                <div style="text-align: center;">
                    <button type="button" class="admin-btn js-update-password">Update password</button>
                </div>

                <div style="text-align: center;">
                    <button class="admin-btn js-update-user">Update</button>
                </div>
            </div>
        </div>

        <h2>{{auth()->user()->first_name}}, welcome to admin panel
            <br>
            Company: {{auth()->user()->company->name}}</h2>

        <div id="tabs">
            <ul class="inline-flex tabs">
                <li class="tab"><a class="admin-tab current-tab" href="#tabs-1">Users</a></li>
                <!-- <li class="tab"><a class="admin-tab current-tab" href="#tabs-2">Feedback time</a></li> -->
            </ul>
            <div id="tabs-1" class="js-edit-form tab-view admin-width">
                <div>
                    <button class="js-show-new-user admin-btn" style="width: 10vw">New user</button>
                    <button class="js-show-time-update admin-btn" style="width: 10vw; margin-left: 15vw;">Edit time</button>
                    <button class="js-stats admin-btn" style="width: 10vw; margin-left: 15vw;">Statistics</button>
                </div>
                <div style="display: flex; width: 50vw;">
                <div style="flex-grow: 1;">
                    <div class="js-interactive-text" style="padding: 5px; border: 1px solid #ec1940; font-size: 2rem;">
                        Add new <br> user to your <br> company
                    </div>
                <div  class="admin-modal js-admin-modal">
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
                <br>
                <form id="upload-new-image" action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="image" required />
                </form>
                <br>
                <button class="js-add-user admin-btn">Add user</button>
                </div>
                </div>
                <div style="flex-grow: 1;">
                    <div class="js-feedback-interval admin-modal-right"style="margin-left:10px; padding: 5px; border: 1px solid #ec1940; font-size: 2rem;">
                        Change your <br> feedback time interval
                    </div>
                <div id="tabs-2" class="admin-modal2 js-tab-2 admin-modal-right">
                <label for="feedback-time">Change feedback time</label>
                <select name="feedback_time" id="feedback-time">
                    @foreach($durations as $duration)

                        <option value="{{$duration->id}}‬" @if(auth()->user()->company->feedback_duration_id === $duration->id) selected @endif >{{$duration->name}} </option>

                    <!-- <label for="add-img">Add profile picture</label>
                    <br>
                    <input name="add-img" id="add-img" type='file' />

                <button class="admin-btn js-add-user">Add user</button> -->
                    @endforeach

                </select>
                <button data-id="{{auth()->user()->company->id}}" class="admin-btn admin-btn-feedback-duration">Submit</button>
            </div>
            </div>
            <div style="flex-grow: 1;">
                <div class="js-stats-info" style="margin-left:10px; padding: 5px; border: 1px solid #ec1940; font-size: 2rem;">
                statiskitka ide ovde <br> <hr>
                i ovde isto ide
                </div>
                <div class="js-statistics">

                </div>
            </div>
            </div>
                <table class="admin-table">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ec1940;position: sticky;top: 0;background-color: #22282d;">First Name</th>
                        <th style="border: 1px solid #ec1940;position: sticky;top: 0;background-color: #22282d;">Last Name</th>
                        <th style="border: 1px solid #ec1940;position: sticky;top: 0;background-color: #22282d;">Email</th>
                        <th style="border: 1px solid #ec1940;position: sticky;top: 0;background-color: #22282d;">Position</th>
                        <th style="border: 1px solid #ec1940;position: sticky;top: 0;background-color: #22282d;">Status</th>
                        <th style="border: 1px solid #ec1940;position: sticky;top: 0;background-color: #22282d;">Options</th>
                    </tr>
                </thead>
                <tbody class="js-admins-list">

                </tbody>
            </table>
            </div>



        </div>

    </div>

@endif

@endsection


@section('script')
    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
        $(document).ready(function(e){
            $("#uploadimage").on('submit',(function(e) {
                e.preventDefault();
                let form_data = new FormData();
                form_data.append('picture', $('#file')[0].files[0]);
                form_data.append('_method', 'PUT');
                $.ajax({
                    url: "/admin/users/" + $('#hidden_user_id').val() + "/update/picture",
                    type: "post",             // Type of request to be send, called as method
                    data: form_data,         // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(data)   // A function to be called if request succeeds
                    {
                        console.log(data.request)
                    }
                }).done(alert('Picture is updated'));
            }))
        })
    </script>
@endsection
