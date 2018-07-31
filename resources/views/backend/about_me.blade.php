@extends('backend.layouts.master')
@section('style')
    <link href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />

@endsection

@section('content')

    <div class="row" id="about_me_form">
        <div class="col-xs-12">
            <div class="card card-banner ">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">About Me</div>
                    </div>
                    <ul class="card-action">
                        <li>
                            <a href="{{route('admin.about_me')}}">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <form name="about_me_form" id="about_me_form" method="post">

                    <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                        <label for="first_name">First Name</label>
                        <input class="form-control" name="first_name" id="first_name" v-model="record.first_name">
                    </div>


                    <div class="form-group col-md-4 col-lg-4 col-sm-1">
                        <label for="middle_name">Middle Name</label>
                        <input name="middle_name" id="middle_name" class="form-control" v-model="record.middle_name">
                    </div>

                    <div class="form-group col-md-4 col-lg-4 col-sm-1">
                        <label for="last_name">Last Name</label>
                        <input name="last_name" id="last_name" class="form-control" v-model="record.last_name">
                    </div>

                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" v-model="record.description"> </textarea>
                    </div>


                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <button class="btn btn-success" type="button" @click="saveForm()" id="submit">Submit</button>
                    </div>

                    </form>
                    <div class="row">
                    <div class="form-group col-md-4">
                        <form action="" method="post" name="image_1_form" enctype="multipart/form-data">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 400px; height: 300px;">
                                    <img src="{{asset('img/image.jpg')}}" alt="..."></div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 300px;"></div>
                                <div>
                                                <span class="btn btn-default btn-file">
                                                    {{--<input type="hidden" value="" name="package_id">--}}
                                                    <span class="fileinput-new ">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="picture"></span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-responsive btn-success" style="margin-left: 40px" @click="uploadImage(1)">Submit Button</button>
                                <button type="reset" class="btn btn-responsive btn-warning pull-left">Reset Button</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-green-light">
                <div class="card-body">
                    <i class="icon fa fa-shopping-basket fa-4x"></i>
                    <div class="content">
                        <div class="title">Sale Today</div>
                        <div class="value"><span class="sign">$</span>420</div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-blue-light">
                <div class="card-body">
                    <i class="icon fa fa-thumbs-o-up fa-4x"></i>
                    <div class="content">
                        <div class="title">Page Likes</div>
                        <div class="value"><span class="sign"></span>2453</div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-yellow-light">
                <div class="card-body">
                    <i class="icon fa fa-user-plus fa-4x"></i>
                    <div class="content">
                        <div class="title">New Registration</div>
                        <div class="value"><span class="sign"></span>50</div>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card card-mini">
                <div class="card-header">
                    <div class="card-title">Last Statuses</div>
                    <ul class="card-action">
                        <li>
                            <a href="/">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding table-responsive">
                    <table class="table card-table">
                        <thead>
                        <tr>
                            <th>Products</th>
                            <th class="right">Amount</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>MicroSD 64Gb</td>
                            <td class="right">12</td>
                            <td><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Complete</span></span></td>
                        </tr>
                        <tr>
                            <td>MiniPC i5</td>
                            <td class="right">5</td>
                            <td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Pending</span></span></td>
                        </tr>
                        <tr>
                            <td>Mountain Bike</td>
                            <td class="right">1</td>
                            <td><span class="badge badge-info badge-icon"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Confirm Payment</span></span></td>
                        </tr>
                        <tr>
                            <td>Notebook</td>
                            <td class="right">10</td>
                            <td><span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Cancelled</span></span></td>
                        </tr>
                        <tr>
                            <td>Raspberry Pi2</td>
                            <td class="right">6</td>
                            <td><span class="badge badge-primary badge-icon"><i class="fa fa-truck" aria-hidden="true"></i><span>Shipped</span></span></td>
                        </tr>
                        <tr>
                            <td>Flashdrive 128Mb</td>
                            <td class="right">40</td>
                            <td><span class="badge badge-info badge-icon"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Confirm Payment</span></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card card-tab card-mini">
                <div class="card-header">
                    <ul class="nav nav-tabs tab-stats">
                        <li role="tab1" class="active">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Browsers</a>
                        </li>
                        <li role="tab2">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">OS</a>
                        </li>
                        <li role="tab2">
                            <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">More</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="chart ct-chart-browser ct-perfect-fourth"></div>
                            </div>
                            <div class="col-sm-4">
                                <ul class="chart-label">
                                    <li class="ct-label ct-series-a">Google Chrome</li>
                                    <li class="ct-label ct-series-b">Firefox</li>
                                    <li class="ct-label ct-series-c">Safari</li>
                                    <li class="ct-label ct-series-d">IE</li>
                                    <li class="ct-label ct-series-e">Opera</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab2">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="chart ct-chart-os ct-perfect-fourth"></div>
                            </div>
                            <div class="col-sm-4">
                                <ul class="chart-label">
                                    <li class="ct-label ct-series-a">iOS</li>
                                    <li class="ct-label ct-series-b">Android</li>
                                    <li class="ct-label ct-series-c">Windows</li>
                                    <li class="ct-label ct-series-d">OSX</li>
                                    <li class="ct-label ct-series-e">Linux</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab3">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('plugins/jasny-bootstrap/js/jasny-bootstrap.js')}}"></script>

    <script>
    let insert_form=new Vue({
        el:'#about_me_form',
        data:{
            record:{},
            // first_name,
            // last_name,
            // middle_name,
            // description,
        },
        created:function () {

            this.loadMainData()
        },
        methods:{
            loadMainData:function () {

                let url='{{route('admin.about_me_basics')}}';
                let me=this;
                axios.get(url)
                    .then(res=>{
                        me.record=res.data.about_me;

                    })
            },

            saveForm:function () {
                let me=this;

                let url1='{{route('admin.save_about_me')}}';
                axios.post(url1,{"first_name":me.record.first_name,"middle_name":me.record.middle_name,"description":me.record.description,"last_name":me.record.last_name})
                    .then(res=>{
                        me.record=res.data.about
                    })
                    .catch(err=>{
                        alert("an error occured")
                    })
            }

        }
    })

</script>
@endsection
