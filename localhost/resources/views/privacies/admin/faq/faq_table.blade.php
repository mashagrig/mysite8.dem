@if(isset($question_from_contacts_all) && isset($answers_admin_all))

    <?php
    $email_admin = '';
    $email = '';
    $name = '';
    if (Auth::check()) {
        $email_admin = Auth::user()->email;
    }
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="p-4 bg-white  mb-3">
                <h3 class="h5 text-black mb-3">Ответить на вопрос</h3>
                {{---------------------------------------------------------------------------}}
                <form method='POST' action="{{ action('privacies\admin\FaqAdminController@store') }}"
                      class="mb-0 bg-white">
                    @csrf
                    <input type="text" name="email_admin" id="email_admin" value="{{ $email_admin }}" hidden>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message_admin" hidden>Сообщение</label>
                            <textarea name="message_admin" id="message_admin" cols="30" rows="4"
                                      class="form-control" placeholder="Ответ..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Отправить" class="btn btn-primary text-white px-4 py-2">
                        </div>
                    </div>
                </form>
                {{---------------------------------------------------------------------------}}
            </div>
        </div>
    </div>

    {{---------------------------------------------------------------------------}}
    @foreach($question_from_contacts_all as $question)
        <?php
        $status_comment = '';
        $status_color = "";
        $status_tr_style = '';
        switch ($question->status_content) {
            case "moderating":
                $status_comment = 'Ожидает модерации';//'В ближайшее время менеджер ответит на Ваш вопрос';
                $status_color = "#fd7e14";
                $status_tr_style = 'table-light-new';
                break;
            case "public":
                $status_comment = 'Опубликован';
                $status_color = "";
                $status_tr_style = '';
                break;
            case "denied":
                $status_comment = 'Вопрос отклонен модератором';
                $status_color = "red";
                $status_tr_style = 'table-secondary-new';
                break;
        }
        ?>
        <div class="row right">
            <div class="col-lg-4"></div>
            <div class="col-lg-8 mb-4 right">
                <p>Вопорос #{{$question->contents_id}}
                    пользователя {{ $question->users_id }}
                    от {{date_format(date_create($question->contents_updated_at), 'd-m-Y H:i')}}
                    &bullet; <span style="color: {{$status_color}}!important;">{{ $status_comment }}</span></p>

                <div class="border p-4 text-with-icon  bg-white {{ $status_tr_style }}">
                    <p>&ldquo;{{ $question->contents_text }}&rdquo;</p>
                </div>
            </div>
        </div>
        {{---------------------------------------------------------------------------}}
        @foreach($answers_admin_all as $answer)
            @if($question->contents_id === (int)$answer->status_content)
                <div class="row left">
                    <div class="col-lg-8 mb-4 left">
                        <p>Ответ на вопрос #{{$answer->status_content}}
                            от {{date_format(date_create($answer->contents_updated_at), 'd-m-Y H:i')}}</p>
                        <div class="border p-4 text-with-icon  bg-white">
                            <p>&ldquo;{{ $answer->contents_text }}&rdquo;</p>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            @endif
        @endforeach
        {{---------------------------------------------------------------------------}}
    @endforeach
@endif


