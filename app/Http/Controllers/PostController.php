<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\post;
use App\user;
use App\student;
use App\comment;
use App\notification;

use DB;

class PostController extends Controller
{
    public function SharePost(Request $Request)
    {
         // creating object from Post with the related input text and student ID 
        $Post = new post(); 
        $Post->text = $Request['text'];
        $Post->student_id = Auth::user()->id;
        $Post->program = (DB::table('students')->where('id','=',$Post->student_id)->first())->program;
        if( $Request->hasFile('post-photo') )// if the post with a photo 
        {
            $PhotoId = Auth::user()->id ;
            $ImgExt = $request['post-photo']->getClientOriginalExtension();
            $MyTime =  date('Y_m_d  H_i_s');  // getting the  date and time .

            $PhotoName = $PhotoId."_".$MyTime.".".$ImgExt;
            
            $Photo = $request['post-photo']->move('images/post',$PhotoName);
            $Post->photo_name = $PhotoName;

        }

        $Post->save();
        return redirect('/home');
    }

    public function comment( Request $Request , $Id)
    {
        // creating object from comment with the input text and student ID and post ID
        $Comment = new comment();
        $Comment->text       = $Request['ctext'];
        $Comment->student_id = Auth::user()->id;
        $Comment->post_id    =  $Id ;

        $Post = DB::table('posts')->where('id','=',$Id)->first();
        $Student = DB::table('students')->where('id','=',$Post->student_id)->first();

        if( Auth::user()->id != $Post->student_id ) // notify the student with the comment 
        {
            $Notification = new notification();
            $Notification->student_id = $Student->id;
            $Notification->post_id = $Id;
            $Notification->text = (string)$Student->name."has commented on your post";
            $Notification->save();
        }
        $Comment->save();
        return redirect('/home');

    }

    public function PostPage($Id)
    {
        //returning a view with related post and comments
        $Post = DB::table('posts')
                 ->join('students','students.id','=','posts.student_id')
                 ->join('users','students.id','=','users.id')
                 ->orderBy('posts.created_at','des')
                 ->select('posts.id','posts.text','posts.photo_name', 'users.name AS username','students.id AS student_id', 'students.img_ext')
                 ->first();

        $Comments = DB::table('comments')
                    ->join('users','student_id','=','users.id')
                    ->join('students','students.id','=','comments.student_id')
                    ->select('comments.*','students.img_ext','users.name')
                    ->get();

        return view('post')->with('post',$Post)->with('comments',$Comments);
    }
}
