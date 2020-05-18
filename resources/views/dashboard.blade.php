@extends("layouts.master")

@section("users")
<div class="user-box">
    <div class="user">
        <img class="user-image">
        <div class="user-status">
            <a class="user-name" href="/">User Full Name</a>
            <span><button class="logout-btn">Log out</button></span>
        </div>
    </div>
    <div class="search-area">
        <h4>YOUR TEAMMATES</h4>
        <input class="search-teammate js-search js-live-search" type="text" placeholder="Search a teammate">
        <ul class="list" data-role="listview" data-filter="true">
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Adele Dean</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Daryl Benitez</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Maverick Zhang</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Louise Alcock</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Madeline Huber</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Lacie Mcguire</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Darrel Searle</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Jeanne Gamble</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Ilyas Parrish</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Charlotte Berger</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Hermione Hackett</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Darien Cobb</a></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <i class='far'>&#xf11a;</i>
    <div class="messages">
        No teammate <br>selected
    </div>
    <p class="info">
        To provide a feedback you should select <br>
        an employee from teammmates list or<br>
        to search by a name using the search field
    </p>
</div>
@endsection