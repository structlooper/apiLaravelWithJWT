<?php

namespace App\Http\Controllers;

use App\value;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
    public function category()
    {
        $dataDb = value::all();
        return view('admin.category.categoryPage')->with('dataDb',$dataDb);
    }
    public function addingValues(request $request)
    {
        $rules = [
            'source' => 'required|max:30|',
            'category' => 'required|max:30|',
        ];
        $msg = [
            'required' => 'The field is required must have to fill',
            'max' => 'Maximum charactor extended',
        ];
        $this->validate($request, $rules, $msg);
        $data = new value();
        $data->source = $request->input('source');
        $data->category = $request->input('category');
        $data->save();
        $dataDb = value::all();
        return redirect('category')->with('status','Data Saved succesfully')->with('dataDb',$dataDb);
    }
    public function deleting($id)
    {
        $dataDb = value::all();
        $data = value::find($id);
                if (is_null($data)) {
                    return redirect('category')->with('error',"Please enter a valid id");
                }
        $data->delete();
        return redirect('category')->with('status','Data Deleted succesfully')->with('dataDb',$dataDb);
    }
    public function showData($id)
    {
        $data = Value::find($id);
        return $data;
    }
    public function updateValues(request $request,$id)
    {
        $data = Value::find($id);
        $data->source = $request->input('source') ?? $data->source;
        $data->category = $request->input('category') ?? $data->category;
        $data->update();
        return redirect()->back()->with('status','data updated successfully');
        
    }
}
