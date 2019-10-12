<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Validator;
use App\Suppliers;
use DB;
use DataTables;
class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

         if($request->ajax())
         {
             $data = Suppliers::latest()->get();
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
         
         return view('admin.dashboard.construction_admin',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'supplier_name' => 'required|unique:suppliers',
            'supplier_email' => 'required|unique:suppliers',
            'supplier_phone' => 'required|max:255',
            'company_name' => 'required|max:255',
           

        ],
        [
        'suppler_name.unique' => 'Supplier Name Exists,Use A Different Name',
        'supplier_email.unique' => 'Email Already Exists',
    
    ]);
        if($validator->passes())
        {
            $sites = Suppliers::Create([
                'supplier_name' => $request->supplier_name,
                'supplier_email' => $request->supplier_email,
                'supplier_phone' => $request->supplier_phone,
                'company_name' => $request->company_name,
                
               
            ]);
                return response()->json(['success' => 'New Supplier Successfully Registered']);
            }
            else
            {
                return response()->json(['error' => $validator->errors()->all()]);
            }
    }
public function fetchSuppliers()
{
    $data=DB::table('suppliers')->orderBy('id','DESC')->get();
    echo json_encode($data);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
