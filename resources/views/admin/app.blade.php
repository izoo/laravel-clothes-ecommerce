<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>TOPWEAR  Admin | DASHBOARD </title>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.ico')}}"/>
    <link href="{{ asset('backend/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/assets/js/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('backend/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

      <!-- BEGIN THEME GLOBAL STYLES -->
      <!-- <link href="{{ asset('backend/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('backend/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/plugins/sweetalerts/promise-polyfill.js')}}"></script>
    <link href="{{ asset('backend/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />

    <!-- END THEME GLOBAL STYLES -->
           
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

</head>
<body>
    <!-- NEW CATEGORY MODAL -->
<div id="faderightModal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form id="categoryForm" method="POST" enctype="multipart/form-data">
                                        <div class="form-row mb-4">
                                        <div id="category_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                                            <ul class="w3-ul" style="list-style:none;">
                                            
                                            </ul>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Category Name</label>
                                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" required="">
                                            </div>
                                       
                                        </div>
                                
                                       
                                      <button type="submit" class="btn btn-primary mt-3">ADD</button>
                                    </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->
       <!-- NEW API User MODAL -->
<div id="apiUserModal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New API User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form id="apiuserForm" method="POST">
            <input type="hidden" name="user_logged" id="user_logged" value="{{ auth()->id() }}">

                                        <div class="form-row mb-4">
                                        <div id="api_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                                            <ul class="w3-ul" style="list-style:none;">
                                            
                                            </ul>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">API User Name</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="APi User Name" required="">
                                            </div>
                                       
                                        </div>
                                
                                       
                                      <button type="submit" id="buttonAPIUSER" class="btn btn-primary mt-3">ADD</button>
                                    </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->
       <!-- NEW API User MODAL -->
       <div id="apiTokenModal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Access Token To User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form id="apiTokenForm" method="POST">
            <input type="hidden" name="hidden_api_user_id" id="hidden_api_user_id" >

                                        <div class="form-row mb-4">
                                        <div id="token_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                                            <ul class="w3-ul" style="list-style:none;">
                                            
                                            </ul>
                                            </div>
                                            <div class="form-group col-md-12">
                                            <label for="">Product</label>
                                            <select id="api_product_id" name="api_product_id" class="form-control" required="">
                                            <option selected>Choose Product</option>
                                            
                                            </select>
                                            </div>
                                       
                                        </div>
                                
                                       
                                      <button type="submit" id="buttonToken" class="btn btn-primary mt-3">ASSIGN</button>
                                    </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->

        <!-- EDIT CATEGORY MODAL -->
<div id="edit_category_modal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form id="formCategoryEdit" method="POST">
            <input type="hidden" name="hidden_category_id" id="hidden_category_id">
            <div class="form-row mb-4">
            <div id="category_errorsu" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                <ul class="w3-ul" style="list-style:none;">
                
                </ul>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Category Name</label>
                    <input type="text" class="form-control" id="category_nameu" name="category_nameu" placeholder="Category Name" required="">
                </div>
            
            </div>
    
            
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->

   <!-- EDIT SUB CATEGORY MODAL -->
   <div id="edit_subcategory_modal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form id="formSubcategoryEdit" method="POST" >
                <input type="hidden" name="hidden_subcategory_id" id="hidden_subcategory_id">
                                        <div class="form-row mb-4">
                                        <div id="category_update_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                                            <ul class="w3-ul" style="list-style:none;">
                                            
                                            </ul>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4"> Sub Category Name</label>
                                                <input type="text" class="form-control" id="subcategory_nameu" name="subcategory_nameu" placeholder="Category Name" required="">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                            <label for="category_id"> Category</label>
                                            <select id="category_idu" name="category_idu" class="form-control" required="">
                                            <option selected>Choose Category</option>
                                            
                                            </select>
                                            </div>
                                        </div>
                                
                                       
                                      <button type="submit" class="btn btn-primary mt-3">UPDATE</button>
                                    </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->

     <!-- NEW USER MODAL -->
   <div id="userModal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
          <div id="user_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                        <ul class="w3-ul" style="list-style:none;">
                        
                        </ul>
                        </div>
                    <form method="POST" id="registerForm">
                    <div class="form-row mb-2">
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                            <label for=""> First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Your First Name*" />
                          
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Your Last Name*" />
                            
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email*" />
                            
                        </div>

                        <!-- form-group -->
                        <div class="form-group col-md-6 col-lg-6 col-sm-6  ">
                        <label for="gender" class="pull-left">Female</label>
                            <input type="radio" name="gender" class="form-control pull-right" id="gender[]" value="FEMALE">
                        </div>
                        <!-- form-group -->
                        <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                        <label for="gender" class="pull-left">Male</label>
                            <input type="radio" name="gender" class="form-control pull-right" id="gender[]" value="MALE">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                          <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                            
                        </div>
                        <!-- /.form-grp -->
                        <div class="col-md-12 col-lg-12 col-sm-12 clearfix submit-box">
                            <div class="pull-left">
                                <button class="btn btn-primary btn-lg" id="btnUser" type="submit">Register</button>
                            </div>
                           
                        </div>
