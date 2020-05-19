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
        <input class="search-teammate js-search js-live-search" type="search" placeholder="Search a teammate">
        <ul class="list">
            <li class="teammate"><a href="#"><img class="teammate-image"></a> <a href="#" class="teammate-name">Adele Dean</a><i class="fas fa-check reviewed"></i></li>
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
    <div class="feedback-title">Provide feedback</div>
    <span>Personal skills and competences</span>


    @forelse($skills as $skill)

        <span class="single-skill">
            <p class="skill-name">{{$skill->name}}</p>
                <fieldset class="rating">
                    <input type="radio" id="star5_{{$skill->id}}" name="rating_{{$skill->id}}" value="5" required/><label class = "full" for="star5_{{$skill->id}}" title="Awesome"></label>
                    <input type="radio" id="star4_{{$skill->id}}" name="rating_{{$skill->id}}" value="4" required/><label class = "full" for="star4_{{$skill->id}}" title="Pretty good"></label>
                    <input type="radio" id="star3_{{$skill->id}}" name="rating_{{$skill->id}}" value="3" required/><label class = "full" for="star3_{{$skill->id}}" title="Meh"></label>
                    <input type="radio" id="star2_{{$skill->id}}" name="rating_{{$skill->id}}" value="2" required/><label class = "full" for="star2_{{$skill->id}}" title="Kinda bad"></label>
                    <input type="radio" id="star1_{{$skill->id}}" name="rating_{{$skill->id}}" value="1" required/><label class = "full" for="star1_{{$skill->id}}" title="Really bad"></label>
                </fieldset>
        </span>

    @empty

        <p>Currently no skills.</p>

    @endforelse

    <span style="margin:20px 0px;">Write a feedback</span>

    <label class="hide show js-hide" for="feedback-1">What is wrong</label>
    <!-- <input value="" class="write-feedback js-write" type="text" placeholder="What is wrong" name="feedback-1" required> -->
    <textarea value="" class="write-feedback js-write" type="text" placeholder="What is wrong" name="feedback-1" required></textarea>
    <label class="hide show js-hide-2" for="feedback-2">What could be improved</label>
    <!-- <input class="write-feedback js-write-two" type="text" placeholder="What could be improved" name="feedback-2" required> -->
    <textarea class="write-feedback js-write-two" type="text" placeholder="What could be improved" name="feedback-2" required></textarea>
    <div class="submit-feedback">
        <input class="submit-feedback-btn" type="submit" value="SUBMIT">
    </div>
</div>
@endsection
