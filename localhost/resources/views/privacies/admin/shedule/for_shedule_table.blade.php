



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
                $('#max_period').change( function (e) {
                    e.preventDefault();
                    $.ajax({
                        data: $("#form").serialize(),
                        type: 'POST',
                        url: "{{ action('privacies\admin\ShedulesAdminController@show') }}",
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
                {{ method_field("PUT") }}


                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select"></div></div>

                <div class="col-md-auto toolbar-form bg-white  mb-3">
                    <div class="tolbar-select">
                        <label class="mr-sm-2" for="max_period">Показать расписание на период:</label><br/>
                        <select id="max_period" name="max_period" class="form-control">
                            <option value="1" @if(old('max_period', $max_period) === '1') selected @endif>Сегодня</option>
                            <option value="7" @if(old('max_period', $max_period) === '7') selected @endif>На неделю</option>
                            <option value="31" @if(old('max_period', $max_period) === '31') selected @endif>На месяц</option>
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

