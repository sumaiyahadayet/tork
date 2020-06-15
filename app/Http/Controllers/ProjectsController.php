<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use File;
use Intervention\Image\Facades\Image;
class ProjectsController extends Controller
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

      $projects=DB::table('projects')->get();

      return view('admin.projects.index')->with('data',$projects);

    }

    public function AddView(){

    // $categories=DB::table('category')->where('deleted_at',null)->orderBy('order','ASC')->get();

    // return view('admin.portfolio.new')->with('categories',$categories);

    return view('admin.projects.new');

    }

    public function AddProjects(Request $req){

      $imageb=$req->imageb;

              $pathb="portfolio/".Str::random(15).".".$imageb->getClientOriginalExtension();
              $imgb = Image::make($imageb);
              $imgb->save($pathb);
              $images=$req->images;

              if($images!=''){

                     $paths="portfolio/".Str::random(15).".".$images->getClientOriginalExtension();
                     $imgs = Image::make($images);
                     $imgs->save($paths);
                }
         // return "Success..";

         // return dd($req->all());

         // return $req->except('_token');

         DB::table('projects')->insert([

              'id' => $req->id,
               'imageb' => $pathb,
              'urlb' => $req->urlb,
              'images' => $paths,
            'urls' => $req->urls,
              'type' => $req->type,
              'order' => $req->order,

          ]);

          return redirect('/admin/projects');

    }

    public function Edit(Request $req,$id){

        $projects=DB::table('projects')->where('id',$id)->first();
        return view('/admin.projects.update')->with('data',$projects);

    }

    public function Update(Request $req){


      // return dd($req->all());

      $old_imageb=$req->old_imageb;
      $pathb=$old_imageb;
      $imageb=$req->imageb;

           if($imageb!=''){

              $pathb="portfolio/".Str::random(15).".".$imageb->getClientOriginalExtension();
              $imgb = Image::make($imageb);
              $imgb->save($pathb);
              if(File::exists($old_imageb)){
                File::delete($old_imageb);
              }

            }
            $old_images=$req->old_images;
            $paths=$old_images;
            $images=$req->images;

                 if($images!=''){

                    $paths="portfolio/".Str::random(15).".".$images->getClientOriginalExtension();
                    $imgs = Image::make($images);
                    $imgs->save($paths);

                    if(File::exists($old_images)){
                      File::delete($old_images);
                    }

                  }

         DB::table('projects')->where('id',$req->id)->update([

           'urls' => $req->urls,
           'imageb' => $pathb,
           'urlb' => $req->urlb,
           'images' => $paths,
           'type' => $req->type,
          ]);

          return redirect('/admin/projects');

    }
    public function Delete($id){


            DB::table('projects')->where('id',$id)->delete();

          return redirect('/admin/projects');

    }

}
