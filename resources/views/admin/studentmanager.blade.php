@extends('admin_layout')

@section('pagetitle')
STUDENT MANAGER
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Registered Students</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th class="hidden-sm">Last Name</th>
                            <th>E-Mail</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td class="hidden-sm">Otto</td>
                                    <td>@mdo</td>
                                    <td><span class="label label-warning">Expiring</span></td>
                            </tr>
                            <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td class="hidden-sm">Thornton</td>
                                    <td>@fat</td>
                                    <td><span class="label label-success">Success</span></td>
                            </tr>
                            <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td class="hidden-sm">the Bird</td>
                                    <td>@twitter</td>
                                    <td><span class="label label-danger">Error!</span></td>
                            </tr>
                            <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    <td>@htmlstream</td>
                                    <td><span class="label label-info">Pending..</span></td>
                            </tr>
                    </tbody>
                </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('pagejs')

@stop