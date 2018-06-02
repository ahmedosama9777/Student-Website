<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\project;
use App\student;
use App\user;


class ProjectController extends Controller
{

    public function addpage(){                        //Adding project Form Page

        return view('addproject');
    }
    
    public function addproject(Request $Request)
        {

        $Project = new project();

        $Project->name = $Request['name'];
        $Project->description = $Request['description'];
        $Project->details = $Request['details'];
        $Project->student_id = Auth::user()->id;


        
        
            $UserId = Auth::user()->id;
            $FileExt = $Request['file']->getClientOriginalExtension();
            
            $MyTime =  date('Y_m_d  H_i_s');                            // getting the  date and time .

            $FileName = $UserId."_".$MyTime.".".$FileExt;           // File name is userID + the data&time + file extension
            $Request['file']->move( 'uploads/project' , $FileName );  // move the file to a specific directory
            
            $Project->file_name = $FileName;
          
              $Project->save();
        
            return redirect('/home');
        
    }

    public function showprojects($Id = null)
    {
        if ( $Id == null )                                      // That case if the user is openening his projects
        {
            $Projects = student::find( Auth::user()->id )->projects;    // Search in the students table a student with user's id and returs his projects.
        }
        else                                                    // The user wants to open another user's projects
        {
            $Projects = student::find($Id)->projects;         // Search in the students table a student with this id and returs his projects.
            
        }

        return view('projects')->with('projects',$Projects);
    }

    public function projectdetails($Id)                         // a function shows the projects with its details .
    {
            $Project = project::find($Id);                      // Search in the database a project  with this id .

            return view('project')->with('project',$Project); 
    }

}
