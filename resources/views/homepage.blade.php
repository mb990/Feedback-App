@extends('layouts.master')

@section('content')
<div class="login">
    <span class="login-text">Log in to provide a feedback</span>
    <form>
        <br><br><br>
        <input class="e-mail" type="text" id="fname" name="fname" placeholder="email">
        <br><br><br>
        <input class="e-mail" type="text" id="lname" name="lname" placeholder="password"><br>
        <input class="login-btn"type="submit" value="LOG IN">
    </form>
</div>
@endsection