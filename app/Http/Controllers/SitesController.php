<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Sites;
use DB;
use DataTables;
class SitesController extends Controller
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
            $data = Sites::latest()->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('edit',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
            
            return $btn;
        })
        ->addIndexColumn()
        ->addColumn('delete',function($row2){
          $btn2 = ' <a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row2->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteSite">Remove</a>';
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
    public function fetchSites()
    {
        $data=DB::table('sites')->get(['site_name']);
        echo json_encode($data);
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
            'site_name' => 'required|max:255',
            'location' => 'required|max:255',
            'owner' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'id_no' => 'required|max:255',

        ]);
        if($validator->passes())
        {
            $sites = Sites::Create([
                'site_name' => $request->site_name,
                'location' => $request->location,
                'owner' => $request->owner,
                'phone' => $request->phone,
                'email' => $request->email,
                'id_no' => $request->id_no,
               
            ]);
                return response()->json(['success' => 'New Site Successfully Registered']);
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
         //
         $data = Sites::findOrFail($id);
         $data->delete();
    }
}
