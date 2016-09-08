@extends('admin_layout')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('pagetitle')
EXAMINATION RESOURCES MANAGER - <small>Subjects</small>
@stop
@section('maincontent')
<div class="row margin-bottom-10">
    <div class="col-md-3 pull-right">
        <a href="{{url('admin/wbt-manager')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"> Back to WBT Manager</a>
    </div>
</div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Subjects</a></li>
        <li><a href="#add-subject" data-toggle="tab">Add New Subjects</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Subject Name</th>
                                 <th class="hidden-sm"><center># Examinations</center></th>
                                 <th class="hidden-sm"><center>Average Scores</center></th>
                                 <th class="hidden-sm">Published</th>
                             </tr>
                         </thead>
                         <tbody>
                             {{--*/$count=1;/*--}}
                             @foreach($subjects as $subject)
                             <tr>
                                 <td>{{$count}}</td>
                                 <td><a href="{{url('admin/subject-exams')}}/{{\Crypt::encrypt($subject->id)}}">{{$subject->name}}</a></td>
                                 <td class="hidden-sm"><center>{{count($subject->exam)}}</center></td>
                                 <td><center></center></td>
                                 <td><span class="label label-info">3 Months Ago</span></td>
                             </tr>
                             {{--*/$count++;/*--}}
                             @endforeach
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="add-subject">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => url('admin/add-subject'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <span>SUBJECT CODE</span>
                                    <input type="text" name="code" placeholder="Subject Code" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <span>SUBJECT NAME</span>
                                    <input type="text" name="name" placeholder="Subject Name" required>
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-7">
                                <label class="input">
                                    <span>SUBJECT DESCRIPTION</span>
                                    <input type="text" name="description" placeholder="Subject Description" required>
                                </label>
                            </section>
                            <section class="col col-5">
                                <label class="select">
                                    <span>SUBJECT CATEGORY</span>
                                    <select name="category_id" required>
                                        <option value=" " selected disabled>Subject Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
@section('pageplugins')
    <script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            $(".table").DataTable();

        });
    </script>
@stop