</div>
                        <!-- /.clearfix -->
                    </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->

    <!-- EDIT USER MODAL -->
   <div id="edit_user_modal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
          <div id="edit_user_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                        <ul class="w3-ul" style="list-style:none;">
                        
                        </ul>
                        </div>
                    <form method="POST" id="editUserForm">
                        <input type="hidden" name="hidden_user_id" id="hidden_user_id">
                    <div class="form-row mb-2">
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                            <label for=""> First Name</label>
                            <input type="text" class="form-control" name="edit_first_name" id="edit_first_name" placeholder="Your First Name*" />
                          
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="edit_last_name" id="edit_last_name" placeholder="Your Last Name*" />
                            
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="edit_email" id="edit_email" placeholder="Enter Email*" />
                            
                        </div>

                        <!-- form-group -->
                        <div class="form-group col-md-6 col-lg-6 col-sm-6  ">
                        <label for="gender" class="pull-left">Female</label>
                            <input type="radio" name="edit_gender" class="form-control pull-right" id="edit_gender" value="MALE">
                        </div>
                        <!-- form-group -->
                        <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                        <label for="gender" class="pull-left">Male</label>
                            <input type="radio" name="edit_gender" class="form-control pull-right" id="edit_gender" value="MALE">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                          <label for="">Password</label>
                            <input type="password" name="edit_password" class="form-control" placeholder="Enter Password" />
                            
                        </div>
                        <!-- /.form-grp -->
                        <div class="col-md-12 col-lg-12 col-sm-12 clearfix submit-box">
                            <div class="pull-left">
                                <button class="btn btn-primary btn-lg" id="updateUser" type="submit">Update</button>
                            </div>
                           
                        </div>
</div>
                        <!-- /.clearfix -->
                    </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->

   <!-- NEW SUB CATEGORY MODAL -->
   <div id="subcategoryModal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <form id="subcategoryForm" method="POST" enctype="multipart/form-data">
                                        <div class="form-row mb-4">
                                        <div id="subcategory_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                                            <ul class="w3-ul" style="list-style:none;">
                                            
                                            </ul>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4"> Sub Category Name</label>
                                                <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Category Name" required="">
                                            </div>
                                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                            <label for="category_id"> Category</label>
                                            <select id="category_id" name="category_id" class="form-control" required="">
                                            <option selected>Choose Category</option>
                                            
                                            </select>
                                            </div>
                                        </div>
                                
                                       
                                      <button type="submit" class="btn btn-primary mt-3">ADD</button>
                                    </form>

            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
               
            </div>
        </div>
    </div>
</div> 
    <!-- END -->

