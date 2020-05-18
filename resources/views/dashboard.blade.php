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

<span class="single-skill">
    <p class="skill-name">Leadership skills</p>
        <fieldset class="rating">
            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome"></label>
            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good"></label>
            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh"></label>
            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad"></label>
            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Really bad"></label>
        </fieldset>
</span>

<span class="single-skill">
    <p class="skill-name">English language knowledge</p>
        <fieldset class="rating">
            <input type="radio" id="star5_2" name="rating_2" value="5" /><label class = "full" for="star5_2" title="Awesome"></label>
            <input type="radio" id="star4_2" name="rating_2" value="4" /><label class = "full" for="star4_2" title="Pretty good"></label>
            <input type="radio" id="star3_2" name="rating_2" value="3" /><label class = "full" for="star3_2" title="Meh"></label>
            <input type="radio" id="star2_2" name="rating_2" value="2" /><label class = "full" for="star2_2" title="Kinda bad"></label>
            <input type="radio" id="star1_2" name="rating_2" value="1" /><label class = "full" for="star1_2" title="Really bad"></label>
        </fieldset>
</span>

<span class="single-skill">
    <p class="skill-name">Communication skills</p>
        <fieldset class="rating">
            <input type="radio" id="star5_3" name="rating_3" value="5" /><label class = "full" for="star5_3" title="Awesome"></label>
            <input type="radio" id="star4_3" name="rating_3" value="4" /><label class = "full" for="star4_3" title="Pretty good"></label>
            <input type="radio" id="star3_3" name="rating_3" value="3" /><label class = "full" for="star3_3" title="Meh"></label>
            <input type="radio" id="star2_3" name="rating_3" value="2" /><label class = "full" for="star2_3" title="Kinda bad"></label>
            <input type="radio" id="star1_3" name="rating_3" value="1" /><label class = "full" for="star1_3" title="Really bad"></label>
        </fieldset>
</span>

<span class="single-skill">
    <p class="skill-name">Problem solving</p>
        <fieldset class="rating">
            <input type="radio" id="star5_4" name="rating_4" value="5" /><label class = "full" for="star5_4" title="Awesome"></label>
            <input type="radio" id="star4_4" name="rating_4" value="4" /><label class = "full" for="star4_4" title="Pretty good"></label>
            <input type="radio" id="star3_4" name="rating_4" value="3" /><label class = "full" for="star3_4" title="Meh"></label>
            <input type="radio" id="star2_4" name="rating_4" value="2" /><label class = "full" for="star2_4" title="Kinda bad"></label>
            <input type="radio" id="star1_4" name="rating_4" value="1" /><label class = "full" for="star1_4" title="Really bad"></label>
        </fieldset>
</span>

<span class="single-skill">
    <p class="skill-name">Programming skills</p>
        <fieldset class="rating">
            <input type="radio" id="star5_5" name="rating_5" value="5" /><label class = "full" for="star5_5" title="Awesome"></label>
            <input type="radio" id="star4_5" name="rating_5" value="4" /><label class = "full" for="star4_5" title="Pretty good"></label>
            <input type="radio" id="star3_5" name="rating_5" value="3" /><label class = "full" for="star3_5" title="Meh"></label>
            <input type="radio" id="star2_5" name="rating_5" value="2" /><label class = "full" for="star2_5" title="Kinda bad"></label>
            <input type="radio" id="star1_5" name="rating_5" value="1" /><label class = "full" for="star1_5" title="Really bad"></label>
        </fieldset>
</span>

<span class="single-skill">
    <p class="skill-name">Ability to learn</p>
        <fieldset class="rating">
            <input type="radio" id="star5_6" name="rating_6" value="5" /><label class = "full" for="star5_6" title="Awesome"></label>
            <input type="radio" id="star4_6" name="rating_6" value="4" /><label class = "full" for="star4_6" title="Pretty good"></label>
            <input type="radio" id="star3_6" name="rating_6" value="3" /><label class = "full" for="star3_6" title="Meh"></label>
            <input type="radio" id="star2_6" name="rating_6" value="2" /><label class = "full" for="star2_6" title="Kinda bad"></label>
            <input type="radio" id="star1_6" name="rating_6" value="1" /><label class = "full" for="star1_6" title="Really bad"></label>
        </fieldset>
</span>

<span class="single-skill">
    <p class="skill-name">Workflow behavior</p>
        <fieldset class="rating">
            <input type="radio" id="star5_7" name="rating_7" value="5" /><label class = "full" for="star5_7" title="Awesome"></label>
            <input type="radio" id="star4_7" name="rating_7" value="4" /><label class = "full" for="star4_7" title="Pretty good"></label>
            <input type="radio" id="star3_7" name="rating_7" value="3" /><label class = "full" for="star3_7" title="Meh"></label>
            <input type="radio" id="star2_7" name="rating_7" value="2" /><label class = "full" for="star2_7" title="Kinda bad"></label>
            <input type="radio" id="star1_7" name="rating_7" value="1" /><label class = "full" for="star1_7" title="Really bad"></label>
        </fieldset>
</span>

<span class="single-skill">
    <p class="skill-name">Sense of humor</p>
        <fieldset class="rating">
            <input type="radio" id="star5_8" name="rating_8" value="5" /><label class = "full" for="star5_8" title="Awesome"></label>
            <input type="radio" id="star4_8" name="rating_8" value="4" /><label class = "full" for="star4_8" title="Pretty good"></label>
            <input type="radio" id="star3_8" name="rating_8" value="3" /><label class = "full" for="star3_8" title="Meh"></label>
            <input type="radio" id="star2_8" name="rating_8" value="2" /><label class = "full" for="star2_8" title="Kinda bad"></label>
            <input type="radio" id="star1_8" name="rating_8" value="1" /><label class = "full" for="star1_8" title="Really bad"></label>
        </fieldset>
</span>


</div>
@endsection