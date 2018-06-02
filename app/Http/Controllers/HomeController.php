<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\post;
use App\user;
use App\student;
use App\comment;
use App\notification;


class HomeController extends Controller
{
    public function homepage()
    {
        $Program = (DB::table('students')->where('id','=',Auth::user()->id)->first())->program;
         // get the Student Program

        $Posts = DB::table('posts')
                 ->join('students','students.id','=','posts.student_id')
                 ->join('users','students.id','=','users.id')
                 ->where('posts.program','=',$Program) 
                 ->orderBy('posts.created_at','des')
                 ->select('posts.id','posts.text','posts.photo_name', 'users.name AS username','students.id AS student_id', 'students.img_ext')
                 ->get();// get the ordered student posts 

        $Comments = DB::table('comments')
                    ->join('users','student_id','=','users.id')
                    ->join('students','students.id','=','comments.student_id')
                    ->select('comments.*','students.img_ext','users.name')
                    ->get();// get the related comments 

        return view('home')->with('posts',$Posts)->with('comments',$Comments);
        // pass these data to view  
    }

    public function SearchUser( Request $Request)
    {
        $Text = $Request['SearchText']; // Get the input text 
        $Id = Auth::user()->id;
        $Users = DB::table('users')->join('students','users.id','=','students.id')->where('students.id','<>',$Id)->where('users.name', 'LIKE', '%'.$Text.'%')->get();
        // get all the users whose name are like the input text and then send them to the view 
        return view('SearchResult')->with('users',$Users);

    }



    public function TimeTable()
    {
     
        $TimeTables = DB::table('timetables')->where('student_id','=',Auth::user()->id)->get();
        // get the student TimeTable
        return view('timetable')->with('timetables',$TimeTables);
    }
  
}
