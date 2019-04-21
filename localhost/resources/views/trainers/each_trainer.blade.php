
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
                <h2 class="h5 mb-4 text-white">{{ $trainers->personalinfos_name }}</h2>
                <p class="text-white mb-5 lead">{{ $trainers->personalinfos_info }}</p>
                <p><a href="{{ route("shedule") }}" class="btn btn-primary text-white">Записаться на тренировку</a></p>
            </div>
        </div>
    </div>
</div>
@endforeach
