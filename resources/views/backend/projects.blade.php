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

                        <form name="project_form" id="project_form" method="post">




                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="start_date">Project Name</label>
                                <input class="form-control" name="project_name" placeholder="Project Name" type="text" id="project_name" required >
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="project_duration">Project Duration (Months)</label>
                                <input class="form-control"  name="project_duration" placeholder="Project Duration(Months)" id="project_duration" type="number"  required >
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="project_completion_date">Completion Date</label>
                                <input class="form-control" name="project_completion_date" type="date" id="project_completion_date" placeholder="Project completion Date" required>
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="maintaining_it">Maintaining It</label>
                                <br>
                                <input type="checkbox" value="1" name="maintaining_it" id="maintaining_it">
                            </div>

                            <div class=" form-group col-md-4 col-lg-4 col-sm-12">
                                <label for="project_year">Project Year</label>
                                <input class="form-control" name="project_year" placeholder="Project Year" type="text" id="project_year"   required >
                            </div>



                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                <button class="btn btn-success" onsubmit="return false"  @click="saveProject()" id="submit">Submit</button>
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
                                <th>No</th>
                                <th>Project Name</th>
                                <th>Project Duration</th>
                                <th>Completion Date</th>
                                <th>Still Maintaining it?</th>
                                <th>Project Year</th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                   <td>{{$project->project_name}}</td>
                                   <td>{{$project->project_duration}}</td>
                                   <td>{{$project->project_completion_date}}</td>
                                   <td>{{$project->maintaining_it}}</td>
                                   <td>{{$project->project_year}}</td>
                                </tr>


                            @endforeach

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


            },
            created:function () {

            },
            methods:{
                saveProject:function () {
                    let form=document.forms.namedItem('project_form');

                    let formData=new FormData(form);

                    let url='{{route('admin.save_project')}}';
                    axios.post(url,formData)
                        .then(res=>{
                            window.location='{{route('admin.projects')}}';
                        })
                        .catch(err=>{
                            swal("Warning!", "An error occurred. Please retry", "warning");

                            //  swal({
                            //     title: "Good job!",
                            //     text: "You clicked the button!",
                            //     icon: "warning",
                            //     button: "Aww yiss!",
                            // })
                        })
                }
            }
        })
    </script>
@endsection
