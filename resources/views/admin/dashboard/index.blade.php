@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    
    <section class="w3-card-4">
    <div class="" id="tab-content">

<div id="list-bills" style="display:block" class="profile w3-card-4">
<h2 class="" style="text-align:center">Listed Bills</h2>
<div class="row" style="padding:0.5%;">
  <div class="col-md-5"  align="">
      <label>Select Supplier</label>
    <select class="form-control"  name="supplier" id="supplier_all">
                        <option value="" disabled selected></option>
                    
                    </select>
    </div>
    <div class="col-sm-3" style="padding-top:2%;padding-bottom:2%">
    <label></label>
    <a href="#" class="btn btn-success paid" >Paid </a>
    <input type="hidden" class="paid-name" id="paid-name" name="paid-name">
    <input type="hidden" class="pending-name" id="pending-name" name="pending-name">
    </div>
    <div class="col-sm-3" style="padding-top:2%;padding-bottom:2%">
    <label></label>
    <a href="#" class="btn btn-warning pending">Pending</a>
    </div>
    </div>
<div class="row" style="padding:1%;">

<div class="col-sm-2 col-sm-2 col-lg-2">
<button data-toggle="modal" data-target="#myModal" class="up-product btn btn-warning" ><i class="fa fa-product-hunt"></i>New Bill</button>

</div>
<div class="col-sm-2 col-sm-2 col-lg-2 expo">
<a href="{{ url('printExcel') }}" class="btn btn-success">Export Excel </a>
</div>

<div class="col-sm-6 col-sm-6 col-lg-6">
<div class="row input-daterange">
<div class="col-md-4">
<input type="text" name="from_date" id="from_date"  class="form-control" placeholder="From Date" readonly />
</div>
<div class="col-md-4">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                </div>
                <div class="col-md-2">
                
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>

                </div>
                <div class="col-md-2">
                <button type="button" name="refresh" id="refresh" class="btn btn-warning"><i class="fa fa-refresh"></i>Refresh</button>

</div>
                
</div>
</div>
<div class="col-md-1 col-sm-1 col-lg-1">

</div>
</div>
<div class="row">
<div class ="w3-card-4">
<div class="row">
<div class="col-sm-1 col-md-1 col-lg-1">
</div>


  
</div>
    </div>
   
</div>

<table id="data_table" style="width:100%;" class="table table-hover table-bordered">
				<thead>
				<tr>
        <th>
        #
        </th>
				<th>
				Material
        </th>
        <th>
       Description
       </th>
			
				<th>
				Quantity
				</th>
				<th>
				Unit Cost
				</th>
        <th>
       VAT
       </th>
       <th>
       Total Cost
       </th>
     
       <th>
       REF NO
       </th>
       <th>
       Site name
       </th>
       <th>
				Supplier
				</th>
        <th>
        Added On
        </th>
        <th>
        Action
        </th>
        
        
				</tr>
				</thead>
				<tbody>
				
				</tbody>
				</table>
        <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
        </div>
        
        <div class="col-sm-2 col-md-2 col-lg-2">
        </div>
<div class="col-sm-2 col-md-2 col-lg-2">

   <span style="color:#000;font-size:12px;"  id="total_cost"></span>



        </div>

    </div>
</div>
<div id="list-suppliers" style="" class="profile w3-card-4">
<button data-toggle="modal" data-target="#mySuppliers" class="up-product btn btn-warning" ><i class="fa fa-user-plus"></i>New Supplier</button>
<h2 class="w3-center w3-bottombar w3-text-green w3-large">Listed Suppliers</h2>

<table style="width:100%;" class="table table-hover table-bordered  data-tableS">
				<thead>
				<tr>
        <th>
        #
        </th>
				<th>
				Supplier
				</th>
				<th>
				Email
				</th>
				<th>
				Phone
				</th>
				<th>
				Company
				</th>
       
        <th>
        Registered On
        </th>
        <th>
       
        </th>
        <th>
       
        </th>
       
				</tr>
				</thead>
				<tbody>
				
				</tbody>
				</table>
     
