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
                                <label for="start_date">Start Date</label>
                                <input class="form-control" v-model="start_date" name="start_date" placeholder="Start Date" type="date" id="start_date" required >
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="end_date">End Date</label>
                                <input class="form-control" v-model="end_date" name="end_date" placeholder="Start Date" id="end_date" type="date"  required >
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" v-model="description" id="description" placeholder="Enter description here.."></textarea>
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="company">Company Name</label>
                                <input class="form-control" v-model="company" name="company" placeholder="Company Name"  id="company" required >
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="company_email">Company Email</label>
                                <input class="form-control" v-model="company_email" name="company_email" placeholder="Company Name" id="company_email"   required >
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="company_website">Company Website</label>
                                <input class="form-control" v-model="company_website" name="company_website" placeholder="Company Website" id="company_website"   required >
                            </div>

                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                <button class="btn btn-success" type="button"  @click="saveExperience" id="submit">Submit</button>
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
                        <table class=" table table-striped primary" id="experience_table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Interest Name</th>
                                <th>Rating</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>

                            {{--<tr v-for="(interest,key) in interests">--}}
                                {{--<td>@{{interest.name }}</td>--}}
                                {{--<td>@{{interest.rating}}</td>--}}

                                {{--<td><button class="btn btn-primary">Edit</button></td>--}}
                                {{--<td><button class="btn btn-danger" @click="deleteInterest(interest.id)">Delete</button></td>--}}

                            {{--</tr>--}}

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
        $('#experience_table').DataTable({

        });
        let abc=new Vue({
            el:'#interest_complete_form',
            data:{
               start_date:'',
                end_date:'',
                description:'',
                company:'',
                company_email:'',
                company_website:'',
                experiences:[]

            },
            created:function () {

            },
            methods:{
                saveExperience:function () {

                }
            }
        })
    </script>
@endsection
