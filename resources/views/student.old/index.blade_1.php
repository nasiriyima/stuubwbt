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
    <!--Box Shadow Effects3/4-->
<div class="row margin-bottom-20">
    <div class="col-md-7">
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
    <div class="col-md-5">
            <!-- Turquoise Panel -->
            <div class="panel panel-sea">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Leader's Board</h3>
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
                                                        <li>
                                                                <time datetime="" class="cbp_tmtime"><span>Mobile Design</span> <span>2012 - Current</span></time>
                                                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                <div class="cbp_tmlabel">
                                                                        <h2>Farida</h2>
                                                                        <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
                                                                </div>
                                                        </li>
                                                        <li>
                                                                <time datetime="" class="cbp_tmtime"><span>Web Designer</span> <span>2007 - 2012</span></time>
                                                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                <div class="cbp_tmlabel">
                                                                        <h2>Kemi</h2>
                                                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
                                                                </div>
                                                        </li>
                                                        <li>
                                                                <time datetime="" class="cbp_tmtime"><span>Photodesigner</span> <span>2003 - 2007</span></time>
                                                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                <div class="cbp_tmlabel">
                                                                        <h2>Chidi</h2>
                                                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
                                                                </div>
                                                        </li>
                                                </ul>
                                        </div>
                                </div>
                                <!--End Timeline-->
                    </div>
            </div>
            <!-- End Turquoise Panel -->
    </div>
</div>
</div>
@stop
@section('pagejs')
<script src="{{ asset('public/assets/rickshaw/vendor/d3.v3.js') }}"></script>
<script src="{{ asset('public/assets/rickshaw/rickshaw.js') }}"></script>
<script type="text/javascript">
var myGraph = new Rickshaw.Graph({
    element: document.querySelector("#chart"),
    width: 500,
    height: 250,
    min: 0,
    max: 18,
    renderer: 'lineplot',
    series: [ 
    {
      name: "Series 1",
      color: "steelblue",
      data: [
      {x: 0, y:10,},
      {x: 1, y:3,},
      {x: 2, y:8,},
      {x: 3, y:15,},
      {x: 4, y:12,},
      {x: 5, y:8,},
      {x: 6, y:3,},
      {x: 7, y:5,},
      {x: 8, y:2,},
      {x: 9, y:1,},
      {x: 10, y:4,},
      ]
    },
    {
      name: "Series 2",
      color: "green",
      data: [
      {x: 0, y:5,},
      {x: 1, y:3,},
      {x: 2, y:8,},
      {x: 3, y:6,},
      {x: 4, y:3,},
      {x: 5, y:12,},
      {x: 6, y:13,},
      {x: 7, y:14,},
      {x: 8, y:12,},
      {x: 9, y:8,},
      {x: 10, y:9,},
      ]
    }
    ]
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