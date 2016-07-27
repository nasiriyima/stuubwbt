@extends('admin_layout')

@section('pagetitle')
    EXAMINATION RESOURCES MANAGER - <small>Sessions</small>
@stop
@section('maincontent')
<div class="row margin-bottom-10">
    <div class="col-md-3 pull-right">
        <a href="{{url('admin/wbt-manager')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"> Back to WBT Manager</a>
    </div>
</div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Sessions</a></li>
        <li class=""><a href="#add-session" data-toggle="tab">Add New Session</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Category Name</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                         {{--*/$count = 1/*--}}
                            @foreach($sessions as $session)
                             <tr>
                                 <td>{{$count}}</td>
                                 <td><a href="#">{{$session->name}} ({{$session->code}})</a></td>
                                 <td></td>
                             </tr>
                                {{--*/$count++/*--}}
                            @endforeach
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="add-session">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => url('admin/add-session'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <span>SESSION CODE</span>
                                    <input type="text" name="code" placeholder="Session Code" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <span>SESSION NAME</span>
                                    <input type="text" name="name" placeholder="Session Name" required>
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <div class="pull-right">
                            <button type="submit" class="btn-u">Save</button>
                        </div>
                    </footer>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('pagejs')

@stop