<!-- Update Product Modal -->
        <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Update Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
            <div id="product_errorsu" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
            <ul class="w3-ul" style="list-style:none;">

            </ul>
            </div>
            </div>
            </div>
        <form id="formProductEdit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="hidden_product_id" id="hidden_product_id">
            <div class="form-row mb-4">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Product Name</label>
            <input type="text" class="form-control" id="product_nameu" name="product_nameu" placeholder="Product Name" required="">
            </div>
            <div class="form-group col-md-6">
            <label for="product_price">Product Price</label>
            <input type="number" class="form-control" name="product_priceu" id="product_priceu" placeholder="Product Price" required="">
            </div>
            </div>
            <div class="form-row mb-4">
            <div class="form-group col-md-4 col-lg-4 col-sm-12">
            <label for="product_categoryu">Product Category</label>
            <select id="product_categoryu" name="product_categoryu" class="form-control" required="">
            <option selected>Choose  Category</option>
            
            </select>
            </div>
            <div class="form-group col-md-4 col-lg-4 col-sm-12">
            <label for="subcategory_idu">Product Sub Category</label>
            <select id="subcategory_idu" name="subcategory_idu" class="form-control" required="">
            <option selected>Choose Sub Category</option>
            
            </select>
            </div>
            <div class="form-group col-md-4 col-lg-4 col-sm-12">
            <label for="available_quantity">Product Quantity</label>
            <input type="number" class="form-control" name="available_quantityu" id="available_quantityu" placeholder="Product Quantity" required="">
            </div>

            </div>

            <div class="form-row mb-4">

            <div class="form-group col-md-6 col-lg-6 col-sm-12">
            <label for="product_description">Product Description</label>
            <input type="text" class="form-control" name="product_descriptionu" id="product_descriptionu" placeholder="Product Description">
            </div>
            </div>
            <div class="form-row mb-4">
            <div class="form-group col-md-6 col-lg-6 col-sm-12">
            <label for="product_photou">Product Photo</label>
            <input type="file" class="form-control" name="product_photou" id="product_photou">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12" id="img_div">


            </div>
            </div>

            <button type="submit" id="updateProduct" class="btn btn-primary mt-3">UPDATE</button>
            </form>
        </div>
        <div class="modal-footer md-button">
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>CLOSE</button>
        
        </div>
        </div>
        </div>
        </div>
