<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Hashing\BcryptHasher;


use App\user;
use App\student;

use DB;

class ProfileController extends Controller
{
    

    public function editpage()                          // Showing the editing profile page 
    {
        
        $Student = student::find(Auth::user()->id);        // Get the current user row 
        $User = user::find(Auth::user()->id);        // Get the current user row 
        
        return view('editprofile')->with('user',$User)->with('student',$Student);
                
    }

    public function editprofile(Request $Request)
    {
       //edit student profile with the input parameters 
        $Student = student::find(Auth::user()->id);            
        $User = user::find(Auth::user()->id);            
        $Student->city = $Request['city'];
        $Student->about_you = $Request['about-you'];
        $Student->facebook = $Request['facebook'];
        $Student->twitter = $Request['twitter'];
        $Student->linkdin = $Request['linkdin'];
    
        if ( $Request->hasFile('resume') )// if the student want to upload resume 
        {
            $UserId = Auth::user()->id;
            $FileExt = $Request['resume']->getClientOriginalExtension();

            $FileName = $UserId.".".$FileExt;
            $Request['resume']->move( 'uploads/resume' , $FileName );
            
            $Student->cv = $FileName;
        }
        
        $User->name = $Request['user-name'];
        $User->save();
        $Student->save();

        return redirect('/home');
    }

    public function changepic(Request $Request)
    {

        if ( $Request->hasFile('profile-pic') )// get the profile pic 
        {
            $UserId = Auth::user()->id;
            $ImgExt = $Request['profile-pic']->getClientOriginalExtension();

            $PicName = $UserId.".".$ImgExt;
            $Request['profile-pic']->move( 'images/profile_pic' , $PicName );
            
            $User = student::find( $UserId );
            $User->img_ext = $PicName;
            $User->save();
            
            $Msg = "Image has been uploaded successfully !";
            return redirect('editprofile')->with('uploaded',$Msg);
        }
        
        else
        {
            $Msg = "Image couldn't be upload .Try again !";
            return redirect('editprofile')->with('notuploaded',$Msg);
        }
    }
    public function ViewProfile($Id)
    {
        //return a view the user info
        $User = DB::table('users')->join('students','users.id','=','students.id')->where('students.id','=',$Id)->select('students.*','users.name as username')->first();
        return view('Profile')->with('user',$User);
        
    }

}
