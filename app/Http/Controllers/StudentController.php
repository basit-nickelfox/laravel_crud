<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return student::all();
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
       
    
         
      $rules=array(
            'name'         =>'required',
            'contact'         =>'required',
            'email'         =>'required',
            'image'         =>'required|image',
            'department'    =>'required',
            'address'       =>'required',
          );
          $error=Validator::make($request->all(),$rules);
           if($error->fails()){
               return response()->json(['errors'=>$error->errors()->all()]);
           }
           $image = $request->file('image');
           $new_image_name =rand() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('images'),$new_image_name);
           $form_Data=array(
             'name'      => $request->name,  
             'phone'     => $request->contact,  
             'email'     => $request->email,    
             'image'     => $new_image_name,   
             'department'=> $request->department,
             'address'   => $request->address,
           );
           Student::create($form_Data);
           return response()->json(['success'=>'Data Added successfully']);
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
