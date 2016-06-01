<div class="row">
    <div class="col-md-12">
        {!! Form::open(array('url' => url('wbt/add-examination-question'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
        <input type="hidden" name="examid" value="{{\Crypt::encrypt($exam->id)}}">
<!--            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <section>
                            <label class="input">
                                <span>QUESTION TAGS</span>
                                <input type="text" name="tags">
                            </label>
                        </section>
                    </div>
                    <div class="col-md-3">
                        <section>
                            <label class="select">
                                <span>DIFFICULTY</span>
                                <select name="difficulty_id">
                                    <option value="0" selected disabled>Select Question Difficulty</option>
                                </select>
                            </label>
                        </section>
                    </div>
                    <div class="col-md-3">
                        <section>
                            <label class="input">
                                <span>ESTIMATED TIME TO COMPLETE</span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="min" placeholder="Min.">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="sec" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>-->
            <fieldset>
                <div class="row">
                    <div class="col-md-8">
                        <section>
                            <label class="textarea">
                                <span>QUESTION TEXT</span>
                                <textarea rows="2" name="question_name" placeholder="Question Text" id="question" ></textarea>
                            </label>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <section>
                            <label class="select">
                                <span>ADDITIONAL INFORMATION</span>
                                <select>
                                    <option value="1">test</option>
                                </select>
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="row">
                    <div class="col-md-8">
                        <section>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count=1;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="{{$count}}"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option1" placeholder="Option A">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="{{$count}}"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option2" placeholder="Option B">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="{{$count}}"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option3" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="{{$count}}"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option4" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="{{$count}}"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option5" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>
            <footer>
                <div class="pull-right">
                    <button type="submit" class="btn-u">Save and Add Questions</button>
                </div>
            </footer>
        {!! Form::close() !!}
    </div>
</div>
