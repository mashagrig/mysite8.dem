

<div class="site-section block-14 bg-light nav-direction-white" style=" padding: 20px 0px!important;">

    <div class="container">

        <div class="row mb-5" style="  padding-bottom: 0px!important;">
            <div class="col-md-12">
                <h3 class="site-section-heading text-center">Лучшая тренерская команда в фитнес-клубе Sport</h3>
            </div>
        </div>

        <div class="nonloop-block-14 owl-carousel">



            @foreach($trainers_info as $trainers)
                <div class="p-5">
            {{--<div class="p-5 slider-trainer" onclick="location.href='#{{$trainers->users_id}}';">--}}
                    <a href="#{{$trainers->users_id}}">

                    <div class="block-testimony  slider-trainer text-center">

                        <div class="person row mr-3 no-gutters">
                        <div class="col">

                            <img src="{{ asset("{$trainers->binaryfiles_file_src}") }}" alt="" class="rounded-circle">
                        </div>
                        </div>
                        <div class="row mr-3 no-gutters">

                    <div class="col">
                        <p class=" h5">{{ $trainers->personalinfos_name }}</p>
                        <p class="tre text-left">{{ $trainers->personalinfos_info }}</p>
                    </div>
                    </div>

                </div>
                    </a>
            </div>

                @endforeach



            {{--<div class="p-5">--}}
                {{--<div class="d-flex block-testimony">--}}
                    {{--<div class="person mr-3">--}}
                        {{--<img src="{{ asset("images/person_2.jpg") }}" alt="Image" class="img-fluid rounded-circle">--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<h2 class="h5">Jane Mars</h2>--}}
                        {{--<blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias accusantium qui optio, possimus necessitatibus voluptate aliquam velit nostrum tempora ipsam!&rdquo;</blockquote>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="p-5">--}}
                {{--<div class="d-flex block-testimony">--}}
                    {{--<div class="person mr-3">--}}
                        {{--<img src="{{ asset("images/person_3.jpg") }}" alt="Image" class="img-fluid rounded-circle">--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<h2 class="h5">Shane Holmes</h2>--}}
                        {{--<blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias accusantium qui optio, possimus necessitatibus voluptate aliquam velit nostrum tempora ipsam!&rdquo;</blockquote>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="p-5">--}}
                {{--<div class="d-flex block-testimony">--}}
                    {{--<div class="person mr-3">--}}
                        {{--<img src="{{ asset("images/person_4.jpg") }}" alt="Image" class="img-fluid rounded-circle">--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<h2 class="h5">Mark Johnson</h2>--}}
                        {{--<blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias accusantium qui optio, possimus necessitatibus voluptate aliquam velit nostrum tempora ipsam!&rdquo;</blockquote>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>

    </div>

</div>
