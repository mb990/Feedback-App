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
            <h2>Superadmin panel</h2>

            <div id="tabs">
                <ul class="inline-flex tabs">
                    <li class="tab"><a class="admin-tab current-tab" href="#tabs-1">All Companies</a></li>
                    <li class="tab"><a class="admin-tab" href="#tabs-2">All Admins</a></li>
                    <li class="tab"><a class="admin-tab" href="#tabs-3">All Skills</a></li>
                    <li class="tab"><a class="admin-tab" href="#tabs-4">All Job Titles</a></li>
                </ul>
                <div id="tabs-1" class="tab-view">
                    <span>
                        Companies:<br>
                        <input class="js-company" value="" placeholder="Add company name"><button class="super-admin-btn js-add-company-btn">ADD</button>
                        <input class="search-company" type="search" placeholder="Search company"><i class="js-find-company fas fa-search"></i>
                        <div class="js-companies">
                        </div>
                    </span>
                </div>
                <div id="tabs-2" class="tab-view">
                <span>
                    Admins:<br><button class="js-superadmin-modal-btn js-new-admin-title super-admin-btn">Add new admin</button>
                    <div class="modal superadmin-modal">
                        <input class="js-admin" type="text" name="first-name" id="first-name" placeholder="first name" value="{{old('first_name')}}" required>
                        <input class="js-admin" type="text" name="last-name" id="last-name" placeholder="last name" value="{{old('last_name')}}" required>
                        <input class="js-admin" type="email" name="email" id="email" placeholder="email address" value="{{old('email')}}" required>
                        <input class="js-admin" type="password" name="password" id="password" placeholder="password" value="{{old('password')}}" required>
                        <input class="js-admin" type="password" name="password_confirmation" id="password-confirm" placeholder="confirm password" required>
                        <select name="company-id" id="company-id">
                            @forelse($companies as $company)

                                <option value="{{$company->id}}">{{$company->name}}</option>

                            @empty

                                <option disabled>No companies</option>

                            @endforelse
                        </select>
                        <button type="submit" class="super-admin-btn js-add-admin-btn">ADD</button>
                    </div>
                    <div class="js-admins"></div>
                </span>
                </div>
                <div id="tabs-3" class="tab-view">
                    <span>
                        Skills:<br>
                        <input class="js-skill"><button class="super-admin-btn js-add-skill-btn">ADD</button>
                        <div class="js-skills"></div>
                    </span>
                </div>

                <div id="tabs-4" class="tab-view">
                    <span>
                        Job Titles:<br>
                        <input name="position-name" class="js-position" value="" placeholder="Add job title"><button class="super-admin-btn js-add-position-btn">ADD</button>
                        <input class="search-position" type="search" placeholder="Search job titles"><i class="js-find-position fas fa-search"></i>
                        <div class="js-positions">
                        </div>
                    </span>
                </div>
            </div>
        </div>
<!-- Modal -->
<div class="edit-modal">
    <div class="edit-title">EDIT ADMIN<button class="close-btn edit-btn js-edit-close"><i class="fas fa-times"></i></button></div>
    <div class="edit-form">
        <span>
            <label for="first_name">First name</label>
            <input id="first_name" name="first_name" type="text">
        </span>
        <br>
        <span>
            <label for="last-name">Last name</label>
            <input id="last_name" name="last-name" type="text" required>
        </span>
        <br>
        <span>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required>
        </span>
        <br>
        <span>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
        </span>
        <br>
        <span>
            <label for="password">Conform password</label>
            <input name="password_confirmation" id="password-confirm" type="password" required>
        </span>
        <br>
        <button type="button">Edit</button>
        <input type="hidden" name="hidden_id" id="hidden_id">
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
