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
                    <td>{{$student->created_at->format('d-M-Y')}} ({{$student->created_at->diffForHumans()}})</td>
                    <td>
                        <span class="label label-green rounded-2x">Active</span>
                    </td>
                </tr>
                {{--*/$count++/*--}}
            @endforeach
            </tbody>
        </table>
    </div>
</div>