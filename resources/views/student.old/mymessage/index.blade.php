<div class="row tab-v3">
    <div class="col-sm-2">
            <ul class="nav nav-pills nav-stacked">
                @foreach($bodies as $index => $body)
                    <li class="{{ ($index == 0)? 'active' : '' }}"><a href="#{{ $body->id }}-{{ $index }}" data-toggle="tab"><i class="icon-graduation"></i>{{ $body->code }}</a></li>
                @endforeach
            </ul>
    </div>
    <div class="col-sm-10">
            <div class="tab-content">
                    @foreach($bodies as $index => $body)
                    <div class="tab-pane fade in {{ ($index==0)? 'active' : '' }}" id="{{ $body->id }}-{{ $index }}">
                        <img alt="" class="pull-left lft-img-margin img-width-200" src="assets/img/main/img22.jpg">
                        <h4><a href="#">{{ $body->name }}</a></h4>
                        <p>
                            <div class="input-group-btn">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                            Select {{ $body->code }} exam categories
                                            <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $key => $category)
                                            @if($key==count($categories)-1)
                                            <li class="divider"></li>
                                            <li><a href="javascript:void(0);" onclick="getSubjects('{{ $body->id }}','{{ $category->id }}');">{{ $category->name }}</a></li>
                                            @else
                                            <li><a href="javascript:void(0);" onclick="getSubjects('{{ $body->id }}','{{ $category->id }}');">{{ $category->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                            </div>
                        </p>
                        <div class="row-fluid {{ $body->id }}-subjects">
                            
                        </div>
                    </div>
                    @endforeach
            </div>
    </div>
</div>