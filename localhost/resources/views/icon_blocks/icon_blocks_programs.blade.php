

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
                $icon = $arr[$k]['icon'];
                $title = $arr[$k]['title'];
                $text = $arr[$k]['text'];
                $link = $arr[$k]['link'];
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
                                <p><a class="a-link" href="{{ route("shedule") }}">Записаться</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>


