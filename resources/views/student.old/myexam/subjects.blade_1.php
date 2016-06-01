<!-- Small Default Content Boxes -->
    <div class="tab-content">
        @foreach($pages as $key => $groups)
        <div class="tab-pane fade in {{ ($key+1 == 1)? 'active': '' }}" id="provider{{ $body }}-{{ $key+1 }}">
            @foreach($groups as $exams)
            <div class="row content-boxes-v2 margin-bottom-40">
                @foreach($exams as $exam)
                <div class="col-sm-4 sm-margin-bottom-40">
                    <a href="javascript:void(0);" onclick="openTestWindow('{{ $body }}','{{ $category }}','{{ $exam->subject->id }}');">
                        <h2 class="heading-sm">
                            <i class="icon-custom icon-sm icon-bg-u fa fa-lightbulb-o"></i>
                            <span>{{ $exam->subject->name }}</span>
                        </h2>
                    </a>
                    <p>{{ $exam->subject->description }}</p>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    <!-- Small Default Content Boxes -->

    <div class="row content-boxes-v2">
            <div class="tag-box tag-box-v1 text-justify">
                    <ul class="pagination">
                            <li><a href="#provider{{ $body }}-1" data-toggle="tab">&laquo;</a></li>
                            @for($x=1;$x<=count($pages);$x++)
                            <li class="($x==1)?'active': '';"><a href="#provider{{ $body }}-{{$x}}" data-toggle="tab">{{ $x }}</a></li>
                            @endfor
                            <li><a href="#provider{{ $body }}-{{ count($pages) }}" data-toggle="tab">&raquo;</a></li>
                    </ul>
            </div>
    </div>