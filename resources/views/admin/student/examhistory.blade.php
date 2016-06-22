<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Attempts</th>
                <th>Average Score</th>
            </tr>
            </thead>
            <tbody>
            {{--*/$count = 1/*--}}
            @foreach($student->history->groupBy('exam_id') as $exam)
                {{--*/$examdetails = $exam->first();/*--}}
                <tr>
                    <td>{{$count}}</td>
                    <td>
                        {{$examdetails->exam->examProvider->code}},
                        {{$examdetails->exam->subject->name}}
                        ({{$examdetails->exam->month->name}}
                        {{$examdetails->exam->session->name}})
                    </td>
                    <td>{{$exam->count()}}</td>
                    {{--*/
                    $averagescore = $exam->average('score');
                    $noQuestions = $examdetails->exam->question->count();
                    $score = $averagescore / $noQuestions;
                    $score = $score * 100;
                    /*--}}
                    <td>{{number_format($score, 1)}}%</td>
                </tr>
                {{--*/$count++/*--}}
            @endforeach
            </tbody>
        </table>
    </div>
</div>