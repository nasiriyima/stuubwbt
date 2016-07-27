@extends('admin_layout')

@section('pagetitle')
    EXAMINATION RESOURCES MANAGER - <small>Categories</small>
@stop
@section('maincontent')
    <div class="row margin-bottom-10">
        <div class="col-md-3 pull-right">
            <a href="{{url('admin/wbt-manager')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"> Back to WBT Manager</a>
        </div>
    </div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Categories</a></li>
        <li><a href="#add-category" data-toggle="tab">Add New Categories</a></li>
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
                                 <th class="hidden-sm"><center>#Subjects</center></th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                         {{--*/$count = 1/*--}}
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td><a href="#">{{$category->name}}</a></td>
                                    <td class="hidden-sm"><center>{{$category->subject->count()}}</center></td>
                                    <td></td>
                                </tr>
                                {{--*/$count++/*--}}
                            @endforeach
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="add-category">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => url('admin/add-category'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <span>CATEGORY CODE</span>
                                    <input type="text" name="code" placeholder="Category Code" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <span>CATEGORY NAME</span>
                                    <input type="text" name="name" placeholder="Category Name" required>
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