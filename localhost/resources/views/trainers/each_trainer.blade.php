
{{--описание каждого тренера--}}
@foreach($trainers_info as $trainers)


<div id="{{$trainers->users_id}}" class="site-section bg-image" style="background-image: url('{{ asset("images/bg_2.jpg") }}'); background-attachment: fixed">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center text-white">Тренер по фитнесу</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <img src="{{ asset("{$trainers->binaryfiles_file_src}") }}" alt="Trainer" class="img-fluid rounded-circle w-25 mb-4">
                <h2 class="h5 mb-4 text-white">{{ $trainers->personalinfos_surname
                                                    ." ". $trainers->personalinfos_name
                                                    ." ". $trainers->personalinfos_middle_name }}</h2>
                <p class="text-white mb-5 lead">{{ $trainers->personalinfos_text }}</p>

                <form method='POST' action="{{ action('shedule\SheduleController@show', ['id'=>$trainers->users_id]) }}">
                    {{ csrf_field() }}
                    {{ method_field("PUT") }}
                    {{--------------------------Mail--hidden-------------------------------------------}}
                    <input id="trainers" type="text" name="trainers" value="{{ $trainers->users_id }}" hidden>
                    <input id="item" type="text" name="item" value="trainers_item" hidden>
                    {{---------------------------------------------------------------------}}
                    <p><input type="submit" value="Записаться на тренировку" class="btn btn-primary text-white px-4 py-2"></p>
                </form>

                {{--<p><a href="{{ route("shedule") }}" class="btn btn-primary text-white">Записаться на тренировку</a></p>--}}
            </div>
        </div>

    </div>
</div>

@endforeach
