
<?php $count = 1; ?>
{{--описание каждой программы--}}
@foreach($arr as $k=>$v)
    <?php

    $file = $arr[$k]['file'];
    $title = $arr[$k]['title'];
    $program_id = $arr[$k]['program_id'];
    $title_bd = $arr[$k]['title_bd'];
    $text = $arr[$k]['text'];
    $link = $arr[$k]['link'];
    ?>



<div id="{{ $link }}" class="site-section">
    <div class="container"><p><br /></p>
        <div class="row">

            @if($count%2 === 0)
            <div class="col-lg-6">
                <p class="mb-5"><img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid"></p>
            </div>
            @endif

            <div class="col-lg-5 ml-auto">
                <h2 class="site-section-heading mb-3">{{ $title }}</h2>
                <p class="mb-4">{{ $text }}</p>

                {{--<div class="trainers-small mb-5 d-flex">--}}
                    {{--<div><img src="images/person_1.jpg" alt="Image" class="rounded-circle trainer first" data-toggle="tooltip" data-placement="top" title="Craig David"></div>--}}
                    {{--<div><img src="images/person_2.jpg" alt="Image" class="rounded-circle trainer" data-toggle="tooltip" data-placement="top" title="James Creen"></div>--}}
                    {{--<div><img src="images/person_3.jpg" alt="Image" class="rounded-circle trainer" data-toggle="tooltip" data-placement="top" title="Ben Smith"></div>--}}
                {{--</div>--}}

                {{--<p><a href="{{ route('shedule') }}" class="btn btn-outline-primary py-2 px-4">Записаться</a></p>--}}
                {{--<form method='POST' action="{{ action('programs\ProgramsController@show', ['id'=>$program_id]) }}">--}}
                <form method='POST' action="{{ action('shedule\SheduleController@show', ['id'=>$program_id]) }}">
                    {{ csrf_field() }}
                    {{ method_field("PUT") }}
                    {{--------------------------Mail--hidden-------------------------------------------}}
                    <input id="programs" type="text" name="programs" value="{{ $title_bd }}" hidden>
                    <input id="item" type="text" name="item" value="programs_item" hidden>
                    {{---------------------------------------------------------------------}}
                <p><input type="submit" value="Записаться" class="btn btn-primary text-white px-4 py-2"></p>
                </form>
            </div>

                @if($count%2 !== 0)
                <div class="col-lg-6">
                    <p class="mb-5"><img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid"></p>
                </div>
                @endif
                <?php $count ++; ?>

        </div>
    </div>
</div>

@endforeach

