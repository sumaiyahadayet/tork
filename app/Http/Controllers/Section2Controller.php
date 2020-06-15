<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use File;
use Intervention\Image\Facades\Image;
class Section2Controller extends Controller
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

      $section2=DB::table('section2')->where('deleted_at',null)->orderBy('order','ASC')->get();

      return view('admin.section2.index')->with('data',$section2);

    }

    public function AddView(){

    // $categories=DB::table('category')->where('deleted_at',null)->orderBy('order','ASC')->get();

    // return view('admin.section2.new')->with('categories',$categories);

    return view('admin.section2.new');

    }

    public function AddSection2(Request $req){

      $image=$req->image;

              $path="portfolio/".Str::random(15).".".$image->getClientOriginalExtension();
              $img = Image::make($image);
              $img->save($path);

         // return "Success..";

         // return dd($req->all());

         // return $req->except('_token');

         DB::table('section2')->insert([

              'id' => $req->id,

              'image' => $path,
               'title' => $req->title,
                'order' => $req->order,

          ]);

          return redirect('/admin/section2');

    }

    public function Edit(Request $req,$id){

        $section2=DB::table('section2')->where('id',$id)->first();
        return view('/admin.section2.update')->with('data',$section2);

    }

    public function Update(Request $req){


      // return dd($req->all());

      $old_image=$req->old_image;
      $path=$old_image;
      $image=$req->image;

           if($image!=''){

              $path="portfolio/".Str::random(15).".".$image->getClientOriginalExtension();
              $img = Image::make($image);
              $img->save($path);
              if(File::exists($old_image)){
                File::delete($old_image);
              }

            }


         DB::table('section2')->where('id',$req->id)->update([

              'id' => $req->id,

            'image' => $path,
              'title' => $req->title,
               'order' => $req->order,
          ]);

          return redirect('/admin/section2');

    }
    public function Delete($id){

  DB::table('section2')->where('id',$id)->delete();

          return redirect('/admin/section2');

    }

}
