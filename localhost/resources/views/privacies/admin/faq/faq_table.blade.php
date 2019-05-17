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
    @foreach($question_from_contacts_all  as $question)


        <div class="row right">
            <div class="col-lg-4"></div>
            <div class="col-lg-8 mb-4 right">
                <p>Вопорос #{{$question->contents_id}}
                    пользователя #{{ $question->users_id }}
                    от {{date_format(date_create($question->contents_updated_at), 'd-m-Y H:i')}}
                    &bullet;</p>

                <div class="border p-4 text-with-icon  bg-white">
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


