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
                    <li class="tab"><a href="#tabs-1">All Companies</a></li>
                    <li class="tab"><a href="#tabs-2">All Admins</a></li>
                    <li class="tab"><a href="#tabs-3">All Skills</a></li>
                </ul>
                <div id="tabs-1" class="tab-view js-companies">
                    <span>
                        Companies:<br>
                        <input class="js-company"><button class="js-add-company-btn">ADD</button>
                    </span>
                </div>
                <div id="tabs-2" class="tab-view js-admins">
                <span>
                    Admins:<button>ADD</button>
                </span>
                </div>
                <div id="tabs-3" class="tab-view js-skills">
                    <span>
                        Skills:<button>ADD</button>
                    </span>
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