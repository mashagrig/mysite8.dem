<div id="shedule" class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center">Расписание занятий</h2>
            </div>
        </div>

        <div class="row">

            <div class="col-md-auto">
                <div class="toolbar-form bg-white  mb-3">
                    <form method='POST'
                          action="{{ action('shedule\SheduleController@show') }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="tolbar-select">
                            <label class="mr-sm-2" for="period">Показать расписание на период:</label><br/>
                            <select id="period" name="period">
                                <option value="period" selected disabled>---</option>
                                <option value="today">Сегодня</option>
                                <option value="tomorrow">Завтра</option>
                                <option value="week">На неделю</option>
                                {{--<option value="day">Точная дата</option>--}}
                            </select>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-auto">

                <div class="toolbar-form bg-white  mb-3">
                    <form action="#">
                        <div class="tolbar-select">
                            <label class="mr-sm-2" for="period">Выберете программу:</label><br/>
                            <select id="programs" name="programs">
                                <option value="programs" selected disabled>---</option>
                                <option value="morning_programs">Утренние программы</option>
                                <option value="body_building">Боди билдинг</option>
                                <option value="stretching">Стретчинг</option>
                                <option value="fitness">Фитнес</option>
                                <option value="yoga">Йога</option>
                                <option value="child_programs">Детсткие программы</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-auto">
                <div class="toolbar-form bg-white  mb-3">
                    <form action="#">
                        <div class="tolbar-select">
                            <label class="mr-sm-2" for="period">Выберете тренера:</label><br/>
                            <select id="trainers" name="trainers">
                                <option value="trainers" selected disabled>---</option>
                                <option value="trainer1">Петров</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col align-items-end">
                <div class=" bg-white  mb-3 align-items-end">
                    <br />
                    <input type="submit" class="btn btn-primary rounded text-white px-4" value="Показать">
                </div>
            </div>

        </div>
{{--{{print_r($max_date_select)}}--}}
        <div class="row">

            @include('shedule.shedule_table')

            {{--<div id="slider-range"></div>--}}

            {{--<aside class="widget shop-filter">--}}
            {{--<h3 class="sidebar-title">price</h3>--}}
            {{--<div class="info_widget">--}}
            {{--<div class="price_filter">--}}
            {{--<div id="slider-range"></div>--}}
            {{--<div class="price_slider_amount">--}}
            {{--<input type="text" id="amount" name="price"  placeholder="Add Your Price" />--}}
            {{--<input type="submit"  value="Filter"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</aside>--}}





            {{--<table class="table table-striped">--}}
            {{--<thead class="text-black thead-dark">--}}
            {{--<tr>--}}
            {{--<th scope="col">Дата</th>--}}
            {{--<th scope="col">Время</th>--}}
            {{--<th scope="col">Тренер</th>--}}
            {{--<th scope="col">№ зала</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--<tr>--}}
            {{--<td>01.01.2019</td>--}}
            {{--<td>12-00 / 14-00</td>--}}
            {{--<td>Иванов</td>--}}
            {{--<td>101</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<td>01.01.2019</td>--}}
            {{--<td>18-00 / 20-00</td>--}}
            {{--<td>120</td>--}}
            {{--<td>120</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<td>01.01.2019</td>--}}
            {{--<td>22-00 / 24-00</td>--}}
            {{--<td>230</td>--}}
            {{--<td>230</td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
            {{--</table>--}}

        </div>


    </div> {{-- container--}}


</div>
</div>
