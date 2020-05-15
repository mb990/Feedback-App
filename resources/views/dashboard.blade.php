@extends("layouts.master")

@section("users")
<div class="user-box">
    <div class="user">
        <img class="user-image">
        <div class="user-status">
            <span class="user-name">User Full Name</span>
            <span><button class="logout-btn">Log out</button></span>
        </div>
    </div>
    <div class="search-area">
        <h4>YOUR TEAMMATES</h4>
        <input class="search-teammate" type="text" placeholder="Search a teammate">
        <ul class="list">
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Adele Dean</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Daryl Benitez</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Maverick Zhang</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Louise Alcock</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Madeline Huber</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Lacie Mcguire</a></li>
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Darrel Searle</a></li>
        </ul>
    </div>
</div>
@endsection