<!-- End Modal -->
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
   @include('admin.partials.header')
  
  

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
       @include('admin.partials.sidebar')
       @yield('content')
      
        
       
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('backend/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('backend/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/app.js')}}"></script>
    <script>

        
        $(document).ready(function() {
            App.init();

            // Fetch Sub Categories
            fetchSubCategories();
            //Fetch Categories
            Categories();
            //Fetch Products
            Products();


 //Fetch Products List

 $('#html5-extension').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("products.index")}}',

},
"columns":[

{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'product_name',name:'product_name'},
{data:'product_price',name:'product_price'},
{data:'available_quantity',name:'available_quantity'},
{data:'category_name',name:'category_name'},
{data:'subcategory_name',name:'subcategory_name'},
{data:'image',name:'image'},
{data:'product_description',name:'product_description'},

{data:'action',name:'action',orderable:false,searchable:false}
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

 //End

 //Fetch Products List

 $('#stock-out-table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("stockOut")}}',

},
"columns":[

{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'product_name',name:'product_name'},
{data:'available_quantity',name:'available_quantity'}
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

 //End

  //API Users List
  $('#api_users_table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("apiusers")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'username',name:'username'},
{data:'key',name:'key'},
{data:'date',name:'date'},
{data:'action',name:'action'}
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

 //End

   //API Users TOKENS List
   $('#token_users_table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("tokens")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'username',name:'username'},
{data:'product_name',name:'product_name'},
{data:'api_token',name:'api_token'},
{data:'expires_on',name:'expires_on'},
{data:'date',name:'date'}
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

 //End

  //Users List
  $('#usersTable').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("users_list")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'first_name',name:'first_name'},
{data:'last_name',name:'last_name'},
{data:'email',name:'email'},
{data:'gender',name:'gender'},
{data:'date',name:'date'},
{data:'action',name:'action'}
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

 //End

 //Categories List
 $('#categoriesTable').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("categories.index")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'category_name',name:'category_name'},
{data:'date',name:'date'},
{data:'action',name:'action'}
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

 //End

  //Sub Categories List
  $('#subcategoriesTable').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("subcategories.index")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'subcategory_name',name:'subcategory_name'},
{data:'category_name',name:'category_name'},
{data:'date',name:'date'},
{data:'action',name:'action'}
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

 //End


  //Orders List
  $('#payments-orders-table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("orders")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'first_name',name:'first_name'},
{data:'email',name:'email'},
{data:'gender',name:'gender'},
{data:'order_amount',name:'order_amount'},
{data:'order_no',name:'order_no'},
{data:'payment_type',name:'payment_type'},
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

 //End

  //Orders List
  $('#products-orders-table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("productOrders")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'product_name',name:'product_name'},
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

 //End

   //Mpesa Transactions List
   $('#transactions-mpesa-table').DataTable( {
"dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
responsive:true,
ajax:
{
url: '{{route("mpesaTransactions")}}',

},
"columns":[
{data:'DT_RowIndex',name: 'DT_RowIndex'},
{data:'order_no',name:'order_no'},
{data:'amount_paid',name:'amount_paid'},
{data:'phone_number',name:'phone_number'},
{data:'mpesa_receipt_number',name:'mpesa_receipt_number'},
{data:'first_name',name:'first_name'},
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

 //End



            // Add New Product
            $('#productForm').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{ route('products.store') }}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
                $('#buttonProduct').html('Adding New Product');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.product_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#product_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "Product Added Successfully!",
                    type: 'success',
                    padding: '2em'
                    });
                    // $('#products_table').DataTable().ajax.reload();
        
                   $('#productForm').trigger("reset");
                   
                    $("#buttonProduct").html('ADD PRODUCT');

                    // table.ajax.reload();
                }
                else
                {
                    $("#product_errors").fadeIn(1000,function(){
                        printErrorMsg(response.product_errors,'product_errors');
                        $("#buttonProduct").html('ADD');
                    });
                }
            }
        });
        
       }));
            //End


        // Edit Product Function
$('body').on('click','.edit_product',function(){
  //  alert("You Are Good To Go");
	var id=$(this).attr('id');
   // alert(id);
	$.get("{{route('products.index')}}" +'/' + id+'/edit',function(data)
	{
    
     var path = 'storage/pichas/' + data.product_image;
	 $('#hidden_product_id').val(id);
     $('#product_nameu').val(data.product_name);
	 $('#product_priceu').val(data.product_price);
	 $('#subcategory_idu').val(data.subcategory_id);
	 $('#available_quantityu').val(data.available_quantity);
	 $('#product_descriptionu').val(data.product_description);
     $('#img_div').html(`<img class="img-fluid img-thumbnail" width="150" src="{{ asset('` + path + `')}}">`);
	 $('#zoomupModal').modal('show');
	
   
	});
});
//End


