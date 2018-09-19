@extends('backend.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

    @endsection
@section('content')
    <div class="row" id="interest_complete_form">
        <div class="row" >
            <div class="col-xs-12">
                <div class="card card-banner ">
                    <div class="card-header " style="background: rgba(22,62,23,0.3)">
                        <div class="card-title ">
                            <div class="title" style="color: white">Interest</div>

                        </div>
                        <ul class="card-action">
                            <li>
                                <a href="{{route('admin.interest')}}">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </li>
                        </ul>
                        <hr>
                    </div>
                    <div class="card-body">

                        <form name="interest_form" id="interest_form" method="post">

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="interest_name">Interest Name</label>
                                <input class="form-control" v-model="interest_name" name="interest_name" placeholder="Interest Name" id="interest_name" required >
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="rating">Rating</label>
                                <input class="form-control" v-model="rating" name="rating" placeholder="Rating" id="rating" type="number" max="100" required >
                            </div>



                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                <button class="btn btn-success" type="button"  @click="saveInterest" id="submit">Submit</button>
                            </div>

                        </form>

                    </div>

                    <div class="card-footer">



                    </div>
                </div>
            </div>
        </div>


        <br>
        <div class="row" >
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        Interest Table
                    </div>
                    <div class="card-body no-padding">
                        <table class=" table table-striped primary" id="technical_skills_table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Interest Name</th>
                                <th>Rating</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="(interest,key) in interests">
                                <td>@{{interest.name }}</td>
                                <td>@{{interest.rating}}</td>

                                <td><button class="btn btn-primary">Edit</button></td>
                                <td><button class="btn btn-danger" @click="deleteInterest(interest.id)">Delete</button></td>

                            </tr>

                            </tbody>
                        </table>
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
            el:'#interest_complete_form',
            data:{
                interest_name:'',
                rating:'',
                interests:''
            },
            created:function () {
            this.loadInterest();
            },
            methods:{
                deleteInterest:function (id) {

                    let url45='{{route('admin.delete_interest')}}';
                    let me=this;
                    axios.post(url45,{'id':id})
                        .then(res=>{
                            me.interests=res.data.all_data;
                        })
                        .catch(err=>{

                        })
                },
                saveInterest:function () {

                    if (this.interest_name=='' || this.rating == ''  ){
                        alert("Ensure the Interest Name and Rating are not empty");
                        return null;
                    }else if(this.rating>100){
                        alert("Rating should be less that 100");
                        return null;
                    }
                    //save the record
                    let url23='{{route('admin.save_interest')}}';
                    let me=this;
                    axios.post(url23,{'interest_name':me.interest_name,'rating':me.rating})
                        .then(res=>{
                            me.interests=res.data.interests;
                            me.interest_name='';
                            me.rating='';
                        })
                        .catch(err=>{
                        })

                },
                loadInterest:function () {
                    let me=this;
                    let url34='{{route('admin.all_interests')}}';
                    axios.get(url34)
                        .then(res=>{
                            me.interests=res.data.all_data;
                        })
                        .catch(err=>{
                        })
                }
            }
        })
    </script>
    @endsection
