<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Exports\BillsExport;
use Validator;
use App\Bills;
use App\Payments;
use App\BillsDetails;
use DB;
use DataTables;
use Excel;
use Carbon\Carbon;
use PDF;
class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //

        if($request->ajax())
        {
           
            if(!empty($request->from_date) && empty($request->supplier))
            {
                
                
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->whereBetween('date_added',array($request->from_date,$request->to_date))->get();
           
            }
            else if(!empty($request->supplier) && empty($request->from_date))
            {
                $supplier=$request->supplier;
                
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->where('bills.supplier_name','=',$supplier)->get();
            
            }
            else if(!empty($request->supplier) && !empty($request->from_date))
            {
                $supplier=$request->supplier;
                
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->whereBetween('date_added',array($request->from_date,$request->to_date))
                ->where('bills.supplier_name','=',$supplier)->get();
            
            }
            else if(!empty($request->paid))
            {
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->where('balance','<=',0)
                ->get(['bills.*','bills_details.*']);
            }
            else if(!empty($request->pending))
            {
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->where('balance','>',0)
                ->get(['bills.*','bills_details.*']);
            }
            else
            {
                //echo $request->from_date;
                //$data = DB::table('bills')
                //->join('payments','payments.ref_no', '=', 'bills.ref_no')
                //->select('bills.*','payments.*')->get();
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')

                ->get(['bills.*','bills_details.*']);
                /*
                $data2 = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
               
                ->select('bills_details.*')
                
                ->get();
                */
                //$id2= $data2->id;
            
            
        }
       /*
        
       */
 
        return Datatables::of($data)->addIndexColumn()
            ->addColumn('edit',function($row){
                $btn=' <div class="dropdown">
                
                <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Action
               </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"> <a  href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->ref_no.'" data-id="'.$row->id.'" data-original-title="Edit" class="edit editBill">Edit</a></li>
                  <li role="presentation"><a  href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->ref_no.'" data-id="'.$row->id.'" data-original-title="Delete" class="deleteBill">Remove</a></li>
                  
                 
       
                </ul>
              </div> ';
            
            return $btn;
        })
        ->rawColumns(['edit'])
        
        ->make(true);
    }
    
        return view('admin.dashboard.construction_admin',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending(Request $request)
    {
        //
         
        if($request->ajax())
        {
            $data = Payments::latest()->where('balance','>',0)->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('edit',function($row){
                $btn='';
            
            return $btn;
        })
        ->addIndexColumn()
        ->addColumn('delete',function($row2){
          $btn2 = ' ';
        return $btn2;
      })
        ->rawColumns(['edit','delete'])
        
        ->make(true);
        }
        return $data;
         
         return view('admin.dashboard.construction_admin',compact('dat'));
    }
    public function paid(Request $request)
    {
        //
         
        if($request->ajax())
        {
            if(!empty($request->supplier))
            {
                $supplier = $request->supplier;
            $data = DB::table('bills')
            ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
            ->select('bills.*','bills_details.*')->where('bills_details.balance','=',0)
            ->where('bills.supplier_name','=',$supplier)->get();
            }
            else
            {
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->select('bills.*','bills_details.*')->where('bills_details.balance','=',0)->get();  
            }
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('edit',function($row){
                $btn='';
            
            return $btn;
        })
        ->addIndexColumn()
        ->addColumn('delete',function($row2){
          $btn2 = '';
        return $btn2;
      })
        ->rawColumns(['edit','delete'])
        
        ->make(true);
        }
        return $data;
         
         return view('admin.dashboard.construction_admin',compact('dat'));
    }
    public function printExcel()
    {
        $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
               
                ->select('bills.*','bills_details.*')
                
                ->get()->toArray();
                $supplier_array[] = array('Supplier','Material','Description','Site','Ref NO','Added on','unit cost','quantity','vat','total cost');
                foreach($data as $dat)
                {
                    $supplier_array[]=array('Supplier' => $dat->supplier_name,
                    'Material' => $dat->item,
                    'Description' => $dat->description,
                    'Site' => $dat->site_name,
                    'Ref No' => $dat->ref_no,
                    'Added on' => $dat->date_added,
                    'unit cost' => number_format($dat->price),
                    'quantity' => number_format($dat->quantity),
                    'vat' => number_format($dat->vat),
                    'total cost' => number_format($dat->total_cost)
                );


                }
                Excel::create(date('Y,m,d').' All Suppliers Data', function($excel) use ($supplier_array){
                    $excel->setTitle(date('Y,m,d').' All Suppliers Data');
                    $excel->sheet(date('Y,m,d').' All Suppliers Data', function($sheet) use ($supplier_array){
                     $sheet->fromArray($supplier_array, null, 'A1', false, false);
                    });
                   })->download('xlsx');
    }
    public function SupplierData(Request $request)
    {
        
        //$supplier=$_POST['id'];
        if($request->ajax())
        {
            $data = Bills::latest()->take(1)->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('edit',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBill">Edit</a>';
            
            return $btn;
        })
        ->addIndexColumn()
        ->addColumn('delete',function($row2){
          $btn2 = ' <a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row2->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBill">Remove</a>';
        return $btn2;
      })
        ->rawColumns(['edit','delete'])
        
        ->make(true);
        }
        return $data;
    }
   
 public function convert_customer_data_to_html(Request $request)
    {
       // $supplier = $_GET['supplier'];
        if($request->supplier)
        {
            $supplier_name=$request->supplier;
            $data= DB::table('bills')
            ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
            ->select(DB::raw('SUM(total_cost) AS total'))->where('supplier_name',$supplier_name)->first();
              $total=$data->total;
              $data1= DB::table('bills')
              ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
              ->select(DB::raw('SUM(amount_paid) AS paid'))->where('supplier_name',$supplier_name)->first();
                $paid=$data1->paid;
              
            $supplier = $request->supplier;
            $customer_data = DB::table('bills')
     ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
     ->select('bills.*','bills_details.*')->where('supplier_name','=',$supplier)->get();
   
    }
        else
        { 
            $supplier = "All Suppliers ";
            $customer_data = DB::table('bills')
            ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
            ->select('bills.*','bills_details.*')->get();
          
        }
    
        $output = '<body style="font-family: Verdana, Arial, sans-serif;">
        <div class="information" style="background-color: #60A7A6;color: #FFF;">
        <h3 style="color:#000;text-align:center;border-bottom-color: rgb(170, 50, 220, .6);">EASTLINE COMPANY LIMITED </h3>
    <table style="font-size: x-small;padding: 10px;" width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3> ' . $supplier . '</h3>
                <pre>
Street 15
123456 Kenya
Nairobi Eastleigh
<br /><br />
Date: '. date("l jS \of F Y h:i:s A") .'
Identifier: #'. rand() .'

</pre>


            </td>
            <td align="center">
                <img src="public/uploads/maurer-1020143_640.jpg" alt="Logo" width="64" class="logo"/>
            </td>
            
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
<h3 style="margin-left: 15px;text-align:center;">' . $supplier . ' Invoice Details</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px; margin: 15px;">
         <thead>
        <tr style="font-weight: bold; font-size: x-small;">
       <th style="border: 1px solid; padding:12px;" width="30%">Amount Due</th>
       <th style="border: 1px solid; padding:12px;" width="15%">Amount Paid</th>
       <th style="border: 1px solid; padding:12px;" width="15%">Balance</th>
       <th style="border: 1px solid; padding:12px;" width="15%">Status</th>
      </tr>
      </thead>
      <tbody>
        ';  
        foreach($customer_data as $customer)
        {
            $balance = $customer->balance;

            if($balance >0)
            {
                $status = 0;
                $status = "<span style='color:red;'>Pending</span>";
            }
            else if($balance <= 0)
            {
               $status = "<span style='color:green;'>Paid</span>";
            }
         $output .= '
         <tr style="font-weight: bold; font-size: x-small;">
         
          <td style="border: 1px solid; padding:12px;">Kshs '.number_format($customer->total_cost).'</td>
          <td style="border: 1px solid; padding:12px;">Kshs '.number_format($customer->amount_paid).'</td>
          <td style="border: 1px solid; padding:12px;">Kshs '.number_format($customer->balance).'</td>
          <td style="border: 1px solid; padding:12px;">'.$status.'</td>
         </tr>
         ';
        }
        $output .= '</tbody> <tfoot style="font-weight: bold; font-size: x-small;">
        <tr>
            <td colspan="1"></td>
            <td align="left">Total Kshs '. number_format($total) .'</td>
            <td align="left" class="gray">Amount Due Kshs '. number_format($paid) .'</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tfoot></table></div>
        
<div class="information" style="position: absolute; bottom: 0;">
<table width="100%">
    <tr>
        <td align="left" style="width: 50%;">
            &copy; {{  ' . date('Y') . ' }} {{ ' . config('app.url') . ' }} All rights reserved.
        </td>
        <td align="right" style="width: 50%;">
            Company Slogan
        </td>
    </tr>

</table>
</div>'; 
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($output);
     return $pdf->stream();
    }
    public function create()
    {
        //
    }
    public function exportExcel(Request $request)
    {
        $sup=$request->supplier;
        $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
               
                ->select('bills.*','bills_details.*')
                ->where('bills.supplier_name','=',$sup)
                ->get()->toArray();
                $supplier_array[] = array('Supplier','Material','Description','Site','Ref NO','Added on','quantity','unit cost','vat','total cost');
                foreach($data as $dat)
                {
                    $supplier_array[]=array('Supplier' => $dat->supplier_name,
                    'Material' => $dat->item,
                    'Description' => $dat->description,
                    'Site' => $dat->site_name,
                    'Ref No' => $dat->ref_no,
                    'Added on' => $dat->date_added,
                    'quantity' => number_format($dat->quantity),
                    'unit cost' => number_format($dat->price),
                    
                    'vat' => number_format($dat->vat),
                    'total cost' => number_format($dat->total_cost)
                );


                }
                Excel::create('Suppliers Details', function($excel) use ($supplier_array){
                    $excel->setTitle('Supplier Details');
                    $excel->sheet('Supplier Details', function($sheet) use ($supplier_array){
                     $sheet->fromArray($supplier_array, null, 'A1', false, false);
                    });
                   })->download('xlsx');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function fetchVat(Request $request)
    {
        $supplier = $request->name;
        if(!empty($supplier) && empty($request->from_date))
        {
        $data= DB::table('bills_details')->select(DB::raw('SUM(vat) AS total_vat,SUM(total_cost) AS total'))->where('supplier',$supplier)->get();
        $count= DB::table('bills_details')->select(DB::raw('SUM(vat) AS total_vat'))->where('supplier',$supplier)->count();
        if($count>0)
        {
            echo json_encode($data);
        }
      }
    else if(!empty($request->from_date) && empty($supplier))
            {
                
                
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->whereBetween('date_added',array($request->from_date,$request->to_date))->sum('bills_details.vat');
                echo $data;
            }
            else if(!empty($supplier) && !empty($request->from_date))
            {
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->whereBetween('date_added',array($request->from_date,$request->to_date))
                ->where('supplier',$supplier)
                ->sum('bills_details.vat');
            }
        else
        {
            $data = DB::table('bills_details')->sum('bills_details.vat');
            echo $data;
        }
    
}
    public function fetchTotal(Request $request)
    {
        $supplier=$request->supplier;
        if(!empty($supplier) && empty($request->from_date))
        {
            $data = DB::table('bills')
            ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
            ->where('bills.supplier_name',$supplier)
            ->sum('bills_details.total_cost');
        $count= DB::table('bills')
        ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no') 
        ->select(DB::raw('SUM(total_cost) AS total'))->where('bills.supplier_name',$supplier)->count();
        if($count>0)
        {
            echo "One";
            echo "Total Cost Kshs<strong style='font-size:18px'> " .  number_format($data) . "</strong>";

        }
    }
   else  if(!empty($request->from_date) && empty($supplier))
            {
                
                //echo "One";
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->whereBetween('date_added',array($request->from_date,$request->to_date))->sum('bills_details.total_cost');
                echo "Total Cost Kshs<strong style='font-size:18px'> " .  number_format($data) . "</strong>";

            }
            else if(!empty($request->from_date) && !empty($supplier))
            { 
               // echo "Both data and supplier";
                $data = DB::table('bills')
                ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
                ->whereBetween('date_added',array($request->from_date,$request->to_date))
                ->where('bills.supplier_name',$supplier)
                ->sum('bills_details.total_cost');
                echo "Total Cost Kshs<strong style='font-size:18px'> " .  number_format($data) . "</strong>";
            }
        else
        {
            $data = DB::table('bills')
            ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
            ->sum('bills_details.total_cost');
            echo "Total Cost Kshs<strong style='font-size:18px'> " .  number_format($data) . "</strong>";

        }
     
    }
    public function store(Request $request)
    {
        //
          //

          $validator = Validator::make($request->all(),[
            'mat' => 'required|max:255',
            'supplier' => 'required|max:255',
            'quantity' => 'required|max:255',
            'unit_cost' => 'required|max:255',
            'ref_no' => 'required|max:255|unique:bills',
            'site_name' => 'required|max:255',
            'description' => 'required|max:255',

          ],
          [
            'ref_no.unique' => 'Ref Number Already Exists'
        ]);

        if($validator->passes())
        {
            //Bills::find();
         // $check = Bills::where('ref_no','=',$request->ref_no)->first();
            $bills = Bills::Create([
                
                'supplier_name' => $request->supplier,
                'site_name' => $request->site_name,
                'ref_no' => $request->ref_no,
                'date_added' => $request->date_added
               
            ]);
            $item = $request->mat;
            for($count=0;$count < count($item);$count++)
            {
                $unit_cost = $request->unit_cost[$count];
                $quantity = $request->quantity[$count];
                $total = $unit_cost * $quantity;
                $vat = 16/100 * $total;
                $total_cost = $total + $vat;
                $amount_paid=0;
                //$random= rand();
                //$id_bill= substr(0,4,$random);
                $data =array(
                    
                    'item' => $request->mat[$count],
                    'price' => $request->unit_cost[$count],
                    'quantity' => $request->quantity[$count],
                    'description' => $request->description[$count],
                    'ref_no' => $request->ref_no,
                    'total_cost' => $total_cost,
                    'balance' => $total_cost,
                    'amount_paid' => $amount_paid,
                    'vat' => $vat

                );
                $insert_data[] = $data;
            }
            BillsDetails::insert($insert_data);
                return response()->json(['success' => 'New Bill Successfully Registered']);
            }
            else
            {
                return response()->json(['error' => $validator->errors()->all()]);
            }

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ids= explode('_',$id);
        $bill = Bills::join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
        ->where('bills_details.id','=',$ids[1])
            ->first();
        /*
        $bill = DB::table('bills')
        ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
       
        ->select('bills.*','bills_details.*')
        ->where('bills.id','=',$ids[0])
        ->where('bills_details.bills_id','=',$ids[1])
        ->get();
        */
        return response()->json($bill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewPayment(Request $request)
    {
        $ref_no = $request->ref_no;
        $data = DB::table('bills')
        ->join('payments','payments.ref_no', '=', 'bills.ref_no')
        ->select('bills.*','payments.*')->where('bills.ref_no',$ref_no)->get();
        echo json_encode($data);

    }
    public function allBills(Request $request)
    {
        
        if($request->ajax())
        {
            $data = DB::table('bills')
            ->join('bills_details','bills_details.ref_no', '=', 'bills.ref_no')
            ->select('bills.*','bills_details.*')->where('bills_details.balance','>',0)->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('edit',function($row){
                $btn='<input type="checkbox" class="add-payment" id="'.$row->id.'"  value="'.$row->balance.'" name="select-pay"><input type="text" style="" class="change-amount" value="'.$row->balance.'"  name="'.$row->id.'">';
            
            return $btn;
        })
        ->addIndexColumn()
        ->addColumn('delete',function($row2){
          $btn2 = '';
        return $btn2;
      })
      ->addIndexColumn()
        ->addColumn('new',function($row3){
          $btn3 = '<span><a><i class="fa fa-pencil"></i></a></span>';
        return $btn3;
      })
        ->rawColumns(['edit','delete'])
        
        ->make(true);
        }
        return $data;
    }
    public function payMultiple(Request $request)
    {
       if(!empty($request->total) && !empty($request->balance) && !empty($request->ids))
       {
           //echo $request->ids;
          // $total = $request->total;
           //$balance = array($request->balance);
           $ids =  $request->ids;
          //$ids = array();
         // $new_ids =array_push($ids,$request->ids);
          // print_r($new_ids);
          //$new_ids = array_map('intval',$ids);
          $arr =explode(",",$ids);
          $balance = explode(",", $request->balance);
          $new_ids = array_walk($arr,'intval');
          //echo count($arr);
        // print_r($new_ids);
        /*
            for($i=0;$i<count($arr);$i++)
           {
               echo $arr[$i]  . '<br>';
           }
           */
          //echo $ids . '<br>' ;
         // echo $balance;
           //$new_ids=array_push($elements,$ids)
           
           for($i=0;$i<count($arr);$i++)
           {
             //  echo $id ;
            // Model::firstOrFail()->where('something', $value)
             //$bill = BillsDetails::where('bills_id','=',$arr[$i])->first();
             $bill = BillsDetails::find($arr[$i]);
                   //echo $bal. '<br>';
                   
                 
                       
                        $amount_paid  = $bill->amount_paid;
                       // echo $amount_paid;
                        $amount_due = $bill->total_cost - $balance[$i];
                       $total_paid = $amount_paid + $balance[$i];
                       $new_balance = $bill->total_cost - $total_paid;
                      // echo "New Balance" . $new_balance . '<br>';
                       //echo "Total Paid " . $total_paid . '<br>';
                       
                    $form_data=array(
                        'balance' => $new_balance,
                        'amount_paid' => $total_paid,
                      );
                      
                      
                   $insert_data[] = $form_data;
                   BillsDetails::where('id','=',$arr[$i])->update($form_data);
              // 

           }
          

           
       }
    }
    public function addPayment(Request $request)
    {
        if(empty($request->mpesa_code))
                    {
                        $mpesa_code="Not Applicable";
                    }
                    else
                    {
                        $mpesa_code = $request->mpesa_code;
                    }
        $balance = $request->balance;
        $supplier_id = $request->hidden_payid;
        $supplier = $request->hidden_pay;
        $amount_due = $request->amount_due;
        $amount_paid = $request->amount_paid;
        $new_balance = $balance - $amount_paid;
        if($new_balance<=0)
        {
            echo "Paid";
        }
        else
        {
           
           
                if($request->hidden_pay)
                {
                    $mpesa_code="Not Applicable";
                    $mpesa_code = $request->mpesa_code;
                    $payments = Payments::Create([
                        'supplier_name' => $request->hidden_pay,
                        'amount_due' => $amount_due,
                        'amount_paid' => $amount_paid,
                        'balance' => $new_balance,
                        'mode_payment' => $request->mode,
                        'mpesa_code' => $mpesa_code,
                        'ref_no' => $request->hidden_refno,
                        'date_add' => date('Y-m-d')
                       
                    ]);
                }
                if($request->hidden_pay)
                {
  $form_data=array(
                    'balance' => $new_balance,
                    'amount_paid' => $request->amount_paid,
                  );
                Bills::whereId($supplier_id)->update($form_data);
                }
              
            
            
          return response()->json(['success' => 'Payment Successfully Added']);
        }
        
    }
    public function update(Request $request)
    {
        //
        $validator=  Validator::make($request->all(),[
            'matu' => 'required|max:255',
            'supplieru' => 'required|max:255',
            'quantityu' => 'required|max:255',
            'unit_costu' => 'required',
            'ref_nou' => 'required',
            'site_nameu' => 'required',
            'descriptionu' => 'required',
            'date_addedu' => 'required'
            
      ]);
    if($validator->passes())
    {
      $form_data=array(
        //'material' => $request->matu,
        'supplier_name' => $request->supplieru,
       // 'quantity' => $request->quantityu,
       // 'unit_cost' => $request->unit_costu,
        'ref_no' => $request->ref_nou,
        'site_name' => $request->site_nameu,
        'date_added' => $request->date_addedu,
      );

      $unit_cost = $request->unit_costu;
                $quantity = $request->quantityu;
                $total = $unit_cost * $quantity;
                $vat = 16/100 * $total;
                $total_cost = $total + $vat;
                //$amount_paid=0;
                $data_bills =array(
                    'item' => $request->matu,
                    'price' => $request->unit_costu,
                    'quantity' => $request->quantityu,
                    'description' => $request->descriptionu,
                    'ref_no' => $request->ref_nou,
                    'total_cost' => $total_cost,
                    'balance' => $total_cost,
                    'vat' => $vat
                );
      Bills::whereId($request->hidden_id)->update($form_data);
      BillsDetails::where('id','=',$request->hidden_details)->update($data_bills);
      return response()->json(['success' => 'Data Successfully Updated']);
    }
    else
        {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ids= explode('_',$id);
        $data = Bills::find($ids[0]);
         $data->delete();
         $data1 = BillsDetails::where('bills_id','=',$ids[1]);
         $data1->delete();
    }
}
