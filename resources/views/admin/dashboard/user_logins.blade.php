@extends('admin.app')
@section('title') Categories List @endsection
@section('content')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
            <div class="container">
                <div class="container">


                <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="clearfix"></div>
               
                    <div class="widget-content widget-content-area br-6">
                   <div class="row">
                       <div class="col-sm-8 col-md-8 col-lg-8">

                       </div>
                      
                   </div>
                        <table id="userLoginsTable" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer First Name</th>
                                    <th>Customer Last Name</th>
                                    <th>Time Logged In</th>
                                    <th>Time Logged Out</th>
                                    <th>IP Address</th>
                                    
                                    
                                  
                                </tr>
                            </thead>
                            <tbody>
                       
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

                 
                    
                </div>
            </div>
           @include('admin.partials.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

@endsection

@push('user-logins')
<script>
$(document).ready(function(){
          //Users List
  $('#userLoginsTable').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("users_logins")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'first_name',name:'first_name'},
{data:'last_name',name:'last_name'},
{data:'login_time',name:'login_time'},
{data:'logout_time',name:'logout_time'},
{data:'user_ip',name:'user_ip'}
],  

buttons: {
buttons: [
{ extend: 'copy', className: 'btn btn-sm' },
{ extend: 'pdf', className: 'btn btn-sm' },
{ extend: 'excel', className: 'btn btn-sm' },
{ extend: 'print', className: 'btn btn-sm' }
]
},
"oLanguage": {
"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
"sInfo": "Showing page _PAGE_ of _PAGES_",
"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
"sSearchPlaceholder": "Search...",
"sLengthMenu": "Results :  _MENU_",
},
"stripeClasses": [],
"lengthMenu": [7, 10, 20, 50],
"pageLength": 7 
} );
})

 //End
    </script>
@endpush