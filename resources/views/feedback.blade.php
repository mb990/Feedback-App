@extends('layouts.master')
@section('content')
<div>   
    <h3>Admin panel</h3>
    <input placeholder="New team name">
    <button class="js-team-btn">Add team</button>
    <br>
    <input type="email" placeholder="User e-mail">
    <input type="text" placeholder="User password">
    <select>
        <option>FE</option>
        <option>BE</option>
    </select>
    <select>
        <option>Team BG</option>
        <option>Team NS</option>
        <option>Team CA</option>
        <option>Team NI</option>
    </select>
    <button>Add user</button>
    <br>
    <input placeholder="Add position">
    <button>Add position</button>
    <br>
    <input placeholder="Add skill">
    <button class="tester">Add skill</button>
</div>
@endsection