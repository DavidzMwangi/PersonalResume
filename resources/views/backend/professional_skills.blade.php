@extends('backend.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

    @endsection

@section('content')
    <div class="row" id="professional_form">
        <div class="row" >
            <div class="col-xs-12">
                <div class="card card-banner ">
                    <div class="card-header " style="background: rgba(22,62,23,0.3)">
                        <div class="card-title ">
                            <div class="title" style="color: white">Professional Skills</div>

                        </div>
                        <ul class="card-action">
                            <li>
                                <a href="{{route('admin.professional_skills')}}">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </li>
                        </ul>
                        <hr>
                    </div>
                    <div class="card-body">

                        <form name="technical_skill_form" id="technical_skill_form" method="post">

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="skill_name">Skill Name</label>
                                <input class="form-control" v-model="skill_name" name="skill_name" placeholder="Skill Name" id="skill_name" required >
                            </div>

                            <div class="form-group col-md-4 col-lg-4 col-sm-1">
                                <label for="description">Description</label>
                               <textarea name="description" id="description" v-model="description" class="form-control" placeholder="Enter Description Here ...">

                               </textarea>
                            </div>

                                <div class="form-group col-md-4 col-sm-12 col-lg-4">
                                    <label for="start_date">Start Date</label>
                                    <input class="form-control" type="date" id="start_date" v-model="start_date" name="start_date">
                                </div>

                                <div class="form-group col-md-4 col-sm-12 col-lg-4">
                                    <label for="end_date">End Date</label>
                                    <input class="form-control" type="date" id="end_date" v-model="end_date" name="end_date">
                                </div>



                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                <button class="btn btn-success" type="button" @click="saveForm()" id="submit">Submit</button>
                            </div>

                        </form>

                    </div>

                    <div class="card-footer">



                    </div>
                </div>
            </div>
        </div>


        <br>
        <div class="row" id="technical_skill_form2">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        Datatable
                    </div>
                    <div class="card-body no-padding">
                        <table class=" table table-striped primary" id="technical_skills_table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Skill Name</th>
                                <th>Index(Percentage)</th>
                                <th>Creation Date</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>

                            {{--<tr v-for="(record,key) in records">--}}
                                {{--<td>@{{ record.skill_name }}</td>--}}
                                {{--<td>@{{record.index}}%</td>--}}
                                {{--<td>@{{ record.created_at }}</td>--}}
                                {{--<td><button class="btn btn-primary">Edit</button></td>--}}
                                {{--<td><button class="btn btn-danger" @click="deleteSkill(record.id)">Delete</button></td>--}}

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
    <script type="text/javascript">
        $('#technical_skills_table').DataTable({

        });
        let form=new Vue({
            el:'#professional_form',
            data:{
                skill_name:'',
                description:'',
                start_date:'',
                end_date:''
            },
            created:function () {

            },
            methods:{
                saveForm:function () {
                    alert("hehe")
                }
            }
        })
    </script>
    @endsection
