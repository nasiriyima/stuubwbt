<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>School Name</th>
                <th># of Students</th>
            </tr>
            </thead>
            <tbody>
            {{--*/$count = 1/*--}}
            @foreach($schools as $school)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$school->code}}</td>
                    <td><a href="{{url('admin/school-profile')}}/{{\Crypt::encrypt($school->id)}}"> {{$school->name}}</a></td>
                    <td>{{$school->profile->count()}}</td>
                </tr>
                {{--*/$count++/*--}}
            @endforeach
            </tbody>
        </table>
    </div>
</div>