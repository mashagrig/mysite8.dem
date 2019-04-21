<div id="{{ $slider_id }}" class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">{{ $title_page }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">


                    @foreach($arr as $k=>$v)

                        <?php
                        $file = $arr[$k]['file'];
                        $title = $arr[$k]['title'];
                        $text = $arr[$k]['text'];
                        $link = $arr[$k]['link'];
                        ?>

                            <div class="media-image">
                                <img src="{{ asset("{$file}") }}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2>{{ $title }}</h2>
                                    <p>{{ $text }}</p>
                                    {{--<p><a href="{{ route("{$link}") }}" class="btn btn-primary text-white px-4">--}}
                                            {{--<span class="caption">Подробнее</span></a></p>--}}
                                </div>
                            </div>


                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
