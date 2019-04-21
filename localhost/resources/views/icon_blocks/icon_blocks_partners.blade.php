
<div id="{{ $icon_blocks_id }}" class="site-section">
    <div class="container">
        <div class="row  mb-5">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">{{ $title_page }}</h2>
            </div>
        </div>
        <div class="row">

            @foreach($arr as $k=>$v)
                    <?php
                    $file = $arr[$k]['file'];
                    $title = $arr[$k]['title'];
                    $text = $arr[$k]['text'];
                    $link = $arr[$k]['link'];
                    ?>

            <div class="col-md-4 text-center mb-4">
                <div class="border p-4 text-with-icon">
                    <a href="{{ $link }}">
                        <img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid" style="height: 50px">
                        {{--<span class="flaticon-gym-5 icon display-4 mb-4 d-block"></span>--}}
                    </a>
                    <p></p>
                    <h2 class="h5">{{ $title }}</h2>
                    <p>{{ $text }}</p>
                    {{--<p><a class="a-link" href="{{ route('morning_programs') }}">Подробнее</a></p>--}}
                </div>
            </div>
                @endforeach

        </div>
    </div>
</div>
