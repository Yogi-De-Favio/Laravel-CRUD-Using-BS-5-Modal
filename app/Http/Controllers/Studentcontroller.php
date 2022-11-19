<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\File;
use DB;

class Studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stu = Student::all();
        return view('/student',['stu'=>$stu]);

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
        $input = $request->all();
        if(isset($request->image) && $request->image !=''){
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $destinationPath = 'images/';
                $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                $input['image'] = "$profileImage";
            }
        }
        else{
            $input['image'] = 'pro3.jpg';
        }
        if(isset($request->engM) && $request->engM != ''){
            $input['engM'] = $request->engM;
        }
        else{
            $input['engM'] = 'F';
        }

        if(isset($request->tamM) && $request->tamM != ''){
            $input['tamM'] = $request->tamM;
        }
        else{
            $input['tamM'] = 'F';
        }

        if(isset($request->matM) && $request->matM != ''){
            $input['matM'] = $request->matM;
        }
        else{
            $input['matM'] = 'F';
        }

        Student::create($input);
        return redirect('/student')->with('success','Student Added Successfully...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $stu = Student::where('id','=',$id)->first();
        return $stu;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stu = Student::where('id','=',$id)->first();
        return $stu;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $stu = Student::find($request->stu_id);
        $input = $request->all();

            if($request->hasfile('image'))
            {
                $destinationPath = 'images/';
                if(File::exists($destinationPath))
                {
                    File::delete($destinationPath);
                }

                $image = $request->file('image');
                $destinationPath = 'images/';
                $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                $input['image'] = "$profileImage";
            }
            if($request->grade == "Fail"){
                $input['engM'] = 'F';
                $input['tamM'] = 'F';
                $input['matM'] = 'F';
            }


        $stu->update($input);
        return redirect('/student')->with('success','Student Update Successfully...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stu = Student::findorFail($id);
        $stu->delete();

        return response()->json(['status'=>'Student Deleted Successfully...!']);
    }
}
