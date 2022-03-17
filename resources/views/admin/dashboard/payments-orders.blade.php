@extends('admin.app')
@section('title') Payments @endsection
@section('content')
       <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">


                <div class="row layout-top-spacing">
                
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <table id="payments-orders-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Gender</th>
                                    <th>Total Amount</th>
                                    <th>Order No</th>
                                    <th>Mode Of Payment</th>
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