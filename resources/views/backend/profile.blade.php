@extends('backend.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

@endsection
@section('content')

    <div id="profile_page" class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body app-heading">
                    <img class="profile-img" src="../assets/images/profile.png">
                    <div class="app-title">
                        <div class="title"><span class="highlight">@{{ name }}</span></div>
                        <div class="description">@{{email}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li role="tab1" class="active">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li role="tab3">
                            <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Timeline</a>
                        </li>
                        <li role="tab4">
                            <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Setting</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Basics</div>
                                    <div class="section-body __indent">
                                        <form name="basic_form" v-on:submit.prevent="onSubmit">
                                       <div class="form-group">

                                           <label for="name">UserName</label>
                                           <input class="form-control" id="name" name="name" v-model="name"  placeholder="User Name">

                                       </div>


                                        <div class="form-group">

                                            <label for="email">Email</label>
                                            <input class="form-control" id="email" v-model="email"  name="email" type="email">

                                        </div>


                                        <div class="form-group">

                                           <button class="btn btn-success" type="submit" @click="updateBasicData()">Update</button>

                                        </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Password</div>
                                    <div class="section-body __indent">


                                        @if($errors->has('password'))

                                            <div class="alert alert-danger">
                                                {{ $errors->first('password') }}
                                            </div>
                                            @endif
                                        <form action="{{route('admin.change_password')}}" method="post">
                                            {{csrf_field()}}



                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" name="password" id="password" type="password">
                                        </div>


                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input class="form-control" name="password_confirmation" id="confirm_password" type="password">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success">Update</button>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div class="section">
                                    <div class="section-title">Other Details</div>
                                    <div class="section-body">
                                        <form name="others_form" v-on:submit.prevent="onSubmit">


                                        <div class="form-group">
                                            <label for="email_2">Second Email</label>
                                            <input class="form-control" id="email_2" name="email_2" v-model="email_2" type="email">
                                        </div>


                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input class="form-control" id="website" v-model="website" name="website"  type="text">
                                        </div>


                                        <div class="form-group">
                                            <label for="phone_number_1">Phone Number</label>
                                            <input class="form-control" id="phone_number_1" v-model="phone_number" name="phone_number_1"   type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone_number_2">Phone Number 2</label>
                                            <input class="form-control" id="phone_number_2" v-model="phone_number_2" name="phone_number_2"  type="text">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit" @click="updateOtherDetails()">Update</button>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab3">

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Bio</div>
                                    <div class="section-body __indent">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</div>
                                </div>
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Education</div>
                                    <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div class="section">
                                    <div class="section-title">Activities</div>
                                    <div class="section-body">
                                        <div class="media social-post">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img src="../assets/images/profile.png" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4 class="title">Scott White</h4>
                                                    <h5 class="timeing">20 mins ago</h5>
                                                </div>
                                                <div class="media-content">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate.</div>
                                                <div class="media-action">
                                                    <button class="btn btn-link"><i class="fa fa-thumbs-o-up"></i> 2 Like</button>
                                                    <button class="btn btn-link"><i class="fa fa-comments-o"></i> 10 Comments</button>
                                                </div>
                                                <div class="media-comment">
                                                    <input type="text" class="form-control" placeholder="comment...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media social-post">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img src="../assets/images/profile.png" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4 class="title">Scott White</h4>
                                                    <h5 class="timeing">20 mins ago</h5>
                                                </div>
                                                <div class="media-content">
                                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
                                                    <div class="attach">
                                                        <a href="#" class="thumbnail">
                                                            <img src="http://placehold.it/100x100" class="img-responsive">
                                                        </a>
                                                        <a href="#" class="thumbnail">
                                                            <img src="http://placehold.it/100x100" class="img-responsive">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-action">
                                                    <button class="btn btn-link"><i class="fa fa-thumbs-o-up"></i> 2 Like</button>
                                                    <button class="btn btn-link"><i class="fa fa-comments-o"></i> 10 Comments</button>
                                                </div>
                                                <div class="media-comment">
                                                    <input type="text" class="form-control" placeholder="comment...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab4">

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Bio</div>
                                    <div class="section-body __indent">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</div>
                                </div>
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Education</div>
                                    <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div class="section">
                                    <div class="section-title">Activities</div>
                                    <div class="section-body">
                                        <div class="media social-post">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img src="../assets/images/profile.png" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4 class="title">Scott White</h4>
                                                    <h5 class="timeing">20 mins ago</h5>
                                                </div>
                                                <div class="media-content">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate.</div>
                                                <div class="media-action">
                                                    <button class="btn btn-link"><i class="fa fa-thumbs-o-up"></i> 2 Like</button>
                                                    <button class="btn btn-link"><i class="fa fa-comments-o"></i> 10 Comments</button>
                                                </div>
                                                <div class="media-comment">
                                                    <input type="text" class="form-control" placeholder="comment...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media social-post">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img src="../assets/images/profile.png" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4 class="title">Scott White</h4>
                                                    <h5 class="timeing">20 mins ago</h5>
                                                </div>
                                                <div class="media-content">
                                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
                                                    <div class="attach">
                                                        <a href="#" class="thumbnail">
                                                            <img src="http://placehold.it/100x100" class="img-responsive">
                                                        </a>
                                                        <a href="#" class="thumbnail">
                                                            <img src="http://placehold.it/100x100" class="img-responsive">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-action">
                                                    <button class="btn btn-link"><i class="fa fa-thumbs-o-up"></i> 2 Like</button>
                                                    <button class="btn btn-link"><i class="fa fa-comments-o"></i> 10 Comments</button>
                                                </div>
                                                <div class="media-comment">
                                                    <input type="text" class="form-control" placeholder="comment...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection

@section('script')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" >

        let abc=new Vue({
            el:'#profile_page',
            data:{
                name:'{{\Illuminate\Support\Facades\Auth::user()->name}}',
                email:'{{\Illuminate\Support\Facades\Auth::user()->email}}',
                phone_number:'{{\Illuminate\Support\Facades\Auth::user()->phone_number_1}}',
                phone_number_2:'{{\Illuminate\Support\Facades\Auth::user()->phone_number_2}}',
                website:'{{\Illuminate\Support\Facades\Auth::user()->website}}',
                email_2:'{{\Illuminate\Support\Facades\Auth::user()->email_2}}'

            },
            created:function () {
            },
            methods:{


                updateBasicData:function () {
                    let url1='{{route('admin.update_basic_data')}}';
                    let form=document.forms.namedItem("basic_form");
                    let formData=new FormData(form);
                    let me=this;
                    axios.post(url1,formData)
                        .then(res=>{

                           me.name=res.data.user.name;
                           me.email=res.data.user.email;

                            swal("Success!", "Successfully updated", "success");

                        })
                        .catch(err=>{
                            swal("Warning!","An error occurred, please retry","warning");
                        })
                },

                updateOtherDetails:function () {

                    let url2='{{route('admin.update_other_form')}}';
                    let form=document.forms.namedItem("others_form");
                    let formData=new FormData(form);
                    let me=this;

                    axios.post(url2,formData)
                        .then(res=>{
                           me.phone_number=res.data.user.phone_number;
                           me.phone_number_2=res.data.user.phone_number_2;
                           me.website=res.data.user.website;
                           me.email_2=res.data.user.email_2;

                            swal("Success!", "Successfully updated", "success");

                        })
                        .catch(err=>{
                            swal("Warning!","An error occurred, please retry","warning");

                        })

                }
            }
        });


        @if($errors->has('success_password'))

            let message='{{$errors->first('success_password')}}';
        swal("Success!", message, "success");

        @endif
    </script>
@endsection
