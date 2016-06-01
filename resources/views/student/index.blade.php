@extends('student_layout')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline2.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/profile.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/rickshaw/rickshaw.css') }}">
<style type="text/css">
  #xaxis {
    margin-left:20px
  }
  #yaxis {
    display:block; 
    float:left; 
    width:20px; 
    height:280px; 
    padding-bottom:10px;
  }
  #chart {
    margin-left:20px;
  }
</style>
@stop

@section('maincontent')
<div class="profile_body">
    <!-- Interactive Slider -->
    <div class="interactive-slider-v1 img-v3">
        <div class="container">
            <h2>Hi {{ $fname }}, </h2>
            <p>Welcome to STUUB - WBT Student user Dashboard.</p>
        </div>
    </div>
    <!-- End Interactive Slider -->

    <!-- Content Boxes v6-->
    <div class="container content-sm">
        <div class="row">
            <div class="col-md-6">
                <!-- Dark Blue Panel -->
                <div class="panel panel-dark-blue">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Performance Chart</h3>
                    </div>
                    <div class="panel-body">
                        <div style="margin-bottom:10px; margin-left:20px" id="mylegend"></div>
                        <div id="yaxis"></div>
                        <div id="chart"></div>
                        <div id="xaxis"></div>
                    </div>
                </div>
                <!-- End Dark Blue Panel -->
            </div>
            <div class="col-md-6">
                <!-- Turquoise Panel -->
                <div class="panel panel-sea">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i>Leader's Board as at {{ \Carbon\Carbon::now()->subMonth()->format('M, Y') }} -  {{ \Carbon\Carbon::now()->format('M, Y') }}</h3>
                    </div>
                    <div class="panel-body">
                        <!--Timeline-->
                        <div class="panel panel-profile">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> Experience</h2>
                                <a href="#"><i class="fa fa-cog pull-right"></i></a>
                            </div>
                            <div class="panel-body margin-bottom-40">
                                <ul class="timeline-v2 timeline-me">
                                    @foreach($leaders as $leader)
                                        <li>
                                            <time datetime="" class="cbp_tmtime"><span>{{ $leader->user->profile->school or 'Unspecified' }}</span> <span>{{ $leader->user->created_at->diffForHumans()  }}</span></time>
                                            <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                            <div class="cbp_tmlabel">
                                                <h2>{{ $leader->user->first_name  }} {{ $leader->user->last_name  }}</h2>
                                                <p> Average Score: {{ number_format($leader->score / $leader->user->history()->attempts($startDate, $endDate)->count(), 2)  }}</p>
                                                <p> Total Number of Attempts: {{ $leader->user->history()->attempts($startDate, $endDate)->count() }}</p>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--End Timeline-->
                    </div>
                </div>
                <!-- End Turquoise Panel -->
            </div>
        </div><!--/row-->
    </div><!--/end container-->
    <!-- End Content Boxes v6 -->
</div>
@stop
@section('pagejs')
<script type="text/javascript" src="{{ asset('public/assets/rickshaw/vendor/d3.v3.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/rickshaw/rickshaw.js') }}"></script>
<script type="text/javascript">
    var myGraph = new Rickshaw.Graph({
    element: document.querySelector("#chart"),
    width: 500,
    height: 250,
    min: 0,
    max: 18,
    renderer: 'lineplot',
    series: JSON.parse(JSON.stringify({!! $series !!}))
  });
    var xTicks = new Rickshaw.Graph.Axis.X({
      graph:myGraph,
      orientation: "bottom",
      element: document.querySelector("#xaxis")
    });
    var yTicks = new Rickshaw.Graph.Axis.Y({
      graph:myGraph,
      orientation: "left",
      element: document.querySelector("#yaxis")
    });
    var graphHover = new Rickshaw.Graph.HoverDetail({
      graph:myGraph
    });
    var myLegend = new Rickshaw.Graph.Legend({
      graph:myGraph,
      element: document.querySelector("#mylegend")
    });
    myGraph.render();
</script>
@stop