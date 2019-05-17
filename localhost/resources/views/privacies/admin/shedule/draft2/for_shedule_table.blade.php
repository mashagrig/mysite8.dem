
<?php
switch ( $max_period) {
    case "1":
        $max_period_name  = 'today';
        break;
    case "7":
        $max_period_name = 'week';
        break;
    case "31":
        $max_period_name = 'month';
        break;
}
?>


<div id="shedule" class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">Расписание занятий</h2>
                        </div>
        </div>
        {{------------------------------------------------------------}}
        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', function () {
                $('#period').change( function (e) {
                    e.preventDefault();
                    $.ajax({
                        data: $("#form").serialize(),
                        type: 'POST',
                        url: "{{ action('privacies\admin\ShedulesAdminController@show') }}",
                        {{--//url: "{{ action('shedule\SheduleController@store') }}",--}}
                        success: function (data) {
                            $('#btn_show').click();
                        }, error: function (msg) {
                       //     console.log(msg);
                        }
                    });
                });
            });
        </script>
        {{------------------------------------------------------------}}
        <div class="row">
            <form method='POST' id="form" action="{{ action('privacies\admin\ShedulesAdminController@show') }}" class="row">
                {{ csrf_field() }}

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select"></div></div>

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select">
                        <label class="mr-sm-2" for="period">Показать расписание на период:</label><br/>
                        <select id="period" name="period" class="form-control">
                            <option value="today"  @if($period_select === "today")  selected @endif>Сегодня</option>
                            <option value="week" @if($period_select === "week")  selected @endif >На неделю</option>
                           <option value="month" @if($period_select === "month")  selected @endif>На месяц</option>
                        </select>
                    </div>
                </div>

                <div class="col p-4 text-md-right bg-white align-bottom">
                    <input type="submit" id="btn_show" class="btn btn-primary rounded text-white px-4" value="Показать">
            </div>
            </form>
            {{--------------status----------------------------------------------------------------------}}
            @if (session('status'))

                    <div class="col  p-4 text-center">
                        <div class="form-group text-center">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
            @endif
            {{------------------------------------------------------------}}
        </div>
        <div class="row">
            <div class="col">
                    @include('privacies.admin.shedule.shedule_table')
            </div>
        </div>
    </div> {{-- container--}}
</div>

