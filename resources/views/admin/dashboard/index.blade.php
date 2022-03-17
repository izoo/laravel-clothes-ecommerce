@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
       <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="">


                    <div class="row layout-top-spacing">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">

                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Register New Product Details Here</h4>
                                        </div>                                                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12">
                                           <div id="product_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                                            <ul class="w3-ul" style="list-style:none;">
                                            
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form id="productForm" method="POST" enctype="multipart/form-data">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Product Name</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="product_price">Product Price</label>
                                                <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Product Price" required="">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                        <label for="subcategory_id">Product Category</label>
                                                <select id="product_category" name="product_category" class="form-control" required="">
                                                    
                                                </select>
                                        </div>
                                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                        <label for="subcategory_id">Product Sub Category</label>
                                                <select id="product_subcategory_id" name="subcategory_id" class="form-control" required="">
                                                    
                                                </select>
                                        </div>
                                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                                <label for="available_quantity">Product Quantity</label>
                                                <input type="number" class="form-control" name="available_quantity" id="available_quantity" placeholder="Product Quantity" required="">
                                            </div>

                                        </div>
                                       
                                        <div class="form-row mb-4">
                                             
                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                            <label for="product_desc">Product Description</label>
                                            <input type="text" class="form-control" name="product_desc" id="product_desc" placeholder="Product Description">
                                        </div>
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                <label for="product_photo">Product Photo</label>
                                                <input type="file" class="form-control" name="product_photo" id="product_photo">
                                            </div>
                       
                                            
                                        </div>
                                       
                                      <button type="submit" class="btn btn-primary mt-3">ADD PRODUCT</button>
                                    </form>

                                    
                                </div>
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