</div>
<div id="paid-bills" style="" class="profile w3-card-4">

<h2 class="w3-center w3-bottombar w3-text-green w3-large">Listed Paid Bills</h2>
<input type="hidden" name="data-print" id="data-print" value="all">
<div class="row" style="padding:3%;">
  <div class="col-md-5"  align="">
      <label>Select Supplier</label>
    <select class="form-control"  name="supplier_pdf" id="supplier_pdf">
                        <option value="" disabled selected></option>
                    
                    </select>
    </div>
<div class="col-md-5 con" align="right">
     <a href="{{ url('dynamic_pdf') }}" class="btn btn-primary pull-right convert">Convert into PDF</a>
    </div>
</div>
<table  id="data-paid" style="width:100%;" class="table table-hover table-bordered  data-paid">
				<thead>
        <tr>
        <th>
        #
        </th>
        <th>Supplier</th>
           <th>Amount Due</th>
           <th>Amount Paid</th>
           <th>Balance</th>
           
           <th>Added On</th>
           <th></th>
           <th></th>
				</thead>
				<tbody>
				
				</tbody>
				</table>
        
</div>
<div id="pay-bills" style="" class="profile w3-card-4">
<h2 class="w3-center w3-bottombar w3-text-green w3-large">Pay Bills</h2>

<table style="width:100%;" class="table table-hover table-bordered  pay-bills">
				<thead>
        <tr>
        <th>
        #
        </th>
        <th>Supplier</th>
           <th>Amount Due</th>
           <th>Amount Paid</th>
           <th>Balance</th>
           <th>Added On</th>
           <th>Edit Amount</th>
           <th></th>
           <th></th>
				</thead>
				<tbody>
				
				</tbody>
				</table>
        <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
     

<span><input type="text" name="total_amount" style="color:#000;font-size:24px;" class="total_amount form-control input-lg" id="total_amount" readonly/></span>

        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
        <input type="hidden" name="ids[]" class="ids">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
        <input type="hidden" name="balance[]" class="balance">
        <input type="hidden" name="amount_paid[]" class="amount_paid">
     </div>
     <div class="col-sm-2 col-md-2 col-lg-2">
     <a href="#"  id="pay_total" class="btn btn-primary pay_total">PAY</a>
     </div>
     </div>
</div>
<div id="pending-bills" style="" class="profile w3-card-4">

<h2 class="w3-center w3-bottombar w3-text-green w3-large">Listed Pending Bills</h2>

<table style="width:100%;" class="table table-hover table-bordered  data-pending">
				<thead>
				<tr>
        <th>
        #
        </th>
        <th>Supplier</th>
           <th>Amount Due</th>
           <th>Amount Paid</th>
           <th>Balance</th>
           <th>Mode</th>
           <th>MPESA Code</th>
           <th>Added On</th>
           <th></th>
           <th></th>
           <th></th>
				</tr>
				</thead>
				<tbody>
				
				</tbody>
				</table>
    
</div>
<div id="list-materials" style="" class="profile w3-card-4">
<button data-toggle="modal" data-target="#myMaterials" class="up-product btn btn-warning" ><i class="fa fa-product-hunt"></i>New Material</button>
<h2 class="w3-center w3-bottombar w3-text-green w3-large">Listed Materials</h2>

<table style="width:100%;" class="table table-hover table-bordered  data-tableM">
				<thead>
				<tr>
        <th>
        #
        </th>
				<th>
				Material Name
				</th>
			
        <th>
				Description
				</th>
        <th>
        Added On
        </th>
        <th>
        Edit
        </th>
       
       
				</tr>
				</thead>
				<tbody>
				
				</tbody>
				</table>
     
</div>
</div>

    </section>

  
@endsection