<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|string|max:25",
            "location"=>"required",
            "state"=> "required",
            "desc"=>"nullable|string|max:100",
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->location = $request->location;
        $brand->state = $request->state;
        $brand->desc = $request->desc;
        $brand->save();
        return response()->json(['msg'=>'success']);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'location'=> 'required',
            'state'=> 'required',
            'desc'=> 'nullable',
            ]);
            $brand = Brand::find($id);
            $brand->name = $request->name;
            $brand->location = $request->location;
            $brand->state = $request->state;
            $brand->desc = $request->desc;
            $brand->save();
            return response()->json(['msg'=> 'success']);
        }
        public function destroy($id)
        {
            $brand = Brand::find($id);
            $brand->delete();
            return response()->json(['msg'=> 'success']);
        }
        public function index($id = null)  {  
            if($id){
            $brand = Brand::find($id);
            }else{
            
            $brand = Brand::all();
            }
            return $brand;
        }
        public function patch(Request $request,$id)
        {
            $request->validate([
                'name'=> 'required',
                'location'=> 'required',
                'state'=> 'required',
            ]);
            $brand = Brand::find($id);
            $brand->name = $request->name;
            $brand->location = $request->location;
            $brand->state = $request->state;
            $brand->desc = $request->desc;
            $brand->save();
            return response()->json(['msg'=> 'success']);
                    
        }
}

