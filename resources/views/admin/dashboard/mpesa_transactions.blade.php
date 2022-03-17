@extends('admin.app')
@section('title') Purchases @endsection
@section('content')
       <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">


                <div class="row layout-top-spacing">
                
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <table id="transactions-mpesa-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Amount Paid</th>
                                    <th>Phone No</th>
                                    <th>MPESA Transaction Code </th>
                                    <th>Customer Name</th>
                                    <th>Date Ordered</th>
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