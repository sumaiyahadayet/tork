<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use File;
use Intervention\Image\Facades\Image;
class PortfolioController extends Controller
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

      $portfolio=DB::table('portfolio')->where('deleted_at',null)->orderBy('order','ASC')->get();

      return view('admin.portfolio.index')->with('data',$portfolio);

    }

    public function AddView(){

    // $categories=DB::table('category')->where('deleted_at',null)->orderBy('order','ASC')->get();

    // return view('admin.portfolio.new')->with('categories',$categories);

    return view('admin.portfolio.new');

    }

    public function AddPortfolio(Request $req){

      $image=$req->image;

              $path="portfolio/".Str::random(15).".".$image->getClientOriginalExtension();
              $img = Image::make($image);
              $img->save($path);

         // return "Success..";

         // return dd($req->all());

         // return $req->except('_token');

         DB::table('portfolio')->insert([

              'id' => $req->id,
              'url' => $req->url,
              'image' => $path,
              'category' => $req->category,

          ]);

          return redirect('/admin/portfolio');

    }

    public function Edit(Request $req,$id){

        $portfolio=DB::table('portfolio')->where('id',$id)->first();
        return view('/admin.portfolio.update')->with('data',$portfolio);

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


         DB::table('portfolio')->where('id',$req->id)->update([

           'url' => $req->url,
           'image' => $path,
           'category' => $req->category,
              'order' => $req->order,
          ]);

          return redirect('/admin/portfolio');

    }
    public function Delete($id){

  DB::table('portfolio')->where('id',$id)->delete();

          return redirect('/admin/portfolio');

    }

}
