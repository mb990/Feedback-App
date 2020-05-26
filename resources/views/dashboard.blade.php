@extends("layouts.master")

@section("users")
    <div class="user-box">
        <div class="user">
            <img src="https://source.unsplash.com/random" class="user-image">
            <div class="user-status">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <a class="user-name" href="">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
                    <span><button type="submit" class="logout-btn">Log out</button></span>
                </form>
            </div>
        </div>
        <div class="search-area">
            <h4>YOUR TEAMMATES</h4>
            <input class="search-teammate js-search js-live-search" type="search" placeholder="Search a teammate">
            <ul class="list">

                @forelse($users as $user)
{{--@if(auth()->user()->didFeedbackOnTeammate($user->id))--}}
                    <li data-userId="{{$user->id}}" class="teammate"><a href="#"><img src="https://source.unsplash.com/random" class="teammate-image"></a> <a href="#" class="teammate-name">{{$user->first_name}} {{$user->last_name}}</a><i class="fas fa-check reviewed"></i></li>
{{--@endif--}}
                @empty

                    <p>No users in this team.</p>

                @endforelse
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

@forelse($users as $user)

<!--Modal-->
<div data-userId="{{$user->id}}" class="modal">
    <div class="single-feedback">
        <div class="feedback-person">
            <img class="feedback-image">
            <div class="feedback-person-info">
                <span>{{$user->first_name}} {{$user->last_name}}</span>
                <span>{{$user->profile->position}}</span>
            </div>
            <button class="close-btn js-close"><i class="fas fa-times"> <br> ESC</i></button>
        </div>
        <div class="feedback-title">Provide feedback</div>
        <span>Personal skills and competences</span>


        @forelse($skills as $skill)
{{--            @foreach($skill->feedbacks as $bla)--}}
{{--                @dd($bla->pivot)--}}
{{--            @endforeach--}}
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

        <div class="alert alert-success">

        </div>

        <span style="margin:20px 0px;">Write a feedback</span>

        <label class="hide show js-hide" for="feedback_1">What is wrong</label>
        <!-- <input value="" class="write-feedback js-write" type="text" placeholder="What is wrong" name="feedback-1" required> -->
        <textarea id="comment_wrong" class="write-feedback js-write" placeholder="What is wrong" name="feedback_1" required></textarea>
        <label class="hide show js-hide-2" for="feedback_2">What could be improved</label>
        <!-- <input class="write-feedback js-write-two" type="text" placeholder="What could be improved" name="feedback-2" required> -->
        <textarea id="comment_improve" class="write-feedback js-write-two" placeholder="What could be improved" name="feedback_2" required></textarea>

        {{--    <label for="skill_name">Skill name test</label>--}}
        {{--    <input type="text" id="skill_name" name="skill_name">--}}

        <div class="submit-feedback">
            <input class="submit-feedback-btn" type="submit" id="submit" value="SUBMIT">
        </div>
    </div>
</div>
@empty

<p>No users in this team.</p>

@endforelse




@endsection

@section('script')
    <script>
        var skills = {!! $skills !!};

        $(document).ready(function () {

            var id = '';

            $(document).on('click', '.list li', function () {
                id = $(this).attr('data-userId');
            });

            $('#submit').click(function () {
                console.log(id);
                var data = {
                    feedback_1: $('#comment_wrong').val(),
                    feedback_2: $('#comment_improve').val(),
                    user_id: id
                };
                var ratings = {};
                for (var i = 1; i < skills.length + 1; ++i) {
                    var current = 'rating_' + i;
                    ratings[current] = $(`input[name="${current}"]:checked`).val();
                }

                // $.ajax({
                //     url: 'feedback/store',
                //     method: 'POST',
                //     data: {
                //         data: data,
                //         ratings: ratings,
                //         skills: skills
                //     },
                //     success: function (result) {
                //         console.log(data);
                //
                //         // $('.alert').show();
                //         $('.alert').html(result.success);
                //     }
                // });

                $.post('feedback/store',
                    {
                        data: data,
                        ratings: ratings,
                        skills: skills
                    },
                    function (result) {
                        console.log(data);
                        // $('.alert').show();
                        // $('.alert').html(result.success);
                        $('.main').html("<div class='container'> <i class='far'>&#xf118;</i> <div class='messages'> Your feedback <br>accepted</div><p class='info'>You can review other your teammate</p></div>");


                    }

                ).fail(function(jqxhr, settings, ex) { alert('Enter all data'); });
            });
        });
    </script>
@endsection
