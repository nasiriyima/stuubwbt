@extends('admin_layout')

@section('pagetitle')
    EXAMINATION RESOURCES MANAGER - <small>Months</small>
@stop
@section('maincontent')
    <div class="row margin-bottom-10">
        <div class="col-md-3 pull-right">
            <a href="{{url('admin/wbt-manager')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"><i class="fa fa-back"></i> Back to WBT Manager</a>
        </div>
    </div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Months</a></li>
        <li><a href="#newmonth" data-toggle="tab">Add New Month</a></li>
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
                                 <th class="hidden-sm">Exam Provider</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                         {{--*/$count=1;/*--}}
                            @foreach($months as $month)
                             <tr>
                                 <td>{{$count}}</td>
                                 <td><a href="#">{{$month->name}} ({{$month->code}})</a></td>
                                 <td class="hidden-sm">{{$month->examProvider->name}}</td>
                                 <td></td>
                             </tr>
                            {{--*/$count++/*--}}
                            @endforeach
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="newmonth">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => url('admin/add-month'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <span>MONTH CODE</span>
                                    <input type="text" name="code" placeholder="Month Code" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <span>MONTH CODE</span>
                                    <input type="text" name="name" placeholder="Month Name" required>
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-md-12">
                                <label class="select">
                                    <span>EXAM PROVIDER</span>
                                    <select name="exam_provider_id" required>
                                        <option value=" " selected disabled>Exam Provider</option>
                                        @foreach($providers as $provider)
                                            <option value="{{$provider->id}}">{{$provider->name}}</option>
                                        @endforeach
                                    </select>
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