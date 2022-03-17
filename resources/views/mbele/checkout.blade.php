@extends('mbele.app')
@section('title') CHECKOUT | PAGE | TOPWEAR @endsection
@section('content')
<!-- Update Product Modal -->
<div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog modal-lg" id="print-details">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-center">TOPWEAR RECEIPT DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        </div>
        <div class="modal-body">
            <div class="row mx-auto">
            <h1 class="text-center"> Payments Details </h1>

            <div class="col-xl-12 col-md-12 col-sm-12">
             <table class="table table-responsive table-stripped">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Phone Number</th>
                         <th>Mpesa Transaction Code</th>
                         <th>Amount Paid</th>
                         <th>Date</th>
                     </tr>
                 </thead>
                 <tbody id ="user-payment-details">

                 </tbody>
            </table>
            </div>
            </div>
            <div class="row mx-auto">
                <h1 class="text-center"> Products Purchased </h1>
            <div class="col-xl-12 col-md-12 col-sm-12">
             <table class="table table-responsive table-stripped">
                 <thead>
                     <tr>
                         <th>Product Name</th>
                         <th>Unit Price</th>
                         <th>Quantity</th>
                         <th>Total</th>
                         <th>Date</th>
                     </tr>
                 </thead>
                 <tbody id ="receipt-product-details">

                 </tbody>
                 <tfoot>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th id="tfoot_total"></th>
                 </tfoot>
            </table>
            </div>
            </div>
             
        </div>
        <div class="modal-footer md-button">
        <button class="btn btn-success pull-left" id="print-button"><i class="fa fa-print"></i>Print</button>
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
        
        </div>
        </div>
        </div>
        </div>
<!-- End Modal -->
<section class="inner-banner pattern-3">
        <div class="container text-center">
            <h2>Checkout Page</h2>
           
        </div>
    </section>
    <section class="bread-cumb">
        <div class="container text-center">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><span>Checkout Page</span></li>
            </ul>
        </div>
    </section>
    <!--Checkoout Section-->
    <section class="checkout-section section-padding cart-section">
        <div class="container">
            <div class="row clearfix">
                <!--Form Column-->
                <div class="col-md-12 col-sm-12 col-xs-12 column form-column">
                    <div class="section-title text-left">
                        <!-- <h1><span>Billing Address</span></h1> -->
                    </div>
                    <div class="default-form billing-info-form">
                        <!-- <form method="post" action="#">
                            <div class="row clearfix">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Country*</div>
                                    <input type="text" name="country" value="">
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address*</div>
                                    <input type="text" name="address-1" value="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="address-2" value="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Town / City *</div>
                                    <input type="text" name="town-city" value="">
                                </div>
                            </div>
                        </form> -->
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                   
                </div>
            </div>
            <div class="row clearfix bottom">
                <!--Default Column-->
                <div class="col-md-6 col-sm-12 col-xs-12 column default-column">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th class="prod-column">PRODUCT</th>
                                    <th>&nbsp;</th>
                                    <th>QUANTITY</th>
                                    <th class="price">Price</th>
                                    <th class="price">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="cart_products">
                               
                               
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Default Column-->


                <div class="col-md-6 col-sm-12 col-xs-12 column default-column cart-total">
                    <div class="section-title text-left">
                        <h1><span>Cart Totals</span></h1>
                    </div>
                    <!--Totals Table-->
                    <ul class="totals-table">
                        <input type="hidden" name="input_total" id="input_total">
                        <li class="clearfix"><span class="col col-title">Order Total</span><span class="col" id="order_total"></span></li>
                    </ul>
                    <!--Payment Options-->
                    <div class="payment-options">
                        <div class="option-block">
                            <!-- <div class="radio-block active">
                                <div class="icon clearfix">
                                    <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                </div>
                                <label class="radio-label">CASH/MPESA</label>
                                <select name="mode_payment" id="mode_payment" class="form-control">
                                    <option value="CASH">CASH</option>
                                    <option value="MPESA">MPESA</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="text">
                            <p>Make your payment either through MPESA.</p>
                        </div>
                        <div class="option-block">
                            <div class="radio-block">
                                <div class="icon clearfix">
                                    <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                </div>
                                <form  method="post" id="mpesaForm">
                        <label for="phone_no">Enter Your Phone Number</label>
                        <input type="text" name="phone_number" id="phone_no_pay">

                        <button  id="pay-via-mpesa" class="thm-btn thm-blue-bg">PAY VIA MPESA</button>
                    </form>

                            </div>
                        </div>
                      
                        <div class="option-block">
                           
                        </div>
                    </div>
                    <!-- <div class="margin-top-40 text-right">
                        <button type="submit" id="place_order" class="thm-btn thm-blue-bg">PAY VIA MPESA</button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <section id="user-purchases">
    <div class="container">
    <div class="section-title text-center">
                        <h1><span>Purchase History</span></h1>
                    </div>
                    <div class="row">
    <div class="col-xl-4 col-lg-4 col-sm-4">
        <div class="form-group">
            <label for="category_select">Select Category</label>
            <select name="category_select" class="form-control" id="category_select">
                <option value="">Select Category</option>
            </select>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-4">
        <div class="form-group">
            <label for="price_search">Enter Price</label>
           <input type="number" class="form-control" name="price_search" id="price_search">
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-4">
<div class="form-group mb-0">
<label>Select date range.</label>
    <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