//Update User
$('#editUserForm').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{route('update_user')}}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
              
                $('#updateUser').html('Updating User.....');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.edit_user_errors))
                {
                  //$('#myModal').modal('toggle');
        
                    swal({
                        title:"Success",
                        text:"User Details Successfully Updated",
                        icon:"success",
                        button:"OK"
                    });
              
        
                    $('#editUserForm').trigger("reset");
                   
                    $("#updateUser").html('UPDATE');
                    $("#edit_user_modal").modal('hide');
                    $('#usersTable').DataTable().ajax.reload();
                    
                }
                else
                {
                    $("#edit_user_errors").fadeIn(1000,function(){
                        printErrorMsg(response.edit_user_errors,'edit_user_errors');
                        $("#updateProduct").html('UPDATE');
                    });
                }
            }
        });
       }));
            //End

   //Update Product
   $('#formProductEdit').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{route('update_products')}}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
              
                $('#updateProduct').html('Updating Product');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.products_update_errors))
                {
                  //$('#myModal').modal('toggle');
        
                    swal({
                        title:"Success",
                        text:"Product Successfully Updated",
                        icon:"success",
                        button:"OK"
                    });
              
        
                    $('#formProductEdit').trigger("reset");
                   
                    $("#updateProduct").html('UPDATE');
                    $("#zoomupModal").modal('hide');
                    $('#html5-extension').DataTable().ajax.reload();
                    
                }
                else
                {
                    $("#product_errorsu").fadeIn(1000,function(){
                        printErrorMsg(response.products_update_errors,'product_errorsu');
                        $("#updateProduct").html('UPDATE');
                    });
                }
            }
        });
       }));
            //End
// Delete Product
$(document).on('click','.deleteProduct',function(){
var id=$(this).attr('id');
swal({
title:"Are you sure you to remove this product ?",
text:"This Action Cannot be Reverted",
icon:"warning",
buttons:true,
dangerMode:true,
})
.then((willDelete) => {
if(willDelete)
{
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"products/"+id,
type:'DELETE',
data:{
"id":id
},
success:function(data)
{
swal({
title:"Success",
text:"Product Successfuly Removed",
icon:"success",
button:"OK"
});

$('#html5-extension').DataTable().ajax.reload();

}
});


} else {
swal("Product Not Removed!");
}
});
});
//Remove Product
// End

     // Add New Category
     $('#categoryForm').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{ route('categories.store') }}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
                $('#buttonCategory').html('Adding New Category');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.category_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#category_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "Category Added Successfully!",
                    type: 'success',
                    padding: '2em'
                    });
                    $('#categories_table').DataTable().ajax.reload();
        
                   $('#categoryForm').trigger("reset");
                   
                    $("#buttonCategory").html('ADD CATEGORY');

                    // table.ajax.reload();
                }
                else
                {
                    $("#category_errors").fadeIn(1000,function(){
                        printErrorMsg(response.category_errors,'category_errors');
                        $("#buttonCategory").html('ADD');
                    });
                }
            }
        });
        
       }));
            //End


        // Edit Category Function
$('body').on('click','.edit_category',function(){
  //  alert("You Are Good To Go");
	var id=$(this).attr('id');
// alert(id);
	$.get("{{route('categories.index')}}" +'/' + id+'/edit',function(data)
	{
    
     
	$('#hidden_category_id').val(id);
    
   $('#category_nameu').val(data.category_name);
	 $('#edit_category_modal').modal('show');
	
   
	});
});
//End
       // Edit Category Function
       $('body').on('click','.edit_user',function(){
  //  alert("You Are Good To Go");
	var id=$(this).attr('id');
// alert(id);
	$.get("{{url('admin/user_edit')}}" +'/' + id,function(data)
	{
    
     
	$('#hidden_user_id').val(id);
  
    
   $('#edit_first_name').val(data.first_name);
   $('#edit_last_name').val(data.last_name);
   $('#edit_email').val(data.email);
   $('#edit_gender').val(data.gender);
   $('#edit_user_modal').modal('show');
	
   
	});
});
//End
 // Add New API User
 $('#apiuserForm').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{ route('apiRegister') }}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
                $('#buttonAPIUSER').html('Adding New API User....');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.api_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#api_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "API User Added Successfully!",
                    type: 'success',
                    padding: '2em'
                    });
                    $('#api_users_table').DataTable().ajax.reload();
        
                   $('#apiuserForm').trigger("reset");
                   
                    $("#buttonAPIUSER").html('ADD');
                    $('#apiUserModal').modal('hide');

                    // table.ajax.reload();
                }
                else
                {
                    $("#api_errors").fadeIn(1000,function(){
                        printErrorMsg(response.api_errors,'api_errors');
                        $("#buttonAPIUSER").html('ADD');
                    });
                }
            }
        });
        
       }));
            //End

