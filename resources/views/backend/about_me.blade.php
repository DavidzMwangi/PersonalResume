@extends('backend.layouts.master')
@section('style')
    <link href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />

@endsection

@section('content')

    <div class="row" id="about_me_form">
        <div class="col-xs-12">
            <div class="card card-banner ">
                <div class="card-header " style="background: rgba(22,62,23,0.3)">
                    <div class="card-title ">
                        <div class="title" style="color: white">About Me</div>

                    </div>
                    <ul class="card-action">
                        <li>
                            <a href="{{route('admin.about_me')}}">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </li>
                    </ul>
                    <hr>
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


                    <div class="form-group col-md-12 col-lg-12 col-sm-12">
                        <button class="btn btn-success" type="button" @click="saveForm()" id="submit">Submit</button>
                    </div>

                    </form>

                </div>

                <div class="card-footer">

                        <div class="form-group col-md-4">
                            <form action="" method="post" name="image_1_form" enctype="multipart/form-data">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 400px; height: 300px;">
                                        <img src="{{asset('img/image.jpg')}}" alt="..."></div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 300px;"></div>
                                    <div>
                                                <span class="btn btn-default btn-file">
                                                    <input type="hidden" value="" name="package_id">
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
