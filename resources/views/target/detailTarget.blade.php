<div class="card-body p-5">
    <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
        
        <div class="col-sm-9 col-sm-9">
            
        <!--begin::Card-->
        <div class="card card-custom card-border">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Profil
                    </h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="flex-row flex-wrap mt-22">
                    <div class="symbol symbol-circle symbol-xl-130 mr-20">
                        <img class="" 
                        @if($data->avatar == null) 
                        src="{{asset('media/users/blank.png')}}"
                        @else
                        src="{{asset($data->avatar)}}"
                        @endif
                         alt="photo">
                    </div>
                </div>
                <div class="col-xl-9">
                    <!--begin::Wizard Step 1-->
                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row mb-0">
                            <label class="col-xl-3 col-lg-3 col-form-label">NIK:</label>
                            <div class="col-lg-9 col-xl-9 col-form-label">
                                {{$data->nik}}
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row mb-0 mt-0">
                            <label class="col-xl-3 col-lg-3 col-form-label">Full Name:</label>
                            <div class="col-lg-9 col-xl-9 col-form-label">
                                {{$data->fullname}}
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row mb-0 mt-0">
                            <label class="col-xl-3 col-lg-3 col-form-label">Place of Birth:</label>
                            <div class="col-lg-9 col-xl-9 col-form-label">
                                {{$data->placeofbirth}}
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row mb-0 mt-0">
                            <label class="col-xl-3 col-lg-3 col-form-label">Date of Birth:</label>
                            <div class="col-lg-9 col-xl-9 col-form-label">
                                {{$data->dateofbirth}}
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row mb-0 mt-0">
                            <label class="col-xl-3 col-lg-3 col-form-label">Gender:</label>
                            <div class="col-lg-9 col-xl-9 col-form-label">
                                {{$data->gender}}
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row mt-0">
                            <label class="col-xl-3 col-lg-3 col-form-label">As Known As:</label>
                            <div class="col-lg-9 col-xl-7 col-form-label" id="aka">
                                @php $no=1; @endphp
                                @foreach($data->asknownas as $aka)
                                {{$no++}}.&nbsp{{$aka}}<br>
                                @endforeach
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>
                    <!--end::Wizard Step 1-->
                    </div>
                    
            </div>
        </div>
        <!--end::Card-->
        <br>
        <!--begin::Card-->
        <div class="card card-custom card-border">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Statistic Target
                    </h3>
                </div>
            </div>
            <div class="">
                <div class="chart-container">
					<div class="chart has-fixed-height" id="activity" style="width:50%; float:left;"></div>
					<div class="chart has-fixed-height" id="vehicle" style="width:50%; float:right;"></div>
				</div>
                <div class="chart-container">
					<div class="chart has-fixed-height" id="province" style="width:50%; float:left;"></div>
                    <div class="chart has-fixed-height" id="district" style="width:50%; float:right;"></div>
				</div>
                <div class="chart-container">
					<div class="chart has-fixed-height" id="subdistrict" style="width:50%; float:left;"></div>
                    <div class="chart has-fixed-height" id="village" style="width:50%; float:right;"></div>
				</div>
            </div>
        </div>
        <!--end::Card-->
        <br>
        <!--begin::Card-->
        <div class="card card-custom card-border">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Surveillance Timeline
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div id="kt_calendar"></div>
            </div>
        </div>
        <!--end::Card-->
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/pages/features/charts/echarts.min.js') }}"></script>
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('js/pages/features/calendar/list-view.js') }}"></script>
<!--end::Page Scripts-->
<style type="text/css">
    .chart-container{position:relative;width:100%}.chart-container.has-scroll{overflow-x:scroll;overflow-y:visible;max-width:100%}@media (max-width:767.98px){.chart-container{overflow-x:scroll;overflow-y:visible;max-width:100%}}.chart{position:relative;display:block;width:100%}.chart.has-minimum-width{min-width:37.5rem}.has-fixed-height{height:250px}.chart-pie{width:100%;height:400px;min-width:31.25rem}.c3 svg{font-size:.75rem}.c3 line,.c3 path{fill:none;stroke:#999}.c3 path.domain{shape-rendering:crispEdges}.c3 text{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.c3-bars path,.c3-event-rect,.c3-legend-item-tile,.c3-xgrid-focus,.c3-ygrid{shape-rendering:crispEdges}.c3-chart-arc path{stroke:#fff}.c3-chart-arc text{fill:#fff;font-size:.8125rem}.c3-grid line{stroke:#ccc}.c3-grid text{fill:#ccc}.c3-xgrid,.c3-ygrid{stroke-dasharray:3 3}.c3-text{font-weight:500}.c3-text.c3-empty{fill:#777;font-size:2em}.c3-line{stroke-width:2px}.c3-area{stroke-width:0;opacity:.4}.c3-circle._expanded_{stroke-width:1.5px;stroke:#fff}.c3-selected-circle{fill:#fff;stroke-width:2px}.c3-bar{stroke-width:0}.c3-bar._expanded_{fill-opacity:.75}.c3-chart-arcs-title{font-size:.9375rem}.c3-chart-arcs .c3-chart-arcs-background{fill:#eee;stroke:none}.c3-chart-arcs .c3-chart-arcs-gauge-unit{fill:#333;font-size:.9375rem}.c3-chart-arcs .c3-chart-arcs-gauge-max,.c3-chart-arcs .c3-chart-arcs-gauge-min{fill:#f5f5f5}
</style>
<script type="text/javascript">
    
    //For Calendar
    var targetID = @json($data->_id);

    //Pie Chart Activity
    var activityData = @json($activities);  
    var activity = document.getElementById('activity');
    var pieActivity = echarts.init(activity);

    pieActivity.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 11
        },

        title: {
            text: 'By Activity',
            left: 'center',
            padding: 10,
            textStyle: {
                fontSize: 15,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 10
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [5, 5],
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: activityData.name,
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'By Activity',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: activityData
        }]
    });


    //Pie Chart Vehicle
    var vehicleData = @json($vehicle);
    //alert(vehicleData);
    var vehicle = document.getElementById('vehicle');
    var pieVehicle = echarts.init(vehicle);

    pieVehicle.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 11
        },

        title: {
            text: 'By Vehicle',
            left: 'center',
            padding: 10,
            textStyle: {
                fontSize: 15,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 10
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [5, 5],
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: vehicleData.name,
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'By Vehicle',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: vehicleData
        }]
    });



    //Pie Chart Province
    var provinceData = @json($province);
    var province = document.getElementById('province');
    var pieProvince = echarts.init(province);

    pieProvince.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 11
        },

        title: {
            text: 'By Province',
            left: 'center',
            padding: 10,
            textStyle: {
                fontSize: 15,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 10
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [5, 5],
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: provinceData.name,
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'By Province',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: provinceData
        }]
    });

    //Pie Chart District
    var districtData = @json($district);
    var district = document.getElementById('district');
    var pieDistrict = echarts.init(district);

    pieDistrict.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 11
        },

        title: {
            text: 'By District',
            left: 'center',
            padding: 10,
            textStyle: {
                fontSize: 15,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 10
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [5, 5],
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: districtData.name,
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'By District',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: districtData
        }]
    });

    //Pie Chart Subdistrict
    var subdistrictData = @json($subdistrict);
    var subdistrict = document.getElementById('subdistrict');
    var pieSubdistrict = echarts.init(subdistrict);

    pieSubdistrict.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 11
        },

        title: {
            text: 'By Sub District',
            left: 'center',
            padding: 10,
            textStyle: {
                fontSize: 15,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 10
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [5, 5],
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: subdistrictData.name,
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'By Sub District',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: subdistrictData
        }]
    });

    //Pie Chart Village
    var villageData = @json($village);
    var village = document.getElementById('village');
    var pieVillage = echarts.init(village);

    pieVillage.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 11
        },

        title: {
            text: 'By Village',
            left: 'center',
            padding: 10,
            textStyle: {
                fontSize: 15,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 10
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [5, 5],
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: villageData.name,
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'By Village',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: villageData
        }]
    });

</script>