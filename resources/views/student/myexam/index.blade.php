@extends('student_layout')

@section('maincontent')
<!-- Tab v1 -->
<div class="tab-v1">
        <ul class="nav nav-tabs">
            @foreach($bodies as $index => $body)
                <li class="{{ ($index == 0)? 'active' : '' }}"><a href="#{{ $body->id }}-{{ $index }}" data-toggle="tab">{{ $body->code }}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($bodies as $index => $body)
            <div class="tab-pane fade in {{ ($index==0)? 'active' : '' }}" id="{{ $body->id }}-{{ $index }}">
                    <div class="row">
                        <img alt="{{ $body->name }}" class="pull-left lft-img-margin img-width-200" src="{{ asset('public/assets/img/clients4/'.$body->logo) }}">
                        <h4><a href="#">{{ $body->name }}</a></h4>
                        <p>
                            <div class="input-group-btn">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                            Select {{ $body->code }} exam categories
                                            <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $key => $category)
                                            @if($key==count($categories)-1)
                                            <li class="divider"></li>
                                            <li><a href="javascript:void(0);" onclick="getSubjects('{{ $body->id }}','{{ $category->id }}');">{{ $category->name }}</a></li>
                                            @else
                                            <li><a href="javascript:void(0);" onclick="getSubjects('{{ $body->id }}','{{ $category->id }}');">{{ $category->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                            </div>
                        </p>
                            <div class="col-md-12">
                                    <div class="row-fluid {{ $body->id }}-subjects">
                                        <div class="tab-pane fade in {{ ($index == 0)? 'active' : '' }}">
                                            <p><span class="label label-success rounded">Please Select a category to view subjects</span>
                                        </div>
                                        <div class="row content-boxes-v2">
                                            <div class="tag-box tag-box-v1 text-justify">
                                                <ul class="pagination">
                                                    <li><a href="#" data-toggle="tab">&laquo;</a></li>
                                                    <li class="active"><a href="#" data-toggle="tab">1</a></li>
                                                    <li><a href="#" data-toggle="tab">&raquo;</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>
            </div>
            @endforeach
        </div>
</div>
<!-- End Tab v1 -->

<div class="margin-bottom-30"></div>
@stop
@section('pagejs')
<script type="text/javascript">
    var subjectsurl = "{!! url('student/subjects') !!}";
    var sessionsurl = "{!! url('student/session') !!}";
    var csrf = "{!! csrf_token() !!}";
</script>
<script type="text/javascript" src="{{ asset('public/assets/js/myexams.js') }}"></script>
@stop