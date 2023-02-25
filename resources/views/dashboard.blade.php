<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link rel="stylesheet"
        href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="/library/mdbootstrap/css/mdb.min.css"/>
<script src="{{ asset('/library/mdbootstrap/js/mdb.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/library/sweetalert2/dist/sweetalert2.min.js') }}"/>
<script src="{{ asset('/library/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<title>Employee Details</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
{{-- <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> --}}
{{-- <script>
//     $(document).ready( function () {
//     $('#employees_list').DataTable();
// } );
$(document).ready(function() {
    $('#employees_list').DataTable( {
        "ajax": "https://s3-us-west-2.amazonaws.com/s.cdpn.io/730692/json.txt",
        "columns": [
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "extn" },
            { "data": "start_date" },
            { "data": "salary" }
        ]
    } );
} );

</script> --}}

</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mt-5" >
                        <h2 class="mb-4">Employee List</h2>
                        <div class="row" style="margin-top:20px;margin-bottom:20px; margin-right:15px;" >
                            <div class="col-sm" ></div>
                            <button class="col-sm-1 btn btn-outline-success" href="{{ url('/export-csv') }}" style="margin-right: 10px;font-size:10px;">
                                  Export in CSV
                               </button>
                               {{-- <div class="col-sm-1"></div> --}}
                               <a class="col-sm-1 btn btn-outline-primary" style="margin-right: -15px;font-size:10px;padding-right:5px;"
                               href="{{ url('export-excel') }}">
                                  Export in XLSX
                            </a>
                              {{-- <div class="col-sm-3"></div> --}}
                            </div>

                        <table class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                    {{--                <th>Username</th>--}}
                                    <th>Phone No</th>
                    {{--                <th>DOB</th>--}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    </body>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
                    <script type="text/javascript">
                      $(function () {

                        var table = $('.yajra-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('employees.list') }}",
                            columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'name', name: 'name'},
                                {data: 'email', name: 'email'},
                                // {data: 'username', name: 'username'},
                                {data: 'mobile', name: 'phone'},
                                // {data: 'dob', name: 'dob'},
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: true,
                                    searchable: true
                                },
                            ]
                        });

                      });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <ul id="employeeError">

                        </ul>
                    </div>
                    <form id="employeeForm" name="employeeForm" class="form-horizontal">
                       <input type="hidden" name="employee_id" id="employee_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                            </div>
                        </div>
           
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" id="email" name="email" required="" placeholder="Enter Email" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile Number</label>
                            <div class="col-sm-12">
                                <input type="tel" id="mobile" name="mobile" required="" placeholder="Enter Mobile Number" class="form-control"/>
                            </div>
                        </div>
            
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="saveBtn" value="Edit Changes">Save changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
          
    </body>
    <script>
        $(function () {
          
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
        function deleteEmployee(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({url: "/employee/"+id, type:delete, success: function(result){
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }});
                }
                })
    
        }

        $('.editEmployee').click(function () {
            $('#saveBtn').val("Save Details");
            $('#employee_id').val('');
            $('#employeeForm').trigger("reset");
            $('#modelHeading').html("Edit Employee Details");
            $('#ajaxModel').modal('show');
        });
          

        $('body').on('click', '.editEmployee', function () {
          var employee_id = $(this).data('id');
          $.get("employee" +'/' + employee_id +'/edit', function (data) {
              $('#modelHeading').html("Edit Employee");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#employee_id').val(data.id);
              $('#name').val(data.name);
              $('#email').val(data.email);
              $('#mobile').val(data.mobile);
          })
        });
        $('#saveBtn').click(function (e) {
        e.preventDefault();
        var employee_id = $('#employee_id').val();

        $.ajax({
          data: $('#employeeForm').serialize(),
          url: "employee/"+employee_id + "/update",
          type: "POST",
          dataType: 'json',
          success: function (data) {
       
              $('#employeeForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
           
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    });
      </script>    
</x-app-layout>
