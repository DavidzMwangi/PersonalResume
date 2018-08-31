@extends('backend.layouts.master')
@section('style')
    <link href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

@endsection

@section('content')
{{--<div id="technical_skills_form">--}}
    <div class="row" id="technical_skills_form">
        <div class="col-xs-12">
            <div class="card card-banner ">
                <div class="card-header " style="background: rgba(22,62,23,0.3)">
                    <div class="card-title ">
                        <div class="title" style="color: white">Technical Skills</div>

                    </div>
                    <ul class="card-action">
                        <li>
                            <a href="{{route('admin.technical_skills')}}">
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
                            <input class="form-control" name="skill_name" id="skill_name" required >
                        </div>


                        <div class="form-group col-md-4 col-lg-4 col-sm-1">
                            <label for="index">Index(Percentage)</label>
                            <input name="index"  type="number" id="index" class="form-control" min="1" max="100" required>
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

                        <tr v-for="(record,key) in records">
                            <td>@{{ record.skill_name }}</td>
                            <td>@{{record.index}}%</td>
                            <td>@{{ record.created_at }}</td>
                            <td><button class="btn btn-primary">Edit</button></td>
                            <td><button class="btn btn-danger" @click="deleteSkill(record.id)">Delete</button></td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
{{--</div>--}}
@endsection

@section('script')
    <script src="{{asset('plugins/jasny-bootstrap/js/jasny-bootstrap.js')}}"></script>
    {{--<script type="text/javascript" src="../assets/js/vendor.js"></script>--}}
    {{--<script type="text/javascript" src="{{asset('backend/js/app.js')}}"></script>--}}

    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $('#technical_skills_table').DataTable({

        });
        let insert_form=new Vue({
            el:'#technical_skills_form',
            data:{
                // records:{},

            },
            created:function () {


            },
            methods:{


                saveForm:function () {
                    let me=this;

                    let form=document.forms.namedItem("technical_skill_form");
                    let formData=new FormData(form);
                    let url1='{{route('admin.save_technical_skill')}}';
                    axios.post(url1,formData)
                        .then(res=>{
                            $('#skill_name').val("");
                            $('#index').val("");
                            window.location='{{route('admin.technical_skills')}}'
                            // me.records=res.data.technical_skills;

                            // me.record=res.data.about
                        })
                        .catch(err=>{
                            alert("an error occured")
                        });
                    form2.loadMainData();
                }

            }
        });

        let form2=new Vue({
            el:"#technical_skill_form2",
            data:{
                records:{}
            },
            created:function(){
                this.loadMainData()
            },
            methods:{
                loadMainData:function () {
                    // alert("hi");
                    let url='{{route('admin.technical_skills_basics')}}';
                    let me=this;
                    axios.get(url)
                        .then(res=>{
                            me.records=res.data.technical_skills;

                        })
                        .catch(err=>{
                            alert('controller')
                        })
                },
                deleteSkill:function (id) {
                    let url12='{{route('admin.delete_technical_skill')}}';

                    axios.post(url12,{'id':id})
                        .then(res=>{
                            window.location='{{route('admin.technical_skills')}}'
                        })
                        .catch(res=>{

                        })
                }
            }

        })
    </script>
@endsection
