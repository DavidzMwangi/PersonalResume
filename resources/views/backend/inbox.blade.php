@extends('backend.layouts.master')
@section('style')
    <link href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

@endsection

@section('content')

    <div class="row" id="technical_skill_form2">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    Inbox
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" id="technical_skills_table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="(inbox,key) in inboxes">
                            <td>@{{ inbox.first_name }}</td>
                            <td>@{{inbox.last_name}}</td>
                            <td>

                                @{{ inbox.email }}
                            </td>


                            <td>@{{ inbox.message }}</td>
                            <td><button class="btn btn-danger" @click="deleteSkill(inbox.id)">Delete</button></td>

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

        let inbox_data=new Vue({
            el:'#technical_skill_form2',
            data:{
                inboxes:{},
            },
            created:function(){
                this.loadExistingInbox();
            },
            methods:{
                loadExistingInbox:function () {
                    let url='{{route('admin.all_inbox')}}';
                    let me=this;
                    axios.get(url)
                        .then(res=>{
                            me.inboxes=res.data.inboxes;
                        })
                }
            }
        })
    </script>
@endsection
