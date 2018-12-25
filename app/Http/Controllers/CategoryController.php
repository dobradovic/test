<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use DB;

class CategoryController extends Controller
{
    public function index(){
    	return view('categories.category');
    }

    public function show_all_categories(){
      return view('categories.editdelete');
    }

    public function destroy($id){
      
      $category = Category::find($id);
      
      $category->delete();

      return redirect('/category/show_all_categories')->with(['message' => 'Category deleted']);

    }

    public function edit($id){

      $category = Category::find($id);

        $category_list = DB::table('categories')
        ->orWhereNull('parent_category_id')
        ->get();
        
         return view('categories.edit',compact('category',$category,'category_list',$category_list));    

      }

      public function update(Request $request, $id){

        $category = Category::findOrFail($id);

        $category->fill($request->all());

        $category->name = $request->input('name');
        $category->code = $request->input('code');

        $category->save(); 

        return redirect()->back()->with(['category' => $category, 'message' => 'Category updated']);

      }   
    

     public function store(Request $request)
    {


       $validate = Validator::make($request->all(),[
           'name' => 'required',
           'code' => 'required',

       ]);


       if($validate->fails())
        return redirect()->back()->with(['msg' => 'You must populate inputs']);



     
        $category = Category::where('code', '=' , $request->code)->first();
       
        if($category){
            
             return redirect()->back()->withErrors(['Already have category with this CODE']);
        
        }
    	   
      //   $category = Category::create([
      //   'name' => $request->name,
      //   'name' => str_slug($request->name, '-').'-'.substr(md5(Carbon::now()), 0, 8),
      //   'code' => $request->code,
      //   'parent_category_id' => $request->parent_category_id
       
      // ]);
       
        $category=new Category($request->all());
        // dd($category);
        $category->name = $request->input('name');
        $category->slug = str_slug($request->name, '-').'-'.substr(md5(Carbon::now()), 0, 8);
        $category->code = $request->input('code');
        $category->parent_category_id = $request->input('parent_category_id');

        $category->save();
       
       return redirect('/category')->with(['message' => 'New category added']);


      
    }

     public function store_sub_category(Request $request)
    {
       $validate = Validator::make($request->all(),[
           'name' => 'required',
           'code' => 'required',

       ]);


       if($validate->fails())
        return redirect()->back()->with(['msg' => 'You must populate inputs']);


       
        $category = Category::where('code', '=' , $request->code)->first();
              
        if($category){
            
             return redirect()->back()->withErrors(['Already have CATEGORY or SUB CATEGORY with this CODE']);
        
        }
           
      //   $category = Category::create([
      //   'name' => $request->name,
      //   'name' => str_slug($request->name, '-').'-'.substr(md5(Carbon::now()), 0, 8),
      //   'code' => $request->code,
      //   'parent_category_id' => $request->parent_category_id
       
      // ]);

       
        $category=new Category($request->all());

        $category->name = $request->input('name');
        $category->slug = str_slug($request->name, '-').'-'.substr(md5(Carbon::now()), 0, 8);
        $category->code = $request->input('code');
        $category->parent_category_id = $request->input('parent_category_id');

        $category->save();
       
       return redirect('/category')->with(['message' => 'New sub category added']);


    }
}
