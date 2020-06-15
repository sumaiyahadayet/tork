<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use File;
use Intervention\Image\Facades\Image;
class AboutController extends Controller
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

      $about=DB::table('about')->where('deleted_at',null)->get();

      return view('admin.about.index')->with('data',$about);

    }

    public function AddView(){

    // $categories=DB::table('category')->where('deleted_at',null)->orderBy('order','ASC')->get();

    // return view('admin.portfolio.new')->with('categories',$categories);

    return view('admin.about.new');

    }

    public function AddAbout(Request $req){


         DB::table('about')->insert([

              'id' => $req->id,
              'url' => $req->url,
             'description'=> $req->description,

          ]);

          return redirect('/admin/about');

    }

    public function Edit(Request $req,$id){

        $about=DB::table('about')->where('id',$id)->first();
        return view('/admin.about.update')->with('data',$about);

    }

    public function Update(Request $req){


      // return dd($req->all());




         DB::table('about')->where('id',$req->id)->update([

              'id' => $req->id,
             'url' => $req->url,
            'decription'=> $req->description,

          ]);

          return redirect('/admin/about');

    }
    public function Delete($id){

  DB::table('about')->where('id',$id)->delete();

          return redirect('/admin/about');

    }

}