// Assign Access Token
$('#apiTokenForm').on('submit',(function(e){
        
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{ route('assignToken') }}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
                $('#buttonToken').html('Assigning Token....');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.api_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#token_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "User Access Token Successfully Generated!",
                    type: 'success',
                    padding: '2em'
                    });
                    $('#token_users_table').DataTable().ajax.reload();
        
                   $('#apiTokenForm').trigger("reset");
                   
                    $("#buttonToken").html('ADD');
                    $('#tokenModal').modal('hide');

                    // table.ajax.reload();
                }
                else
                {
                    $("#token_errors").fadeIn(1000,function(){
                        printErrorMsg(response.token_errors,'token_errors');
                        $("#buttonToken").html('ADD');
                    });
                }
            }
        });
        
       }));
            //End
//Assign Api Token
        // Edit Product Function
        $('body').on('click','.assign_token',function(){

	var id=$(this).attr('id');
    $('#hidden_api_user_id').val(id);
    $('#apiTokenModal').modal('show');

});
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
                $('#btnUser').html('Adding New User');
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
                    text: "New User Added Successfully!",
                    type: 'success',
                    padding: '2em'
                    });
                    $('#usersTable').DataTable().ajax.reload();
        
                   $('#registerForm').trigger("reset");
                   $('#userModal').modal('hide');
                   
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

   //Update Category
   $('#formCategoryEdit').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{route('update_category')}}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
              
                $('#updateCategory').html('Updating Category');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.category_update_errors))
                {
                  //$('#myModal').modal('toggle');
        
                    swal({
                        title:"Success",
                        text:"Category Successfully Updated",
                        icon:"success",
                        button:"OK"
                    });
              
        
                    $('#formCategoryEdit').trigger("reset");
                   
                    $("#updateCategory").html('UPDATE');
                    $("#edit_category_modal").modal('hide');
                    $('#categoriesTable').DataTable().ajax.reload();
                    
                }
                else
                {
                    $("#category_errorsu").fadeIn(1000,function(){
                        printErrorMsg(response.category_update_errors,'category_errorsu');
                        $("#updateCategory").html('UPDATE');
                    });
                }
            }
        });
       }));
            //End
// Delete Category
$(document).on('click','.deleteCategory',function(){
var id=$(this).attr('id');
swal({
title:"Are you sure you to remove this Category ?",
text:"This Action Cannot be Reverted",
icon:"warning",
buttons:true,
dangerMode:true,
})
.then((willDelete) => {
if(willDelete)
{
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"categories/"+id,
type:'DELETE',
data:{
"id":id
},
success:function(data)
{
swal({
title:"Success",
text:"Category Successfuly Removed",
icon:"success",
button:"OK"
});

$('#categoriesTable').DataTable().ajax.reload();

}
});


} else {
swal("Category Not Removed!");
}
});
});
//Remove Category
// End

           // Add New Subcategory
           $('#subcategoryForm').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{ route('subcategories.store') }}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
                $('#buttonSubcategory').html('Adding New Sub Product');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.sub_category_errors))
                {
                  //$('#myModal').modal('toggle');
                  $("#subcategory_errors").fadeOut(1000,function(){
                       
                        
                    });

                    swal({
                    title: 'Success!',
                    text: "Sub Category Added Successfully!",
                    type: 'success',
                    padding: '2em'
                    });
                    // $('#products_table').DataTable().ajax.reload();
        
                   $('#subcategoryForm').trigger("reset");
                   
                    $("#buttonSubcategory").html('ADD');

                    // table.ajax.reload();
                }
                else
                {
                    $("#subcategory_errors").fadeIn(1000,function(){
                        printErrorMsg(response.sub_category_errors,'subcategory_errors');
                        $("#buttonSubcategory").html('ADD');
                    });
                }
            }
        });
        
       }));
            //End


        // Edit Product Function
