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
<!-- <div class="container">
    <i class='far'>&#xf11a;</i>
    <div class="messages">
        No teammate <br>selected
    </div>
    <p class="info">
        To provide a feedback you should select <br>
        an employee from teammmates list or<br>
        to search by a name using the search field
    </p>
</div> -->
<div class="single-feedback">
    <div class="feedback-person">
        <img class="feedback-image">
        <div class="feedback-person-info">
            <span>teammate Full Name</span>
            <span>teammate position</span>
        </div>
    </div>

    @forelse($skills as $skill)

        <span class="single-skill">
            <p class="skill-name">{{$skill->name}}</p>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating_{{$skill->id}}" value="5" /><label class = "full" for="star5" title="Awesome"></label>
                    <input type="radio" id="star4" name="rating_{{$skill->id}}" value="4" /><label class = "full" for="star4" title="Pretty good"></label>
                    <input type="radio" id="star3" name="rating_{{$skill->id}}" value="3" /><label class = "full" for="star3" title="Meh"></label>
                    <input type="radio" id="star2" name="rating_{{$skill->id}}" value="2" /><label class = "full" for="star2" title="Kinda bad"></label>
                    <input type="radio" id="star1" name="rating_{{$skill->id}}" value="1" /><label class = "full" for="star1" title="Really bad"></label>
                </fieldset>
        </span>

    @empty

        <p>Currently no skills.</p>

    @endforelse

</div>
@endsection
