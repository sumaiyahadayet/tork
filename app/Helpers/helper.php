<?php

function Categories(){

  return $categories=DB::table('category')->where('deleted_at',null)->orderBy('order','ASC')->get();

}
function Category($category_id){

  return $category=DB::table('category')->where('id',$category_id)->first();

}
function Portfoilo(){

  return $portfolio=DB::table('portfolio')->orderBy('order','ASC')->get();

}
function team(){

  return $team=DB::table('team')->orderBy('ordr','ASC')->get();

}
function Projects(){

  return $projects=DB::table('projects')->get();

}
function About(){

  return $about=DB::table('about')->get();

}
function Section2(){

  return $section2=DB::table('section2')->orderBy('order','ASC')->get();

}
