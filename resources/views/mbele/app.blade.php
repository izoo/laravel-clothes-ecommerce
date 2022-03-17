<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TOPWEAR | CLOTHES </title>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <link rel="manifest" href="img/favicon-icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon-icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

    
    
    <!-- customizer plate css -->
    <link rel="stylesheet" href="{{asset('frontend/customizer/css/style.css')}}" />
    <!-- Color css -->
    <link rel="stylesheet" id="jssDefault" href="{{asset('frontend/skins/color-files/css/color1.css')}}">
    
	<!-- Sweet Alert CSS -->
    <link href="{{ asset('backend/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <!-- <link href="{{asset('backend/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css"> -->

   
       
</head>


<body>
    @include('mbele.partials.header')
    @yield('content')
    @include('mbele.partials.footer')
   
    <input type="hidden" name="sub_cat" id="sub_cat" >
    <input type="hidden" name="cat" id="cat">
    <input type="hidden" name="user_logged" id="user_logged" value="{{ auth()->id() }}">
  
    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <!-- jQuery js -->
    <script src="{{asset('frontend/assets/jquery-1.12.4.min.js')}}"></script>
    <!-- Custom Jquery -->
    <!-- @stack('child-scripts') -->
    <script>
     //Load Products 
        function loadProducts(sub_cat,cat,start,end)
        {
             sub_cat = $('#sub_cat').val();
             cat = $('#cat').val();
             start = start;
            end = end;
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            url:"{{route('users_products')}}",
            type:"POST",
            data:{sub_cat:sub_cat,cat:cat,start:start,end:end},
            dataType:'json',
            success:function(data)
            {
             var inner_div = '';
            //  alert(data);
            //  alert(Object.keys(data).length);
             if(Object.keys(data).length > 0)
             {
                $.each(data,function(index,element){
                 //alert(element.product_name);
                 var path = 'storage/pichas/' + element.product_image;
                 var price = element.product_price;
                 //alert(element.category_name);
                 inner_div +=`<div class="col-md-4 col-sm-6 mix">` +
                    `<div class="single-product-item text-center">` +
                        `<div class="img-holder">` +
                            `<img alt="` + element.product_name + `" src="{{ asset('` + path + `')}}">` +
                            `<div class="overlay">` +
                        `<div class="icon-holder">` +
                          
                            `<ul>` +
                            `<li><input type="hidden" value="` + path + `" class="cart_path"></li>` +
                            `<li><input type="hidden" value="` + price + `" class="cart_price"></li>` +
                            `<li><input type="hidden" value="` + element.product_name + `" class="cart_name"></li>` +
                            `<li><input type="number" id="cart_quantity" style="max-width:50px;" value="1" class="cart_quantity"></i></a></li>` +
                                `<li><a href="#" id="` + element.id + `" class="add_to_cart"><i class="fa fa-shopping-cart"></i></a></li>` +
                           ` </ul>` +
                           
                        `</div>` +
                    
                    `</div>` +
                            `</div>` +
                      
                                          
                       ` <div class="title">` +
                            `<a href="#"><h3> ` + element.product_name + ` </h3></a>` +
                            `<h2>Kshs ` + price.toLocaleString()  + `</h2>` +
                       ` </div>` +
                    
                    `</div>` +
              
                `</div>`;
              
             });
             }
             else
             {
                 inner_div  +='No Products Uploaded Yet,Uploading Soon';
             }

        
             $('#all_products').append(inner_div);
             $('.mix').fadeIn();
            // $('.to').addClass("mix");


            }
            });
            //End
        }

        // Load Cart Details
        let products = JSON.parse(localStorage.getItem('products')) || [];

        function loadCart()
       {
        //Add Products To Cart

        let prods = JSON.stringify(products);

       // alert(prods);

                localStorage.setItem('products',prods);
                prods = localStorage.getItem('products');
                prods = JSON.parse(prods);
        $('.cart-item').text(prods.length);
                if(prods.length>0)
                {
                    let cart_div ='<ul class="header-cart-box">';
                    let all_total = 0;
                    $.each(prods,function(index,element){

                        cart_div += `<li>` +
                                            `<div class="img-box">` +
                                               ` <img src="`+ element.path +`" alt="Awesome Image" />` +
                                            `</div>` +
                                            `<div class="text-box">` +
                                               ` <a href="#"><h3>` + element.name + `</h3></a>` +
                                                `<span class="price">` + element.price + ` X ` + element.quantity + ` </span> = ` +
                                                `<span class="price"> &nbsp` + element.total + `</span>` +
                                                
                                                `<a href="#" id=`+ element.id +` class="remove-box"><i class="fa fa-times-circle"></i></a>` +
                                          `  </div>` +
                                        `</li>`;

                        all_total +=element.total;

                    });
                    cart_div +=` <li class="clearfix cart-bottom">`+
                                            `<div class="total-text pull-left">` +
                                                `<span>Total - Kshs ` + all_total + `</span>` +
                                           ` </div>` +
                                            `<div class="checkout-btn pull-right">` +
                                                `<a href="{{ route('user.checkout') }}" class="flip-flop-btn"><span data-hover="Checkout">Checkout<i class="fa fa-caret-right"></i></span></a>` +
                                            `</div>` +
                                        `</li>`;

                $('#cart_details').html(cart_div);
                }
                else
                {
                    cart_div = `<li><div class="text-box"><span>----------- No Items Added ------------ </span></div></li>`;
                  $('#cart_details').html(cart_div);
                
                }
       }
             //Fetch  Categories List
    function Categories() {
            $.ajax({
                url: "{{route('allCategories')}}",
                method: "GET",
                dataType: "json",
                success: function (data) {
                    //alert(data);

                    $.each(data, function (index, val) {

                        $('#category_select').append('<option value=' + val.id + '>' + val.category_name + '</option>');
                    });
                }
            })
        }


      
        
        //End

        function CheckOut()
        {
            //Load Checkout Cart Details

            let product_cart_details = JSON.parse(localStorage.getItem('products'));
            let cart_details = "";
            let order_total = 0;
            $.each(product_cart_details,function(index,val){

                if(product_cart_details.length > 0)
                {
                   order_total += val.total;
                    cart_details += `<tr><td colspan="2" class="prod-column">` +
                                        `<div class="column-box">` +
                                            `<figure class="prod-thumb">` +
                                                `<a href="#"><img style="max-width:70px;max-height:70px;" src="`+ val.path +`" alt=""></a>` +
                                            `</figure>` +
                                            `<h3 class="prod-title padd-top-20">` + val.name +`</h3>` +
                                        `</div>` +
                                    `</td>` +
                                    `<td class="qty">` +
                                        `<input class="quantity-spinner" type="text" value="`+ val.quantity+`" name="quantity" readonly>` +
                                   ` </td>`+
                                    `<td class="price">Kshs `+ val.price.toLocaleString() +`</td>` +
                                    `<td class="price">Kshs `+ val.total.toLocaleString() +`</td>` +
                                `</tr>`;

                }
                else
                {
                    cart_details +=`<tr><td colspan="3">No Products On The Cart </td></tr>`;
                }

            })
            $('#order_total').text('Kshs '  + order_total.toLocaleString());
            $('#input_total').val(order_total);
            $('#cart_products').html(cart_details);

        }
        function sumWallet()
        {
            let user_id = $('#user_logged').val();

            $.ajax({
                url:"{{route('walletSum')}}",
                method:"POST",
                data:{user_id:user_id},
                success:function(data)
                {
                 
                 $('#current_amount').text(data);

                
                  
                }
            })
        }

        $(document).ready(function(){
           // $(.mix).css("display","block");
           //Fetch Products 
          loadProducts();
          //Load Cart
          loadCart();
          //Load Categories
          Categories();
          //Load Wallet Amount
         setTimeout(sumWallet,3000);
      
         //alert(Math.floor(1000 + Math.random() * 9000));
            // Load Subcategories
            $.ajax({
                url: "{{route('allSubcategories')}}",
                method: "GET",
                dataType: "json",
                success: function (data) {
                    //alert(data);
                  //  alert("You Are Good To Go");

                    $.each(data, function (index, val) {
                       // alert(index);

                        $('#subcategories').append('<li><a href="#" class="user_subcategory" id='+ val.id +'>' + val.subcategory_name + '<span>(02)</span></a></li>');
                    });
                }
            })
        
            //Populate Products On Select  Subcategory
            $(document).on('click','.user_subcategory',function(e){
                e.preventDefault();
                let sub_id = $(this).attr('id');
                //alert(sub_id);
                $('#all_products').html(" ");
                $('#sub_cat').val(sub_id);
                let subcat = $('#sub_cat').val();
                //alert(subcat);
                loadProducts();
            });
            //Populate Products On Select Category 
            $(document).on('click','.user_category',function(e){
                e.preventDefault();
                let cat_id = $(this).attr('id');
                $('#all_products').html(" ");
            $('#cat').val(cat_id);
             cat = $('#cat').val();
             subcat = $('#sub_cat').val();
                loadProducts();
            })
            
            $(document).on('click','.user_category2',function(e){
                e.preventDefault();
                let cat_id = $(this).attr('id');
                //alert(cat_id);
                $('#all_products').html(" ");
            $('#cat').val(cat_id);
             cat = $('#cat').val();
             subcat = $('#sub_cat').val();
                loadProducts();
            })

            //Populate Products On Filter By Price

            $('#filter-by-price').click(function(e){
                e.preventDefault();
                 cat = $('#cat').val();
                 subcat = $('#sub_cat').val();
                 $('#all_products').html(" ");
                let start_price = $('#min-value-rangeslider').val();
                let end_price = $('#max-value-rangeslider').val();
                loadProducts(cat,subcat,start_price,end_price);
            })

            //Add Item To Cart

            $(document).on('click','.add_to_cart',function(e){
                e.preventDefault();
                let id = $(this).attr("id");
                let quantity = $(this).closest("ul").find(".cart_quantity").val();
                let price = $(this).closest("ul").find(".cart_price").val();
                let path = $(this).closest("ul").find(".cart_path").val();
                let total_price = parseInt(price) * parseInt(quantity);
                let name = $(this).closest("ul").find(".cart_name").val();
                products = localStorage.getItem('products') || [];
                
                products = JSON.parse(products);

                var item = products.find(item => item.id === id)
                if(item)
                {
                    item.quantity = parseInt(item.quantity) + parseInt(quantity);
                    item.total = parseInt(item.quantity) * parseInt(price);

                    alert("Product Added To Cart");
                    
                }
                else
                {
                    products.push({'id':id,'quantity':quantity,'price':price,'path':path,'name':name,'total':total_price});
                    alert("Product Added To Cart");
                }
                
                loadCart();

            })

            //Checkout View
            CheckOut();
            

            //Remove Item From Cart

            $(document).on('click','.remove-box',function(e){
                e.preventDefault();
                let id = $(this).attr('id');
              // alert(id);
                let product = localStorage.getItem('products');
                product = JSON.parse(product);
                let updatedProducts = product.filter(item => item.id !=id);
                products = updatedProducts;

                $('#cart_details').html(" ");

                loadCart();

            })


            

            //Change Mode Of Payment
            $(document).on('change','#mode_payment',function(){
                let value = $(this).val();
                if(value == "MPESA")
                {
                    $('#mpesa_div').fadeIn('slow');
                }
                else
                {
                    $('#mpesa_div').fadeOut('slow');
                }
                
            })

            /** Intiate MPESA STK PUSH */

            $(document).on('click','#top-up-mpesa',function(e){
                e.preventDefault();
               // alert("You Are Good To Go");
                let amount= $('#top_up_amount').val();
                let phone_no = $('#phone_number').val();
                let payment_for = "Wallet";
                let logged = $('#user_logged').val();
                
                // alert(phone_no);
                $.ajax({
                    url:"{{url('api/v1/access/token')}}",
                    method:"POST",
                    beforeSend:function()
                    {
                        $('#top-up-mpesa').val("INITIATING MPESA");
                    },
                    success : function(response)
                    {
                      
                        $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
                       $.ajax({
                           url:"{{url('api/v1/token/stk/push')}}",
                           method:"POST",
                           data:{amount:amount,phone_no:phone_no,payment_for:payment_for,logged:logged},
                           success:function(res)
                           {
                            swal({
                            title: 'Success!',
                            text: "MPESA SUCCESSFULLY INITIATED,CONFIRM PAYMENT ON YOUR PHONE",
                            type: 'success',
                            padding: '2em'
                            });

                            // $('#current_amount').html('<i class="fa fa-2x fa-spin"></i>');

                          
                           
                           

                           }
                       })
                    }
                })
            })

            /** END PUSH */

  
            /**Place Order */

            $(document).on('click','#place_order',function(e){
                e.preventDefault();
                let mode_payment = $('#mode_payment').val();
                let order_products = JSON.parse(localStorage.getItem('products'));
                let mpesa_no = $('#mpesa_no').val();
                let all_total = $('#input_total').val();
                $.ajax({
                    url:"{{route('save-order')}}",
                    method:"POST",
                    data:{mode_payment:mode_payment,order_products:order_products,order_amount:all_total,
                        mpesa_no:mpesa_no},
                        beforeSend:function()
            {
                $('#place_order').html('Placing Order......');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.order_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#user_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "ORDER SUCCESSFULLY PLACED,WILL GET IN TOUCH SOON",
                    type: 'success',
                    padding: '2em'
                    });
                    // $('#products_table').DataTable().ajax.reload();
                    cleared_products = [];
                    producs = JSON.stringify(cleared_products);
                localStorage.setItem('products',producs);
                loadCart();

                $('#cart_products').html('<tr><td colspan="3">No Products On The Cart </td></tr>');
                   
                    $("#place_order").html('PLACE ORDER');

                    // table.ajax.reload();
                }
                else
                {
                    $("#order_errors").fadeIn(1000,function(){
                        printErrorMsg(response.order_errors,'order_errors');
                        $("#place_order").html('PLACE ORDER');
                    });
                }
            }
                })

            });



 

   //Mpesa Transactions List
   let user = $('#user_logged').val();
   $('#transactions-mpesa-table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("usermpesaTransactions")}}',
data: {user:user},

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'order_no',name:'order_no'},
{data:'amount_paid',name:'amount_paid'},
{data:'phone_number',name:'phone_number'},
{data:'mpesa_receipt_number',name:'mpesa_receipt_number'},
{data:'first_name',name:'first_name'},
{data:'payment_for',name:'payment_for'},
{data:'created_at',name:'created_at'},
{data:'action',name:'action'},

],  

