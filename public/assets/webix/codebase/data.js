chart_data = [{
        id:"root",
        value:"Commander's Office",
        data:[{ 
                id:"1",
                value:"Administration",
                data:[{
                        id:"1.1",
                        value:"Clinical",
                        $type: "list",
                        data:[  { id:"1.1.1", value:"GOPD" },
				{ id:"1.1.2", value:"A&E" }
			]},
                    
			{ id:"1.2", 
                          value:"Nursing",
                          $type:"list",
                          data:[
                              { id:"1.2.1", value:"Labour & Maternity"},
                              { id:"1.2.2", value:"ANC"}
			]},
                    
			{ id:"1.3",value:"Finance"},
                    
			{ id:"1.4", value:"Pharmacy"},
                    
                        { id:"1.5",
                          value:"Laboratory",
                          $type:"list",
                          data:[
                              { id:"1.5.1", value:"Microbiology"},
                              { id:"1.5.2", value:"Patology"},
                              { id:"1.5.3", value:"Urinalysis"},
                          ]},
                        { id:"1.6", value:"Records"},
                        { id:"1.7", value:"Physiotheraphy"},
                        { id:"1.8", value:"Theater"}
		]}
	]}
];
chart_data_style = [
	{id:"root", value:"Board of Directors", $css: "top",  data:[
		{ id:"1", value:"Managing Director", $css:{background: "#ffe0b2", "border-color": "#ffcc80"}, data:[
			{id:"1.1", value:"Base Manager", data:[
				{ id:"1.1.1", value:"Store Manager" },
				{ id:"1.1.2", value:"Office Assistant", data:[
					{ id:"1.1.2.1", value:"Dispatcher", data:[
						{ id:"1.1.2.1.1", value:"Drivers" }
					] }

				] },
				{ id:"1.1.3", value:"Security" }
			]},
			{ id:"1.2", value:"Business Development Manager", data:[
				{ id:"1.2.1", value:"Marketing Executive" }
			]},
			{ id:"1.3", value:"Finance Manager", data:[
				{ id:"1.3.1", value:"Accountant", data:[
					{ id:"1.3.1.1", value:"Accounts Officer" }
				] }
			] },
			{ id:"1.4", value:"Project Manager", data:[
				{ id:"1.4.1", value:"Supervisors",data:[
					{ id:"1.4.1.1", value:"Foremen"}
				]}
			] }
		]}
	]}
];