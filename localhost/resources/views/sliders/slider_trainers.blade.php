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


                    @foreach($trainers_info as $trainers)

                            <div class="media-image">
                                <img src="{{ asset("{$trainers->binaryfiles_file_src}") }}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2>{{ $trainers->personalinfos_name }}</h2>
                                    <p>{{ $trainers->personalinfos_info }}</p>
                                    <p><a href="{{ route("{$route}") }}#{{$trainers->users_id}}" class="btn btn-primary text-white px-4">
                                    <span class="caption">Подробнее</span></a></p>
                                </div>
                            </div>


                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