buttons: {
buttons: [
{ extend: 'copy', className: 'btn btn-sm'},
{ extend: 'pdf', className: 'btn btn-sm'},
{ extend: 'excel', className: 'btn btn-sm'},
{ extend: 'print', className: 'btn btn-sm'}
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

 //End

            //End
            // Load All Categories

            $.ajax({
                url: "{{route('allCategories')}}",
                method: "GET",
                dataType: "json",
                success: function (data) {
                    //alert(data);
                    let dynamics = [];
                    let dynamic_class =[];

                    $.each(data, function (index, val) {

                        let class_category = '.' + val.category_name.toLowerCase() + '"';
                        dynamics.push(class_category);
                        dynamic_class.push(val.category_name.toLowerCase());

                        $('#categories').append('<li><a href="#" class="user_category" id='+ val.id +'>' + val.category_name + '<span>(02)</span></a></li>');
                        $('#home_category_links').append('<li class="filter user_category2" id='+ val.id +'><span>'+val.category_name+'</span></li>');

                    });
                     let i = 0;
                    $('ul.gallery-filter li').each(function(){
                        $(this).attr('data-filter',dynamics[i]);
                        i++
                    })
                    let y = 0;
                    $('.all_products .mix').each(function() {
                        //alert(dynamic_class[y]);
                        $(this).addClass(dynamic_class[y]);
                        y++;

                        });
                    

                }
            })


        // Load 



 // Initiate MPESA
 $('#pay-via-mpesa').on('click',(function(e){
       // alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    url:"{{url('api/v1/access/token')}}",
                    method:"POST",
                    beforeSend:function()
                    {
                        $('#pay-via-mpesa').val("INITIATING MPESA");
                    },
                    success : function(response)
                    {
                        let phone_no_pay =$('#phone_no_pay').val();
                        // let amount_pay = $('#input_total').val();
                        let amount_pay = 1;
                        let logged = $('#user_logged').val();
                        let order_no = Math.floor(1000 + Math.random() * 9000);
                        $.ajax({
                            url:"{{ route('v1/token/stk/push') }}",
                            type:"POST",
                            data:{phone_no_pay:phone_no_pay,amount_pay:amount_pay,logged:logged,order_no:order_no},
                            success : function(response)
                            {
                                $('#pay-via-mpesa').val("PAY VIA MPESA");
                                swal({
                            title: 'Success!',
                            text: "MPESA SUCCESSFULLY INITIATED,CONFIRM PAYMENT ON YOUR PHONE",
                            type: 'success',
                            padding: '2em'
                            });
                            let mode_payment = "MPESA";
                let order_products = JSON.parse(localStorage.getItem('products'));
                let mpesa_no = $('#mpesa_no').val();
                let all_total = $('#input_total').val();
                $.ajax({
                    url:"{{route('save-order')}}",
                    method:"POST",
                    data:{mode_payment:mode_payment,order_products:order_products,order_amount:all_total,logged:logged,
                        order_no:order_no},
                        beforeSend:function()
            {
                $('#place_order').html('Placing Order......');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.order_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#user_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "ORDER SUCCESSFULLY PLACED,WILL GET IN TOUCH SOON",
                    type: 'success',
                    padding: '2em'
                    });
                    // $('#products_table').DataTable().ajax.reload();
                    cleared_products = [];
                    produs = JSON.stringify(cleared_products);
                    localStorage.setItem('products',produs);
                    products = JSON.parse(localStorage.getItem('products')) || [];
                    loadCart();
                    CheckOut();

                // $('#cart_products').html('<tr><td colspan="3">No Products On The Cart </td></tr>');
                   
                    $("#place_order").html('PLACE ORDER');

                    // table.ajax.reload();
                }
                else
                {
                    $("#order_errors").fadeIn(1000,function(){
                        printErrorMsg(response.order_errors,'order_errors');
                        $("#place_order").html('PLACE ORDER');
                    });
                }
            }
                })

                            

                            }
                        });
                    }
                });
        
       }));
            //End


 // Register New User
 $('#registerForm').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{ route('register_user') }}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
                $('#btnUser').html('Creating Account');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.user_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#user_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "Account Successfully Created!",
                    type: 'success',
                    padding: '2em'
                    });
                    // $('#products_table').DataTable().ajax.reload();
        
                   $('#registerForm').trigger("reset");
                   
                    $("#btnUser").html('ADD');

                    // table.ajax.reload();
                }
                else
                {
                    $("#user_errors").fadeIn(1000,function(){
                        printErrorMsg(response.user_errors,'user_errors');
                        $("#btnUser").html('REGISTER');
                    });
                }
            }
        });
        
       }));
            //End


