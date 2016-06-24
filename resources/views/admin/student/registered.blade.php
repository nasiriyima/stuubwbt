<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Date Registered</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            {{--*/$count = 1/*--}}
            @foreach($students as $student)
                <tr>
                    <td>{{$count}}</td>
                    <td><a href="{{url('admin/student-profile')}}/{{\Crypt::encrypt($student->id)}}">{{$student->first_name}}</a></td>
                    <td>
                        {{$student->email}}
                    </td>
                    <td>
                        @if($student->last_login != NULL)
                        {{$student->last_login->format('d M, Y')}} ({{$student->last_login->diffForHumans()}})
                        @endif
                    </td>
                    <td>
                        @if($student->last_login != NULL)
                            @if($student->userStatus(0,60)->find($student->id) != NULL)
                                <span class="label label-green rounded-2x">Active</span>
                            @elseif ($student->userStatus(60, 90)->find($student->id) != NULL)
                                <span class="label label-yellow rounded-2x">Dormant</span>
                            @else
                                <span class="label label-red rounded-2x">In Active</span>
                            @endif
                        @else

                        @endif
                    </td>
                </tr>
                {{--*/$count++/*--}}
            @endforeach
            </tbody>
        </table>
    </div>
</div>