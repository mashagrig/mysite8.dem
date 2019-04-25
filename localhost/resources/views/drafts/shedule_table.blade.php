

@foreach($shedule_dates as $date)


<table class="table table-striped">
    <thead class="text-black thead-dark">
    <tr>
        <th scope="col">Дата</th>
        <th scope="col">Время</th>
        <th scope="col">Тренер</th>
        <th scope="col">№ зала</th>
    </tr>
    </thead>
    <tbody>




        @foreach($shedule_all as $shedule)

            @if((strtotime($shedule->date_training) === strtotime($date->date_training)))



        <tr>
            <td>{{ $shedule->date_training }}</td>
            <td>{{ $shedule->start_training }} - {{ $shedule->stop_training }}</td>
            <td>{{ $shedule->personalinfos_name }}</td>
            <td>{{ $shedule->gym_id }}</td>
        </tr>

            @endif

        @endforeach




    </tbody>
</table>


    @endforeach
