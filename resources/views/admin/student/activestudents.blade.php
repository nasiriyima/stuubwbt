<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Last Seen</th>
                <th>Profile</th>
                <th>School</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                {{--*/
                $profileStats = ($student->profile)?
                $student->profile()->statistics() : 0;
                /*--}}

                <tr>
                    <td>1</td>
                    <td>
                        <a href="{{url('admin/student-profile')}}/{{\Crypt::encrypt($student->id)}}">
                            {{$student->first_name}}
                            ({{$student->email}})
                        </a>
                    </td>
                    <td>{{$student->created_at->format('d-M-Y')}} ({{$student->created_at->diffForHumans()}})</td>
                    <td>
                        <div class="progress progress-u progress-xxs">
                                        <span class="progress-bar {{($profileStats < 30)? 'progress-bar-red':($profileStats < 70)? 'progress-bar-warning':'progress-bar-success'}}" style="width: {{$profileStats}}%">
                                        </span>
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>