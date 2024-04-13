<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subjects;
use App\Models\Study_labels;
use App\Models\Task_types;use App\Models\Level_study;use App\Models\Grades;use App\Models\Referencing;

class HomeController extends Controller
{
   public function index(){
        $data['subjects']   =   Subjects::orderBy('subject_name','ASC')->get()->toArray();        
		//$data['topics']     =   Study_labels::orderBy('id','desc')->get()->toArray();
		$data['task_types'] =   Task_types::where('website_type','Essay Help')->orderBy('id','desc')->get()->toArray();       $data['levels']     =   Level_study::where('website_type','Essay Help')->orderBy('id','desc')->get()->toArray();     $data['grades']     =   Grades::orderBy('id','desc')->get()->toArray();
		$data['referencings']     =   Referencing::orderBy('id','desc')->get()->toArray();
        return view('home',$data);
   }
   public function dateformat(){
		echo date('jS F, Y',strtotime($_GET['date']));
		die;
   }
   public function why_us(){
    return view('why_us');
   }
   public function refer_friend(){
    return view('refer_friend');
   }
   public function faq(){
      $data = array();
      return view('faq',$data);
  }
  public function services()
  {
       return view('services');
  }
  public function dissertation_writing_service()
  {
      return view('dissertation_service');
  }
  public function research_writing_service()
  {
       return view('Research_writing_service');
  }
  public function term_writing_service()
  {
       return view('term_writing_service');
  }
  public function admission_writing_service()
  {
       return view('Admission_writing_service');
  }
   public function edit_my_essay()
  {
       return view('Edit_my_essay');
  }
  public function coursework_writing_service()
  {
      return view('Coursework_writing_service');
  }
   public function physics_help()
  {
      return view('physics_help');
  }
  public function research_paper_online()
  {
      return view('research_paper_online');
  }
   public function dissertation_online()
  {
      return view('dissertation_online');
  }
}