$('body').on('click','.edit_subcategory',function(){
  //  alert("You Are Good To Go");
	var id=$(this).attr('id');
 alert(id);
	$.get("{{route('subcategories.index')}}" +'/' + id+'/edit',function(data)
	{
    
	 $('#subcategory_nameu').val(data.subcategory_name);
	 $('#category_idu').val(data.category);
	 $('#hidden_subcategory_id').val(id);
	 $('#edit_subcategory_modal').modal('show');
	
   
	});
});
//End

   //Update Product
   $('#formSubcategoryEdit').on('submit',(function(e){
        //alert("You Are Good To Go");
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"{{route('update_subcategory')}}",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
              
                $('#updateSubcategory').html('Updating Subcategory');
            },
            success : function(response)
            {
                if($.isEmptyObject(response.subcategory_update_errors))
                {
                  //$('#myModal').modal('toggle');
        
                    swal({
                        title:"Success",
                        text:"Subcategory Successfully Updated",
                        icon:"success",
                        button:"OK"
                    });
              
        
                    $('#formSubcategoryEdit').trigger("reset");
                   
                    $("#updateProduct").html('UPDATE');
                    $("#edit_subcategory_modal").modal('hide');
                    $('#subcategoriesTable').DataTable().ajax.reload();
                    
                }
                else
                {
                    $("#subcategories_errorsu").fadeIn(1000,function(){
                        printErrorMsg(response.subcategory_update_errors,'subcategories_errorsu');
                        $("#updateSubcategory").html('UPDATE');
                    });
                }
            }
        });
       }));
            //End
// Delete Product
$(document).on('click','.deleteSubcategory',function(){
var id=$(this).attr('id');
swal({
title:"Are you sure you to remove this subcategory?",
text:"This Action Cannot be Reverted",
icon:"warning",
buttons:true,
dangerMode:true,
})
.then((willDelete) => {
if(willDelete)
{
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"subcategories/"+id,
type:'DELETE',
data:{
"id":id
},
success:function(data)
{
swal({
title:"Success",
text:"Sub Category Successfuly Removed",
icon:"success",
button:"OK"
});

$('#html5-extension').DataTable().ajax.reload();

}
});


} else {
swal("Sub Category Not Removed!");
}
});
});

// End


        });


        function printErrorMsg(msg,div)
					 {
            //  alert('#' + div);
						 $("#" + div).find("ul").html('');
						 $("#" + div).css('display','block');
						 $.each(msg,function(key,value){
              $("#" + div).find('ul').append('<li>' + value + '</li>');
						 });
					 }

    //Fetch Sub Categories List
    function fetchSubCategories() {
            $.ajax({
                url: "{{route('allSubcategories')}}",
                method: "GET",
                dataType: "json",
                success: function (data) {
                    //alert(data);

                    $.each(data, function (index, val) {

                        $('#product_subcategory_id,#subcategory_idu').append('<option value=' + val.id + '>' + val.subcategory_name + '</option>');
                    });
                }
            })
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

                        $('#category_id,#category_idu,#product_category,#product_categoryu').append('<option value=' + val.id + '>' + val.category_name + '</option>');
                    });
                }
            })
        }
          //Fetch Products  List
    function Products() {
            $.ajax({
                url: "{{route('allProducts')}}",
                method: "GET",
                dataType: "json",
                success: function (data) {
                    //alert(data);

                    $.each(data, function (index, val) {

                        $('#api_product_id').append('<option value=' + val.id + '>' + val.product_name + '</option>');
                    });
                }
            })
        }
      
    </script>

@stack('user-logins');

     <script src="{{ asset('backend/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{ asset('backend/assets/js/custom.js')}}"></script>
   
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('backend/plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
 <!-- BEGIN THEME GLOBAL STYLE -->
 <!-- <script src="{{ asset('backend/assets/js/scrollspyNav.js')}}"></script> -->
    <script src="{{ asset('backend/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
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
    <script>
       
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

</html>