@extends('layouts.master')

@section('content')
<div class="login">
    <span class="login-text">Log in to provide a feedback</span>
    <form>
        <br><br><br>
        <label class="hidden js-mail" for="email">Email</label>
        <input class="e-mail js-e-mail" type="email" name="email" placeholder="email" value="">
        <br><br><br>
        <label class="hidden js-pass" for="password">Password</label>
        <input class="password js-password" type="password" name="password" placeholder="password" value=""><br>
        <input type="submit" class="login-btn" value="LOG IN">
    </form>
</div>
@endsection