<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link rel="stylesheet"
        href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="/public/library/mdbootstrap/css/mdb.min.css"/>
<script src="{{ asset('/public/library/mdbootstrap/js/mdb.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/public/library/sweetalert2/dist/sweetalert2.min.js') }}"/>
<script src="{{ asset('/public/library/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
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

</script>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <table id="employees_list" class="display">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee</th>
                                    <th>Mobile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Row 1 Data 1</td>
                                    <td>Row 1 Data 2</td>
                                    <td>Row 1 Data 3</td>
                                </tr>
                                <tr>
                                    <td>Row 2 Data 1</td>
                                    <td>Row 2 Data 2</td>
                                    <td>Row 2 Data 3</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
