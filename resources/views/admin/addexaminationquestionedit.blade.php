<div class="row">
    <div class="col-md-12">
        {!! Form::open(array('url' => url('wbt/update-examination-question'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
        <input type="hidden" name="questionid" value="{{\Crypt::encrypt($question->id)}}">
            <fieldset>
                <div class="row">
                    <div class="col-md-8">
                        <section>
                            <label class="textarea">
                                <span>QUESTION TEXT</span>
                                <textarea rows="2" name="question_name" placeholder="Question Text" id="question" required>{{$question->name}}</textarea>
                            </label>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <section>
                            <a rows="4" class="btn-u" data-toggle="modal" data-target="#add_info" style="padding:6px 70px; margin-top:20px;">New Additional Information</a>
                        </section>
                        <section>
                            <label class="select">
                                <span>ADDITIONAL INFORMATION</span>
                                <select id="additional_info" name="add_info" data-placeholder="Choose a Additional Information..." class="form-control chosen-select" tabindex="2"></select>
                            </label>
                        </section>
                        <section>
                            <span class="icon-info" id="select_preview_title" style="display:none;"></span>
                            <img id="img_select_preview" src="" height="250" width="310" alt="Image preview..." >
                            <div id="desc_select_preview" style="display:none;"></div>
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
                                        <label class="radio">
                                            <input type="radio" name="answer" value="{{$count}}" required {{($options->count() > 0 && $options[0]->status == 1)? 'checked':''}}>
                                            <i class="rounded-x"></i>
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option1" placeholder="Option A" value="{{($options->count() > 0)? $options[0]->name:''}}" required>
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio">
                                            <input type="radio" name="answer" value="{{$count}}" required {{($options->count() > 1 && $options[1]->status == 1)? 'checked':''}}>
                                            <i class="rounded-x"></i>
                                        </label>                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option2" placeholder="Option B" value="{{($options->count() > 1)? $options[1]->name:''}}" required>
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio">
                                            <input type="radio" name="answer" value="{{$count}}" required {{($options->count() > 2 && $options[2]->status == 1)? 'checked':''}}>
                                            <i class="rounded-x"></i>
                                        </label>                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option3" placeholder="Option C" value="{{($options->count() > 2)? $options[2]->name:''}}">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio">
                                            <input type="radio" name="answer" value="{{$count}}" required {{($options->count() > 3 && $options[3]->status == 1)? 'checked':''}}>
                                            <i class="rounded-x"></i>
                                        </label>                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option4" placeholder="Option D" value="{{($options->count() > 3)? $options[3]->name:''}}">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    {{--*/$count++;/*--}}
                                    <div class="col-md-1">
                                        <label class="radio">
                                            <input type="radio" name="answer" value="{{$count}}" required {{($options->count() > 4 && $options[4]->status == 1)? 'checked':''}}>
                                            <i class="rounded-x"></i>
                                        </label>                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option5" placeholder="Option E" value="{{($options->count() > 4)? $options[4]->name:''}}">
                                    </div>
                                </div>
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>
            <footer>
                <div class="pull-right">
                    <button type="submit" class="btn-u">Update Question</button>
                </div>
            </footer>
        {!! Form::close() !!}
            <div class="modal fade row" id="add_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="javascript:void(0)" enctype="multipart/form-data" class="sky-form">
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
                                <button type="button" class="btn-u btn-brd btn-brd-hover rounded btn-u-blue btn-u-lg" onclick="$('.img_button,.text_button').hide();$('.text_area,#back_btn').show();">Enter Text</button> 
                            </div>
                            <div class="for_upload" style="display:none;">
                                <input name="image" id="file-upload" type="file" onChange="$('.text_button').hide();$('.for_upload,#back_btn').show();loadImageFileAsURL();" style="display:none;"/>
                                <br>
                                <label class="input">
                                    <input type="text" id="textAreaFileContents" name="image_description" placeholder="Image Title">
                                </label>
                                <img id="img_preview" src="" height="200" width="565" alt="Image preview...">
                            </div>
                            <div class="text_area" style="display:none;">
                                <label class="input">
                                    <input type="text" name="text_description" placeholder="Text Title">
                                </label>
                                <section>
                                    <label class="textarea">
                                        <i class="icon-prepend fa fa-file-word-o"></i>
                                        <i class="icon-append fa fa-asterisk"></i>
                                        <textarea rows="3" name="question_description" placeholder="Placeholder text"></textarea>
                                    </label>
                                </section>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="button" class="btn-u btn-u-default" data-dismiss="modal" onclick="$('.img_button,.text_button').show();$('.text_area,.for_upload,#back_btn').hide();$('#file-upload,input[name=image_description],input[name=text_description],textarea[name=question_description]').val('')">Cancel</button>
                                <button type="button" class="btn-u btn-u-orange" style="display:none;" id="back_btn" onclick="$('.img_button,.text_button').show();$('.text_area,.for_upload,#back_btn').hide();$('#file-upload,input[name=image_description],input[name=text_description],textarea[name=question_description]').val('')">Back</button>
                                <input type="submit" class="btn-u btn-u-sea text_area add-info-save" value="Add" style="display:none;">
                                <input type="submit" class="btn-u btn-u-sea for_upload add-info-save" value="Upload" style="display:none;"> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       </form>
    </div>
</div>

