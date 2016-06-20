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
                                <select class="gender" id="additional_info"></select>
                            </label>
                        </section>
                        <section>
                            <a class="btn-u" data-toggle="modal" data-target="#add_info">New Additional Information</a>
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
        <div class="modal fade row" id="add_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="javascript:void(0)" enctype="multipart/form-data" class="sky-form" id="add_info_form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel4">Enter Additional Information</h4>
                        </div>
                        <div class="modal-body">
                            <div align="center" class="img_button">
                                <label for="file-upload" class="btn-u btn-brd btn-brd-hover rounded btn-u-sea btn-u-lg">
                                    Upload a Picture
                                </label>
                            </div>
                            <br>
                            <div align="center" class="text_button">
                                <button type="button" class="btn-u btn-brd btn-brd-hover rounded btn-u-blue btn-u-lg" onclick="$('.img_button,.text_button').hide();$('.text_area').show();">Enter Text</button> 
                            </div>
                            <div class="for_upload" style="display:none;">
                                <input name="image" id="file-upload" type="file" class="for_upload" onChange="$('.text_button').hide();$('.for_upload').show()"/>
                                <br>
                                <label class="input">
                                    <input type="text" name="image_description" placeholder="Image Title">
                                </label>
                            </div>
                            <div class="text_area" style="display:none;">
                                <label class="input">
                                    <input type="text" name="text_description" placeholder="Text Title">
                                </label>
                                <label class="textarea">
                                    <textarea rows="4" name="question_name" placeholder="Question Text" id="question"></textarea>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn-u btn-u-sea text_area add-info-save" style="display:none;">Add</button>
                                <button type="submit" class="btn-u btn-u-sea for_upload add-info-save" style="display:none;">Upload</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
