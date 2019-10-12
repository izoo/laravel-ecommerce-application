<!DOCTYPE html>
<html lang="en">
<head>
<title>EASTLINE
</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" content="{{ csrf_token()}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.min.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
<link href="{{asset('backend/css/owl.carousel.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    							
<style>
    .profile 
    {
        display:none;
    }
    .busy
{
    position: absolute;
    left: 50%;
    top: 35%;
    display: none;
   
    background: transparent url('{{asset('images/ezgif-2-6d0b072c3d3f.gif')}}');
    z-index: 1000;
    height: 31px;
    width: 31px;
}

#busy-holder
{
    background: transparent;
    width: 100%;
    height: 100%;        
}
    </style>
</head>
<body class="app sidebar-mini rtl">
  <!--Start Delete Modal !-->
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 style="text-align:center;" class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;text-align:center;">Are you sure you want to remove this Bill?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--End Delete Modal !-->
<!--More Details Modal !-->
<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">
    
            <div class="modal-content">
    
                    <div class="modal-header">
    
                            <h4 class="modal-title" id="modelHeading"></h4>
    
                    </div>
    
                    <div class="modal-body">
            <div class="w3-card w3-padding-16 w3-padding-right w3-padding-left">
                    <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                    <th>
                    Description
                    </th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td id="descript">
    
                    </td>
                   
                    
                    </tr>
                    </tbody>
                    </table>
                    <div class="w3-padding-8 w3-card">
                        <!-- start content_slider -->
                        <div class="photos">
                        
                </div>
                <div class="title w3-padding-8">
                </div>
                        <div id="owl-demo" class="owl-carousel text-center">
                                
                        </div>
                        
                                        
                </div>
                    </div>
                    </div>
    
            </div>
    
    </div>
    
    </div>
<!-- End More Details Modal !-->
 <!-- Modal !-->
 <div id="myModalEdit" class="modal fade w3-padding-left" role="dialog">
  <div class="modal-dialog"  style="width:90%;height:80%;">

    <!-- Modal content-->
    <div class="modal-content w3-padding-left w3-padding-right">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title w3-bottombar w3-center w3-padding-8" style="font-family:cursive;text-align:center;">EDIT BILL</h4>
      </div>
      <div class="modal-body">
       
      <form id="formEditBills" method="POST" >
        <div>
          <input type="hidden" name="hidden_id" id="hidden_id">
          <input type="hidden" name="hidden_details" id="hidden_details">
							<div id="siteErroru" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;padding-right:100px;">
							<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
							<ul class="w3-ul" style="list-style:none;">
							
							</ul>
							</div>
							</div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
            <label for="price">Material</label>
            <input type="text" class="form-control"  name="matu" id="matu">
                      
                   
                  </div>
</div>
<div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
            <label for="price">Supplier</label>
            <input type="text" class="form-control"  name="supplieru" id="supplieru">
                        
                   
                  </div>
</div>
</div>
<div class="row">
            <div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="sparepart">Quantity</label>
                    <input class="form-control" name="quantityu" id="quantityu" type="number" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
<div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="price">Unit Cost</label>
                    <input class="form-control" name="unit_costu" id="unit_costu" type="number" aria-describedby="" placeholder="">
                   
                  </div>
</div>
</div>

<div class="row">
            <div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="sparepart">REF NO</label>
                    <input class="form-control" name="ref_nou" id="ref_nou" type="text" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
<div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="price">Site Name </label>
                    <input class="form-control" name="site_nameu" id="site_nameu" type="text" aria-describedby="" placeholder="">
                   
                  </div>
</div>
</div>
<div class="row">
            <div class="col-sm-9 col-lg-9 col-md-9">
            <div class="form-group">
            <label for="price">Description</label>
                   <textarea name="descriptionu" id="descriptionu" class="form-control">

                   </textarea>
                   
                   
                  </div>
</div>
<div class="col-sm-3 col-lg-3 col-md-3">
<div class="form-group">
                    <label for="date">DATE </label>
                    <input class="form-control" name="date_addedu" id="date_addedu" type="date" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
</div>
                  
                  <div class="tile-footer">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-md-offset-3">
                  <button class="btn btn-primary" id="buttonEditBills" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i
                    >EDIT</button
                  >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary cancel_editbills" href="#"
                    ><i class="fa fa-fw fa-lg fa-times-circle"></i>RESET</a>
                  
                </div>
              </div>
            </div>
                </form>
    </div>

  </div>
</div>
           </div>
        </div>
    <!--End Modal !-->

     <!-- Modal !-->
 <div id="myModalView" class="modal fade w3-padding-left" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content w3-padding-left w3-padding-right">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title w3-bottombar w3-center w3-padding-8" id="supplier-name" style="font-family:cursive;text-align:center;">Payment Details</h4>
      </div>
      <div  class="modal-body">
       <table id="data" class="table table-responsive">
         <tr>
           <td>Supplier</td>
           <td>Amount Due</td>
           <td>Amount Paid</td>
           <td>Balance</td>
           <td>Mode</td>
           <td>MPESA Code</td>
           <td>Added On</td>
</tr>
 

</table>
      
    </div>

  </div>
</div>
           </div>
        </div>
    <!--End Modal !-->
    <!-- Modal !-->
 <div id="myModalPay" class="modal fade w3-padding-left" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content w3-padding-left w3-padding-right">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title w3-bottombar w3-center w3-padding-8" id="supplier-name" style="font-family:cursive;text-align:center;">EDIT BILL</h4>
      </div>
      <div class="modal-body">
       
      <form id="formPayBills" method="POST" >
        <div>
          <input type="hidden" name="hidden_pay" id="hidden_pay">
          <input type="hidden" name="hidden_payid" id="hidden_payid">
          <input type="hidden" name="hidden_refno" id="hidden_refno">
							<div id="siteErrorPay" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;padding-right:100px;">
							<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
							<ul class="w3-ul" style="list-style:none;">
							
							</ul>
							</div>
							</div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="form-group">
            <label for="price">Amount Due</label>
            <input type="text" class="form-control"  name="amount_due" id="amount-due" readonly required="">
                      
                   
                  </div>
</div>
<div class="col-sm-12 col-lg-12 col-md-12">
            <div class="form-group">
            <label for="price">Balance</label>
            <input type="text" class="form-control"  name="balance" id="balance" required="" readonly>
                        
                   
                  </div>
</div>
<div class="col-sm-12 col-lg-12 col-md-12">
            <div class="form-group">
            <label for="price">Amount Paid</label>
            <input type="text" class="form-control"  name="amount_paid" id="amount-paid" required="">
                        
                   
                  </div>
</div>
                  <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="form-group">
            <label for="price">Mode of Payment</label>
            <select class="form-control"  name="mode" id="mode">
                        <option value="" disabled selected></option>
                    <option value="CASH">CASH</option>
                    <option value="MPESA">MPESA</option>
                    <option value="BANK">BANK</option>
                    </select>
                        
                   
                  </div>
                
</div>
<div class="col-sm-12 col-lg-12 col-md-12  mpesa_code" style="display:none">
            <div class="form-group">
            <label for="price">MPESA CODE</label>
            <input type="text" class="form-control"  name="mpesa_code" id="mpesa_code">
                        
                   
                  </div>
</div>


</div>
                  
                  <div class="tile-footer">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-md-offset-3">
                  <button class="btn btn-primary" id="buttonPayBills" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i
                    >PAY</button
                  >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary cancel_paybills" href="#"
                    ><i class="fa fa-fw fa-lg fa-times-circle"></i>RESET</a>
                  
                </div>
              </div>
            </div>
                </form>
    </div>

  </div>
</div>
           </div>
        </div>
    <!--End Modal !-->
             <!-- Modal !-->
             <div id="myModal" class="modal fade w3-padding-left" role="dialog">
  <div class="modal-dialog" style="width:90%;height:80%;">

    <!-- Modal content-->
    <div class="modal-content w3-padding-left w3-padding-right">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title w3-bottombar w3-center w3-padding-8" style="font-family:cursive;text-align:center;">Add New Bill </h4>
      </div>
      <div class="modal-body">
       
      <form id="formBills" method="POST" >
        <div>
							<div id="siteError" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;padding-right:100px;">
							<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
							<ul class="w3-ul" style="list-style:none;">
							
							</ul>
							</div>
							</div>
        <div class="row">
            <div class="col-sm-3 col-lg-3 col-md-3">
            <div class="form-group">
            <label for="price">Supplier</label>
            <select class="form-control"  name="supplier" id="supplier">
                        <option value="" disabled selected></option>
                        <button data-toggle="modal" data-target="#mySuppliers" class="up-product btn btn-warning" ><i class="fa fa-user-plus"></i>New Supplier</button>

                    </select>
<!--
            <label for="price">Material</label>
            <select class="form-control"  name="mat" id="mat">
                        <option value="" disabled selected></option>
                    
                    </select>
                   !-->
                  </div>
</div>
<div class="col-sm-3 col-lg-3 col-md-3">
<div class="form-group">
                    <label for="sparepart">REF NO</label>
                    <input class="form-control"name="ref_no" id="ref_no" type="text" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
<div class="col-sm-3 col-lg-3 col-md-3">
<div class="form-group">
<label for="price">Site Name </label>
                    <input class="form-control" name="site_name" id="site_name" type="text" aria-describedby="" placeholder="">
                   
                  </div>
</div>
<div class="col-sm-3 col-lg-3 col-md-3">
<div class="form-group">
                    <label for="date">DATE </label>
                    <input class="form-control" name="date_added" id="date_added" type="date" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
</div>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<table class="table table-responsive table-striped table-bordered" id="item_table">
<thead>
<tr>
<th width="20%">Item</th>
<th width="20%">Price</th>
<th width="20%">Quantity</th>
<th width="20%">Description</th>
<th width="20%">Action</th>
</tr>
</thead>
<tbody class="new-item">
</tbody>
<tfoot>
<td colspan="3" align="right">
</tfoot>
</table>
</div>
</div>


                  
                  <div class="tile-footer">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-md-offset-3">
                  <button class="btn btn-primary" id="buttonBills" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i
                    >ADD</button
                  >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary cancel_bills" href="#"
                    ><i class="fa fa-fw fa-lg fa-times-circle"></i>RESET</a>
                  
                </div>
              </div>
            </div>
                </form>
    </div>

  </div>
</div>
           </div>
        </div>
    <!--End Modal !-->
   <!-- Modal !-->
   <div id="mySuppliers" class="modal fade w3-padding-left" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content w3-padding-left w3-padding-right">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title w3-bottombar w3-center w3-padding-8" style="font-family:cursive;">Add New Supplier </h4>
      </div>
      <div class="modal-body">
       
      <form id="formSuppliers" method="POST" >
        <div>
							<div id="supError" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;padding-right:100px;">
							<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
							<ul class="w3-ul" style="list-style:none;">
							
							</ul>
							</div>
							</div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="material">Supplier Name</label>
                    <input class="form-control"name="supplier_name" id="supplier_name" type="text" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
<div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="material">Supplier Email</label>
                    <input class="form-control"name="supplier_email" id="spare_name" type="text" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
</div>
<div class="row">
            <div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="price">Supplier Phone</label>
                    <input class="form-control"name="supplier_phone" id="supplier_phone" type="number" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
</div>
<div class="col-sm-6 col-lg-6 col-md-6">
            <div class="form-group">
                    <label for="price">Company Name</label>
                    <input class="form-control" name="company_name" id="company_name" type="text" aria-describedby="" placeholder="">
                   
                  </div>
</div>
</div>

                  
                  <div class="tile-footesr">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-md-offset-3">
                  <button class="btn btn-primary" id="buttonSupplier" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i
                    >ADD</button
                  >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary cancel" href="#"
                    ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  
                </div>
              </div>
            </div>
                </form>
    </div>

  </div>
</div>
           </div>
        </div>
    <!--End Modal !-->
     <!-- Modal !-->
   <div id="myMaterials" class="modal fade w3-padding-left" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content w3-padding-left w3-padding-right">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title w3-bottombar w3-center w3-padding-8" style="font-family:cursive;">Add New Material </h4>
      </div>
      <div class="modal-body">
       
      <form id="formMaterials" method="POST" >
        <div>
							<div id="supMat" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;padding-right:100px;">
							<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
							<ul class="w3-ul" style="list-style:none;">
							
							</ul>
							</div>
							</div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="form-group">
                    <label for="material">Material Name</label>
                    <input class="form-control" name="material_name" id="material_name" type="text" aria-describedby="emailHelp" placeholder="">
                   
                  </div>
                  
</div>


</div>
<div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
<div class="form-group">
            <label for="price">Description</label>
                   <textarea name="material_desc" id="material_desc" class="form-control">

                   </textarea>
                   
                   
                  </div>
                  </div>
                  </div>

                  
                  <div class="tile-footesr">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-md-offset-3">
                  <button class="btn btn-primary" id="buttonMaterial" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i
                    >ADD</button
                  >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary cancel" href="#"
                    ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  
                </div>
              </div>
            </div>
                </form>
    </div>

  </div>
</div>
           </div>
        </div>
    <!--End Modal !-->
@include('admin.partials.header')
@include('admin.partials.siderbar')
<main class="app-content">
@yield('content')
</main>

<script src="{{asset('backend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>  
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="{{asset('backend/js/owl.carousel.js')}}"></script>

<script type="text/javascript">
function fetchMaterials()
{
  //$(document).on('click','.mat', function(){
   // alert("You are good to go");
  $.ajax({
        url:"fetchMaterials",
        type:"GET",
        dataType:'json',
        success:function(data)
        {
          var materials =" ";
          $.each(data,function(index,element){
              materials +='<option value="' + element.material_name + '">' + element.material_name + '</option>'
          });
          $('body').find('.mat').append(materials);
        }
    });
//}); 
}

function fetchSuppliers()
{
    $.ajax({
        url:"fetchSuppliers",
        type:"GET",
        dataType:'json',
        success:function(data)
        {
          var suppliers =" ";
          $.each(data,function(index,element){
              suppliers +='<option value="' + element.supplier_name + '">' + element.supplier_name + '</option>'
          });
          $('#supplier').append(suppliers);
        }
    });
}
function fetchSupplier()
{
    $.ajax({
        url:"fetchSuppliers",
        type:"GET",
        dataType:'json',
        success:function(data)
        {
          var suppliers =" ";
          $.each(data,function(index,element){
              suppliers +='<option value="' + element.id + '">' + element.supplier_name + '</option>'
          });
          $('#select-suppliers').append(suppliers);
        }
    })
}
function fetchPdfSupplier()
{
    $.ajax({
        url:"fetchSuppliers",
        type:"GET",
        dataType:'json',
        success:function(data)
        {
          var suppliers =" ";
          $.each(data,function(index,element){
              suppliers +='<option value="' + element.supplier_name + '">' + element.supplier_name + '</option>'
          });
          $('#supplier_pdf').append(suppliers);
          $('#supplier_all').append(suppliers);
        }
    })
}
function load_paid(supplier='')
{
  var paid = $('.data-paid').DataTable({
    processing:true,
       serverSide:true,
       responsive:true,
        ajax:
        {
         url: 'paid',
         data:{supplier:supplier},
        },
        "columns":[
 
                {data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data:'supplier_name',name:'supplier_name'},
                {data:'total_cost',name:'total_cost'},
                {data:'amount_paid',name:'amount_paid'},
                {data:'balance',name:'balance'},
               
                {data:'created_at',name:'created_at'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
				{data:'delete',name:'delete',orderable:false,searchable:false},
				
            
        ],
        dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    
  
});
}
function load_data(from_date ='', to_date ='',supplier='',paid='',pending='')
{
  var table = $('#data_table').DataTable({
       processing:true,
       serverSide:true,
       responsive:true,
        ajax:
        {
         url: '{{route("bills.index")}}',
         data:{from_date:from_date,to_date:to_date,supplier:supplier,paid:paid,pending:pending},
        },
        "columns":[
            
                {data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data:'item',name:'item'},
                {data:'description',name:'description'},
                
                {data:'quantity',name:'quantity'},
                {data:'price',name:'price'},
                {data:'vat',name:'vat'},
                {data:'total_cost',name:'total_cost'},
                {data:'ref_no',name:'ref_no'},
                {data:'site_name',name:'site_name'},
                {data:'supplier_name',name:'supplier_name'},
                {data:'date_added',name:'date_added'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
			
				
            
        ],
        dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
   
}
function fetchVat()
{
  var from_date = $('#from_date').val();
var to_date = $('#to_date').val();

  $.ajax({
    url:'fetchvat',
    type:'GET',
    data:{from_date:from_date,to_date:to_date},
   
    success:function(data)
    {
      
        //alert(element.total_vat);
       // $('#total_vat').html(data);
      
    	
    }
  });
}
function fetchTotal()
{
  var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var supplier=$('#supplier_all').val();
  $.ajax({
    url:'fetchtotal',
    type:'GET',

    data:{from_date:from_date,to_date:to_date,supplier:supplier},
    success:function(data)
    {
      
        $('#total_cost').html(data);
     
    	
    }
  });
}
function doneTyping()
{
  var name = $('.search-data').val();
  $.ajax({
    url:'fechvat',
    type:'GET',
    dataType:'json',
    data:{name:name},
    success:function(data)
    {
      
    alert(data.total_vat);
    }
  })
}



$(document).ready(function(){
  //var table = $('#data-paid').DataTable();
  
 var count = 1;
 dynamic_field(count);
 function dynamic_field(number)
 {
  html = '<tr>';
  html += '<td>' +
           '<select class="form-control mat"  name="mat[]" id="mat">' +
                        '<option value="" disabled selected></option>' +
                    '<option><button data-toggle="modal" data-target="#myMaterials" class="up-product btn btn-warning" ><i class="fa fa-product-hunt"></i>New Material</button></option>'+
                  '</select></td>';
                  html += '<td><input class="form-control" name="unit_cost[]" id="unit_cost" type="number" aria-describedby="" placeholder=""></td>';
                  html += '<td><input class="form-control" name="quantity[]" id="quantity" type="number" aria-describedby="emailHelp" placeholder=""></td>';
                  html += '<td><textarea name="description[]" id="description" class="form-control description"></textarea></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('.new-item').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">New Item</button></td></tr>';
            $('.new-item').html(html);
        }
 }
 
          $('.mat').each(function(){
            $(this).val(data.mat_description);
          });
          
 $(document).on('change','.mat',function(){
   var mat= this.value;
  $.ajax({
        url:"fetchDescription",
        type:"GET",
        data:{mat:mat},
        success:function(data)
        {
          /*
          $('.description').each(function(){
            $(this).val(data.mat_description);
          });
          */
          var desc =$(".description");
          /*
          $('.description').each(function(i,element){
            $(element).val(data.mat_description);
          })
          */
          
          for(var i=0;i<desc.length;i++)
          {
            var element = desc.eq(i);
            $(element).val(data.mat_description);
          }
          
       // alert(data.mat_description);
       // $('.description').val(data.mat_description);
        // $(this).closest('tr').find("td .description").val();
          //alert(data.mat_description);
         // $(this).closest("tr").find("td .description").val(data.)
        // $(this).closest("tr").remove();
          //$(this).closest("tr").find("textarea").val(data.mat_description);
          
        }
    });
 })
 $(document).on('click','#add', function(){
   count++;
   dynamic_field(count);
   fetchMaterials();
 })
$(document).on('click','.remove',function(){
  count--;
  $(this).closest("tr").remove();
});
$('#4').click(function(){
  alert("You Are Good To Go");
});

  $(document).on('click','.add-payment',function(){
       // alert("You Are Good To Go");
        var ids = [];
        var balanc = [];
        var balance = [];
        var total = 0;
        var amount_paid = [];
$(":checkbox:checked").each(function(i){
  //first_balance= $(this).val();
 //first_id= $(this).attr('id');
ids[i]=  $(this).attr('id');
var num = $(this).closest('td').find(".change-amount").val();
var new_value = $('.change-amount').val();
//alert(num);
balance[i]= num;



});


/*

*/
for(var i =0; i<balance.length; i++)
{
  total += balance[i] << 0;
}
//alert(ids);
//alert(balance);
//alert(total);dds
$('.total_amount').val(total);
$('.ids').val(ids);
$('.balance').val(balance);
$('.amount_paid').val(amount_paid);
      });
$("#pay_total").click(function(){
  var total = $('.total_amount').val();
  var ids =  $('.ids').val();
  var balance = $('.balance').val();
var amount_paid = $('.amount_paid').val();
  $.ajax({
    url:"paymultiple",
    method:"GET",
    data:{total:total,ids:ids,balance:balance,amount_paid:amount_paid},
    success:function(response){
alert("Bills Successfully Updated");
$('.pay-bills').DataTable().ajax.reload();
$('.data-paid').DataTable().ajax.reload();
fetchTotal();
    }
  });
})
/*
      $('.add-payment').click(function(){
alert("You Are Good To Go");
      });
      */
      load_paid();
  load_data();
  fetchVat();
  fetchTotal();
    fetchMaterials();
    fetchSuppliers();
    fetchSupplier();
    fetchPdfSupplier();
    $('#data_table #data_table_length').addClass('search-data');
   

    //$('#data_table_length').append('');
    $('#data_table  .search-data').click(function(){
      var search_data= $('.data-table .search-data').val()
     // alert(search_data);
     
      $('.search-data').on('keydown',function(){
        var name = $('.search-data').val();
  $.ajax({
    url:'fetchvat',
    type:'GET',
   datType:'json',
    data:{name:name},
    success:function(data)
    {
      var totals = JSON.parse(data);
      //alert(totals.total_vat);
      $.each(totals,function(index,element){
        //alert(element.total_vat);
        
        $('#total_vat').html(element.total_vat);
        $('#cost').html(element.total);
      })
    	
    }
  });
  });
    });
    
    $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
$('.pending').click(function(){
  var paid = '';
  var pending= pending;
  var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var supplier=$('#supplier_all').val();
$('#data_table').DataTable().destroy();
  load_data(from_date,to_date,supplier,paid,pending);
});
$('.paid').click(function(){
  var paid = "paid";
  var pending= '';
  var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var supplier=$('#supplier_all').val();
$('#data_table').DataTable().destroy();
load_data(from_date,to_date,supplier,paid,pending);
});
$('#filter').click(function(){

var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var supplier=$('#supplier_all').val();
if(from_date !='' && to_date !='')
{
  $('#data_table').DataTable().destroy();
  load_data(from_date,to_date,supplier,paid,pending);
  //fetchVat();
  fetchTotal();
}
else
{
  alert('Both Date is required');
}
});
$('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#supplier_all').val('');
  $('.paid-name').val('');
  $('.pending-name').val('');
  $('#data_table').DataTable().destroy();
  load_data();
 });
 $('#mode').on('change',function(){
var mode = this.value;
if(mode=='MPESA')
{
  $('.mpesa_code').fadeIn('slow');
}
else
{
  $('.mpesa_code').fadeOut('slow');
}
 });

 $('#supplier_pdf').on('change',function(){
var supplier = this.value;
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var paid = $('.paid-name').val();
  var pending= $('.pending-name').val();
$('.data-paid').DataTable().destroy();
  load_paid(supplier);
  //var route = 'dynamic_pdf/' + supplier;
  //var url = "{{ url('dynamic_pdf/') }}" ;
  var route='dynamic_pdf/' + supplier; 
  fetchTotal();
  $(".con").html('<a href=' + route  + ' class="btn btn-primary convert">Convert To PDF</a>');
 });
 $('#supplier_all').on('change',function(){
  var from_date = $('#from_date').val();
var to_date = $('#from_date').val();
var supplier=$('#supplier_all').val();
var paid = $('.paid-name').val();
  var pending= $('.pending-name').val();
$('#data_table').DataTable().destroy();
//$('.data_table').DataTable().destroy();
  //load_paid(supplier);
  load_data(from_date,to_date,supplier,paid,pending);
  fetchTotal();
 // load_data()
  //var route = 'dynamic_pdf/' + supplier;
  //var url = "{{ url('dynamic_pdf/') }}" ;
  var route='exportExcel/' + supplier; 
  
  $(".expo").html('<a href=' + route  +' class="btn btn-success">Export To Excel </a>');
 });
 var pending = $('.data-pending').DataTable({
        "processing":true,
        "serverSide":true,
        "responsive":true,
        "ajax":"pending",
        "columns":[
 
                {data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data:'supplier_name',name:'supplier_name'},
                {data:'amount_due',name:'amount_due'},
                {data:'amount_paid',name:'amount_paid'},
                {data:'balance',name:'balance'},
                {data:'mode_payment',name:'mode_payment'},
                {data:'mpesa_code',name:'mpesa_code'},
                {data:'created_at',name:'created_at'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
				{data:'delete',name:'delete',orderable:false,searchable:false},
				
            
        ],
        dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    
  
});
var pay_bills = $('.pay-bills').DataTable({
        "processing":true,
        "serverSide":true,
        "responsive":true,
        "ajax":"allBills",
        "columns":[
 
                {data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data:'supplier_name',name:'supplier_name'},
                {data:'total_cost',name:'total_cost'},
                {data:'amount_paid',name:'amount_paid'},
                {data:'balance',name:'balance'},
               
                {data:'created_at',name:'created_at'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
				{data:'delete',name:'delete',orderable:false,searchable:false},
				
            
        ],
        dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    
  
});
$('#select-suppliers').on('change',function(){
  
  var id=this.value;
  //var html = " ";
//alert(id);
$('table').removeClass('data-table');
$('table').addClass('data-suppliers');
//$('.data-suppliers').fadeIn();
  
});
$('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });
//Delete Product function
$(document).on('click','.deleteBill',function(){
               var bil_id = $(this).attr('data-id');
							 var id = $(this).attr('id');
               var delete_combine = id + "_" + bil_id;
							 //alert(spare_id);
							 $('#confirmModal').modal('show');

					
						 $('#ok_button').click(function(){
                $.ajax({
                  url:"bill/"+delete_combine,
                  type:'DELETE',
                  data:{
                    "id":delete_combine
                  },
									beforeSend:function()
									{
										$('#ok_button').text('Deleting...');
									},
									success:function(data)
									{
										swal({
												title:"Success",
												text:"Bill Successfuly Removed",
												icon:"success",
												button:"OK"
											});
										setTimeout(function(){
											$('#confirmModal').modal('hide');
											$('#data_table').DataTable().ajax.reload()
										,2000});
                  
            fetchTotal();
									}
								});
						 });
						});
                        //Delete Product function
$(document).on('click','.deleteMaterial',function(){
							 var id = $(this).attr('id');
							 //alert(spare_id);
							 $('#confirmModal').modal('show');

					
						 $('#ok_button').click(function(){
                $.ajax({
                  url:"material/"+id,
                  type:'DELETE',
                  data:{
                    "id":id
                  },
									beforeSend:function()
									{
										$('#ok_button').text('Deleting...');
									},
									success:function(data)
									{
										swal({
												title:"Success",
												text:"Material Successfuly Removed",
												icon:"success",
												button:"OK"
											});
										setTimeout(function(){
											$('#confirmModal').modal('hide');
											$('.data-table2').DataTable().ajax.reload()
										,2000});
									}
								});
						 });
            });
            //Edit Bill
            $('body').on('click','.editBill',function(){
	var bill_id=$(this).attr('id');
  //alert(bill_id);
  var item_id = $(this).attr('data-id');
  var combine_id = bill_id + '_' + item_id;
  //alert(item_id);
	$.get("{{route('bills.index')}}" +'/' + combine_id+'/edit',function(data)
	{
    //var dat =  JSON.parse(data);
    //alert(data.item);
		$('#hidden_id').val(bill_id);
    $('#hidden_details').val(item_id);
   $('#matu').val(data.item);
	 $('#supplieru').val(data.supplier_name);
	 $('#quantityu').val(data.quantity);
	 $('#unit_costu').val(data.price);
	 $('#ref_nou').val(data.ref_no);
	 $('#site_nameu').val(data.site_name);
	 $('#descriptionu').val(data.description);
   $('#date_addedu').val(data.date_added);
	 
   $('#myModalEdit').modal('show');
   
	});
});
//Pay Biil
$('body').on('click','.payBill',function(){
	var bill_id=$(this).attr('id');
	$.get("{{route('bills.index')}}" +'/' + bill_id+'/edit',function(data)
	{
    $('#hidden_payid').val(data.id);
    $('#hidden_pay').val(data.supplier);
    $('#hidden_refno').val(data.ref_no);
   $('#amount-due').val(data.total_cost);
	 $('#balance').val(data.balance);
	$('#supplier-name').html('Pay Bills For <strong>' + data.supplier + '</strong>');
	 
   $('#myModalPay').modal('show');
   
	});
});
//View Bill

$('body').on('click','.viewBill',function(){
	var ref_no=$(this).attr('id');
$.ajax({
  url:"view",
  type:"POST",
  dataType:'json',
  data:{ref_no:ref_no},
  success:function(data)
  {
    var view ="";
$.each(data,function(index,element){
  //alert(element.supplier_name);
  view = '<tr><td>' + element.supplier_name  +  '</td>' 
+ '<td>' +  element.amount_due +  '</td> <td>' +  element.amount_paid +  '</td>' + '<td>' +  element.balance +  '</td>'
+ '<td>' +  element.mode_payment +  '</td> <td>' +  element.mpesa_code  + '</td> <td>' +  element.date_add + '</td></tr>';
  /*

*/
});
$('#data').append(view);
   
   $('#myModalView').modal('show');
  }
})
});
//End Delete Product function
$('body').on('click','.more',function(data){
var spare_id = $(this).data('id');
$.get("{{route('spares.index')}}" +'/' + spare_id+'/edit',function(data){

  $('#ajaxModel').modal('show');
});
});
$('body').on('click','.releaseMaterial',function(){
	var material_id=$(this).data('id');
	$.get("{{route('materials.index')}}" +'/' + material_id+'/edit',function(data)
	{
		//$('#hidden_id').val(data.id);
  
	 
   $('#myModalRelease').modal('show');
   
	});
});

$('.treeview-menu li a').click(function(e){
e.preventDefault();
$('.treeview-menu li a').removeClass("active");
//add the acive state to the clicked link
$(this).addClass("active");
//fade out the current container
$('.profile').fadeOut(600,function(){
    $('#' + profileID).fadeIn(600);

});
var profileID=$(this).attr("data-id");
});

    $('#formBills').on('submit',(function(e){
e.preventDefault();
$.ajax({
    url:"{{ route('bills.store')}}",
    type:"POST",
    data:new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
        $('#buttonSpare').html('Adding New Bill');
    },
    success : function(response)
    {
        if($.isEmptyObject(response.error))
        {
          //$('#myModal').modal('toggle');

            swal({
                title:"Success",
                text:"Bill Successfully Added",
                icon:"success",
                button:"OK"
            });
            $('.pay-bills').DataTable().ajax.reload();
            $('.data-bills').DataTable().ajax.reload();
            $('#data_table').DataTable().ajax.reload();
            fetchTotal();
            $('#myModal').modal('toggle');
            $('#formBills').trigger("reset");
            
            dynamic_field(1);
        }
        else
        {
            $("#siteError").fadeIn(1000,function(){
                printErrorMsg(response.error);
                $("#buttonSpare").html('ADD');
            });
        }
    }
});
    }));
    
    $('.cancel_bills').click(function(){
      $('#formBills').trigger("reset");
    });
    $('.cancel_editbills').click(function(){
      $('#formEditBills').trigger("reset");
    });
    $('.cancel_paybills').click(function(){
      $('#formPayBills').trigger("reset");
    });
    $('#formRelease').on('submit',(function(e){
e.preventDefault();
$.ajax({
    url:"",
    type:"POST",
    data:new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      
        $('#buttonRelease').html('Release Materials');
    },
    success : function(response)
    {
        if($.isEmptyObject(response.error))
        {
          //$('#myModal').modal('toggle');

            swal({
                title:"Success",
                text:"Material Successfully Released",
                icon:"success",
                button:"OK"
            });
            $('.data-table2').DataTable().ajax.reload();
            $('#myModalRelease').modal('toggle');
            $('#formRelease').reset();
        }
        else
        {
            $("#releaseError").fadeIn(1000,function(){
                printErrorMsg(response.error);
                $("#buttonRelease").html('ADD');
            });
        }
    }
});
    }));
    $('#formMaterials').on('submit',(function(e){
e.preventDefault();
$.ajax({
    url:"{{ route('materials.store')}}",
    type:"POST",
    data:new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
        $('#buttonMaterial').html('Adding New Material');
    },
    success : function(response)
    {
        if($.isEmptyObject(response.error))
        {
          //$('#myModal').modal('toggle');

            swal({
                title:"Success",
                text:"Material Successfully Added",
                icon:"success",
                button:"OK"
            });
            $('.data-tableM').DataTable().ajax.reload();
            $('#myMaterials').modal('toggle');
            $('#formMaterials').trigger('reset');
            fetchMaterials();
        }
        else
        {
            $("#supMat").fadeIn(1000,function(){
                printErrorMsg(response.error);
                $("#buttonMaterial").html('ADD');
            });
        }
    }
});
    }));
    $('#formSuppliers').on('submit',(function(e){
e.preventDefault();
$.ajax({
    url:"{{ route('suppliers.store')}}",
    type:"POST",
    data:new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
        $('#buttonSupplier').html('Adding New Supplier');
    },
    success : function(response)
    {
        if($.isEmptyObject(response.error))
        {
          //$('#myModal').modal('toggle');

            swal({
                title:"Success",
                text:"Supplier Successfully Added",
                icon:"success",
                button:"OK"
            });
            $('.data-tableS').DataTable().ajax.reload();
            $('#mySuppliers').modal('toggle');
            $('#formSuppliers').trigger("reset");
            fetchSuppliers();
            fetchPdfSupplier();
            fetchSuppliers();
        }
        else
        {
            $("#supError").fadeIn(1000,function(){
                printErrorMsg(response.error);
                $("#buttonSupplier").html('ADD');
            });
        }
    }
});
    }));
    $("#formEditBills").on('submit',(function(e)
					 {
			
						 e.preventDefault();
                 //alert("You Are Good To Go");
								//var product_id=$('#hidden_id').val();
								 //alert(vehicle_id)
                $.ajax({
									url:"updateBill",
									type:"POST",
									data:new FormData(this),
									contentType:false,
									cache:false,
									processData:false,
									beforeSend:function()
									{
                      //$("#vehicleError").fadeOut();
                      
											$("#buttonEditBills").html('Updating Details....');
									},
									success : function(response)
									{
										if($.isEmptyObject(response.error))
										{
											swal({
												title:"Success",
												text:"Bill Details Successfully Updated",
												icon:"success",
												button:"OK"
                      });
                      //load_data();
                   $('#myModalEdit').modal('toggle');
									 $('#data_table').DataTable().ajax.reload();
                   $('.data-paid').DataTable().ajax.reload();
                   $('.pay-bills').DataTable().ajax.reload();
										}
									
									else
									
									{
																			
					$("#siteErroru").fadeIn(1000, function(){						
						printErrorMsg(response.error);
						$("#buttonEditBills").html('Update Details');
					});
									}	
                  }
                  
								});
					 }));
    $("#formPayBills").on('submit',(function(e)
					 {
			
						 e.preventDefault();
                 //alert("You Are Good To Go");
								 var pay_id=$('#hidden_pay').val();
								 //alert(vehicle_id)
                $.ajax({
									url:"addPayment",
									type:"POST",
									data:new FormData(this),
									contentType:false,
									cache:false,
									processData:false,
									beforeSend:function()
									{
                      //$("#vehicleError").fadeOut();
                      
											$("#buttonPayBills").html('Adding Payments....');
									},
									success : function(response)
									{
										if($.isEmptyObject(response.error))
										{ 
                      if(response=="Paid")
                      {
                        alert("PAYMENT ALREADY FULLY PAID");
                      }
                      else
                      {
                        swal({
												title:"Success",
												text:"Payment Successfully Added",
												icon:"success",
												button:"OK"
                      });
                      }
                      //load_data();
                   $('#myModalPay').modal('toggle');
									 $('.pay-bills').DataTable().ajax.reload();
										}
									
									else
									
									{
																			
					$("#siteErroru").fadeIn(1000, function(){						
						printErrorMsg(response.error);
						$("#buttonPayBills").html('Update Details');
					});
									}	
                  }
                  
								});
					 }));
 
    var table2 = $('.data-table2').DataTable({
        "processing":true,
        "serverSide":true,
        "ajax":"{{route('materials.index')}}",
        "columns":[
            
                {data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data:'material_name',name:'site_name'},
                {data:'package',name:'location'},
                {data:'price',name:'owner'},
                {data:'quantity',name:'phone'},
                {data:'created_at',name:'created_at'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
				{data:'delete',name:'delete',orderable:false,searchable:false},
				{data:'more',name:'more',orderable:false,searchable:false}
            
        ]
    });
    var table_suppliers = $('.data-tableS').DataTable({
        "processing":true,
        "serverSide":true,
        "ajax":"{{route('suppliers.index')}}",
        "columns":[
            
                {data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data:'supplier_name',name:'supplier_name'},
                {data:'supplier_email',name:'supplier_email'},
                {data:'supplier_phone',name:'supplier_phone'},
                {data:'company_name',name:'company_name'},
               
                {data:'created_at',name:'created_at'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
				{data:'delete',name:'delete',orderable:false,searchable:false},

            
        ]
    });
    var table_materials = $('.data-tableM').DataTable({
        "processing":true,
        "serverSide":true,
        "ajax":"{{route('materials.index')}}",
        "columns":[
            
                {data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data:'material_name',name:'material_name'},
                {data:'mat_description',name:'mat_description'},
               
                {data:'created_at',name:'created_at'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
			

            
        ]
    });
});

function printErrorMsg(msg)
					 {
						 $(".print-error-msg").find("ul").html('');
						 $(".print-error-msg").css('display','block');
						 $.each(msg,function(key,value){
              $(".print-error-msg").find('ul').append('<li>' + value + '</li>');
						 });
					 }
      
       
</script>
</body>