</div>
    </div>
</div>
<div class="row layout-top-spacing">

<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <table id="products-orders-table" class="table table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Order No</th>
                    <th>Date Ordered</th>
                </tr>
            </thead>
            <tbody>
       
            </tbody>
        </table>
    </div>
</div>

</div>

    </section>

    <!-- User Payments History -->
    <section id="user-payments">
    <div class="container">
    <div class="section-title text-center">
                        <h1><span>Payments History</span></h1>
                    </div>




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
            <th>Payment Purpose</th>
            <th>Date Ordered</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</div>
</div>

</div>

    </section>
    <!-- End -->
@endsection
@push('child-scripts')

<script>

  //User Purcahase History
  function purchaseHistory()
        {
            $('#products-orders-table').DataTable().destroy();

            let user_ordered = $('#user_logged').val();
           if(user_ordered !=="")
           {
            let category =$('#category_select').val();
           let price = $('#price_search').val();
           let date_range = $('#rangeCalendarFlatpickr').val();
  $('#products-orders-table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{ route("userOrders")}}',
data: {user_ordered:user_ordered,category_select:category,price_search:price,date_range:date_range},
},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'product_name',name:'product_name'},
{data:'category_name',name:'category_name'},
{data:'order_quantity',name:'order_quantity'},
{data:'product_price',name:'product_price'},
{data:'orderdetails_total',name:'orderdetails_total'},
{data:'order_id',name:'order_id'},
{data:'created_at',name:'created_at'},

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
           }

 //End
        }
  //  alert("You Are Good To Go");
var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
    mode: "range"
});

let date_range = $('#rangeCalendarFlatpickr').val();

$(document).ready(function(){

    //Print Receipt
    $(document).on('click','#print-button',function(e){
        e.preventDefault();
        const printContents = document.getElementById('print-details').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            $('#zoomupModal').modal('hide');

    })

    //Load Receipt Details
    $(document).on('click','.print_receipt',function(){
        let id = $(this).attr('id');
       $.ajax({
           url:"{{route('getUserReceipt')}}",
           method:"POST",
           data:{id:id},
           success:function(data)
           {
            //    alert(data.trans);
            //    alert(data.products);
               let trans_details = '';
               $.each(data.trans,function(index,element){
                  trans_details +=`<tr><td>`+element.first_name+`</td><td>`+element.phone_number+`</td><td>`+element.mpesa_receipt_number+`</td><td>`+element.amount_paid+`</td><td>`+element.created_at+`</td></tr>`;
               })
               $('#user-payment-details').html(trans_details);

               let product_details = '';
               let total_payments= 0
               $.each(data.products,function(index,element){
                product_details +=`<tr><td>`+element.product_name+`</td><td>`+element.product_price+`</td><td>`+element.order_quantity+`</td><td>`+element.orderdetails_total+`</td><td>`+element.created_at+`</td></tr>`;

                   total_payments = total_payments + element.orderdetails_total;
               });
               $('#receipt-product-details').html(product_details);
               $('#tfoot_total').html(total_payments);
              
           }
       })
       $('#zoomupModal').modal('show');
    })
    //Load Purchase History
    purchaseHistory()
    $(document).on('change','#rangeCalendarFlatpickr',function(){
        let date_r = $(this).val();
        if(date_r.length>10)
        
       purchaseHistory();
    });

//  Select Category
$(document).on('change','#category_select',function(){
    //alert('You Are Good To Go');
    let category =$('#category_select').val();
    let price = $('#price_search').val();
    purchaseHistory();
});

//Search Price
$(document).on('keyup','#price_search',function(){
    
    let category =$('#category_select').val();
    let price = $('#price_search').val();
    purchaseHistory();
})
   
})

    </script>
@endpush