// Add New Product
$('#feedbackForm').on('submit',(function(e){
   // alert("You Are Good To Go");
    e.preventDefault();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:"{{ url('sendFeedback') }}",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
        $('#buttonFeedback').html('Sending Your Feedback');
        },
        success : function(response)
        {
            if($.isEmptyObject(response.feedback_errors))
            {
                //$('#myModal').modal('toggle');
                $("#feedback_errors").fadeOut(1000,function(){


                });

                swal({
                title: 'Success!',
                text: "Feedback/Message Successfully Submitted,Will Soon Get To You!",
                type: 'success',
                padding: '2em'
                });
                // $('#products_table').DataTable().ajax.reload();

                $('#feedbackForm').trigger("reset");

                $("#buttonFeedback").html('SUBMIT');

                // table.ajax.reload();
            }
            else
            {
                $("#feedback_errors").fadeIn(1000,function(){
                printErrorMsg(response.feedback_errors,'feedback_errors');
                $("#buttonFeedback").html('SUBMIT');
                });
            }
        }
    });

    

}));
//End



        });
//Print Errors
function printErrorMsg(msg,div)
{
    //  alert('#' + div);
    $("#" + div).find("ul").html('');
    $("#" + div).css('display','block');
    $.each(msg,function(key,value){
    $("#" + div).find('ul').append('<li>' + value + '</li>');
    });
}
      
    </script>
    <!-- bootstrap js -->
    <script src="{{asset('frontend/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jQuery ui js -->
    <script src="{{asset('frontend/assets/jquery-ui-1.11.4/jquery-ui.js')}}"></script>
    <!-- owl carousel js -->
    <script src="{{asset('frontend/assets/owl.carousel-2/owl.carousel.min.js')}}"></script>
    <!-- jQuery validation -->
    <script src="{{asset('frontend/assets/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <!-- gmap.js helper -->
    <script src="http://maps.google.com/maps/api/js"></script>
    <!-- gmap.js -->
    <script src="{{asset('frontend/assets/gmap.js')}}"></script>
    <!-- mixit up -->
    <script src="{{asset('frontend/assets/jquery.mixitup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/jquery.fitvids.js')}}"></script>
    <!-- revolution slider js -->
    <script src="{{asset('frontend/assets/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('frontend/assets/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <!-- fancy box -->
    <script src="{{asset('frontend/assets/fancyapps-fancyBox/source/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('frontend/assets/Polyglot-Language-Switcher-master/js/jquery.polyglot.language.switcher.js')}}"></script>
    <script src="{{asset('frontend/assets/nouislider/nouislider.js')}}"></script>
    <script src="{{asset('frontend/assets/bootstrap-touch-spin/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('frontend/assets/jquery-appear/jquery.appear.js')}}"></script>
    <script src="{{asset('frontend/assets/jquery.countTo.js')}}"></script>
    <script src="{{asset('frontend/assets/menuzord/js/menuzord.js')}}"></script>
    <script src="{{asset('frontend/assets/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/jquery.isotope.js')}}"></script>
    <!-- waypoints js -->
    <script src="{{asset('frontend/assets/waypoint.js')}}"></script>
    <!-- theme custom js  -->
    <script src="{{asset('frontend/js/default-map.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js"></script>
    <script src="{{asset('frontend/customizer/plugins/jQuery.style.switcher.min.js')}}"></script>
    <script src="{{asset('frontend/customizer/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('frontend/customizer/js/customizer.js')}}"></script>
    

    <!-- SweetAlert JS -->
    <script src="{{ asset('backend/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <!-- <script src="{{ asset('backend/plugins/sweetalerts/custom-sweetalert.js')}}"></script> -->
    <script src="{{ asset('backend/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END THEME GLOBAL STYLE --> 

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('backend/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.62/vfs_fonts.js" integrity="sha256-UsYCHdwExTu9cZB+QgcOkNzUCTweXr5cNfRlAAtIlPY=" crossorigin="anonymous"></script>
    
<script src="{{asset('backend/plugins/flatpickr/flatpickr.js')}}"></script>
<!-- <script src="{{asset('backend/plugins/flatpickr/custom-flatpickr.js')}}"></script> -->

@stack('child-scripts')
@stack('header-scripts')
    
</body>


</html>
