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
                       <div class="col-sm-4 col-md-4 col-lg-4">
                 <button type="button" class="btn btn-dark mb-2 mr-2" data-toggle="modal" data-target="#userModal">NEW USER</button>
                                        
                       </div>
                   </div>
                        <table id="usersTable" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                    
                                  
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