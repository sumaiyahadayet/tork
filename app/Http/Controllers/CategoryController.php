<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use File;
use Intervention\Image\Facades\Image;
class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

      $category=DB::table('category')->where('deleted_at',null)->orderBy('order','ASC')->get();

      return view('admin.category.index')->with('data',$category);

    }

    public function AddView(){


      return view('admin.category.new');

    }

     public function AddCategory(Request $req){
    //
    //   $image=$req->image;
    //
    //           $path="portfolio/".Str::random(15).".".$image->getClientOriginalExtension();
    //           $img = Image::make($image);
    //           $img->save($path);
    //
    //      // return "Success..";
    //
    //      // return dd($req->all());
    //
    //      // return $req->except('_token');
    //
          DB::table('category')->insert([

              'title' => $req->title,
              'order' => $req->order,

          ]);

           return redirect('/admin/category');

     }

    public function EditView(Request $req,$category_id){

        $id=DB::table('category')->where('id',$category_id)->first();

        return view('/admin.category.update')->with('data',$id);

    }

    public function Update(Request $req){
    //
    //   // return dd($req->all());
    //
    //   $old_image=$req->old_image;
    //   $path=$old_image;
    //   $image=$req->image;
    //
    //        if($image!=''){
    //
    //           $path="portfolio/".Str::random(15).".".$image->getClientOriginalExtension();
    //           $img = Image::make($image);
    //           $img->save($path);
    //           if(File::exists($old_image)){
    //             File::delete($old_image);
    //           }
    //
    //         }
    //
    //
         DB::table('category')->where('id',$req->id)->update([

           'title' => $req->title,
           'order' => $req->order,

          ]);

          return redirect('/admin/category');

    }


    public function Delete($id){
          // Hard Delete

         // DB::table('portfolio')->where('serial',$id)->delete();

         // Soft Delete


         DB::table('category')->where('id',$id)->update([

           'deleted_at' =>  date("Y-m-d H:i:s"),

          ]);

          return redirect('/admin/category');

    }

}
