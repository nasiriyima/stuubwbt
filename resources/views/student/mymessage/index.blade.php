@extends('student_layout')

@section('maincontent')
    <div class="row">
        <div class="col-md-12">
            <!--Basic Table-->
            <div class="panel panel-u margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Messages</h3>
                </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <input type="submit" class="btn-u" name="compose" data-toggle="modal" data-target="#compose" value="Compose">
                    </div>
                    <div class="modal fade" id="compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel4">Responsive Modal</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- Review Form-->
                                    <form action="#" id="sky-form2" class="sky-form">
                                        <header>Review form</header>

                                        <fieldset>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-user"></i>
                                                    <input type="text" name="name" id="name" placeholder="Your name">
                                                </label>
                                            </section>

                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-envelope"></i>
                                                    <input type="email" name="email" id="email" placeholder="Your e-mail">
                                                </label>
                                            </section>

                                            <section>
                                                <label class="label"></label>
                                                <label class="textarea">
                                                    <i class="icon-append fa fa-comment"></i>
                                                    <textarea rows="3" name="review" id="review" placeholder="Text of the review"></textarea>
                                                </label>
                                            </section>
                                        </fieldset>
                                    </form>
                                    <!-- End Review Form-->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn-u btn-u-primary">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th class="hidden-sm">Last Name</th>
                        <th>Username</th>
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
            <!--End Basic Table-->
        </div>
    </div>
@stop