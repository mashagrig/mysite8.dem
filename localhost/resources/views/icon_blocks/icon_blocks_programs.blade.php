

<div id="{{ $icon_blocks_id }}" class="site-section">
    <div class="container">
        <div class="row  mb-5">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">{{ $title_page }}</h2>
            </div>
        </div>
        <div class="row">

            @foreach($arr_icon as $k=>$v)
                <?php
                $icon = $arr_icon[$k]['icon'];
                $title = $arr_icon[$k]['title'];
                $title_bd = $arr_icon[$k]['title_bd'];
                $program_id = $arr_icon[$k]['program_id'];
                $text = $arr_icon[$k]['text'];
                $link = $arr_icon[$k]['link'];
                ?>

                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <a href="{{ route("programs") }}#{{ $link }}">
                            <span class="{{ $icon }} icon display-4 mb-4 d-block"></span>
                        </a>
                        <p></p>
                        <h2 class="h5">{{ $title }}</h2>
                        <p>{{ $text }}</p>
                        <div class="row">
                            <div class="col">
                                <p><a class="a-link" href="{{ route("programs") }}#{{ $link }}">Подробнее</a></p>
                            </div>
                            <div class="col">
                                <form method='POST' action="{{ action('programs\ProgramsController@show', ['id'=>$program_id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field("PUT") }}

                                    <p>
                                        {{--<label for="prog" class="a-link" style="cursor: pointer">Записаться</label>--}}
                                        {{--------------------------Mail--hidden-------------------------------------------}}
                                        <input type="text" id="programs" name="programs" value="{{ $title_bd }}" hidden>
                                        {{---------------------------------------------------------------------}}
                                        <input type="submit" id="prog" name="program" value="Записаться" class="btn btn-primary">
                                    </p>
                                    {{--<p><input type="submit" value="Записаться" class="btn btn-primary text-white px-4 py-2"></p>--}}
                                </form>
                                {{--<p><a class="a-link" href="{{ route("shedule") }}">Записаться</a></p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>


