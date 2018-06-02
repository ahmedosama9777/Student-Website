<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\student;
use App\timetable;

class logController extends Controller
{

    private $Soap ;

    public function __construct()
    {
        $this->Soap = new SoapController();
    }

    public function logpage()                                           
    {                                                               
    // function to return login view
        return view('login');
    }

    public function login(Request $Request)
    {
        //first check log username password
        if(  $this->Soap->CheckLog($Request['log-usr'] ,$Request['log-pwd'])  )
        {
            $User = user::where('id', '=', $Request['log-usr'])->first(); 
            if( $User === null) // if the user is not created ,then create it with the log info
            {
                $User = new user();
                $User->id = $Request['log-usr'] ;
                $User->name = $Request['log-usr'];
              //  $User->password = $Request['log-pwd'];
                $User->save();

                $Info =  $this->Soap->PersonalInfo($User->id,$Request['log-pwd']);

                $Student = new student();
                $Student->id = $User->id;
                $Student->gpa = $Info[2];
                $Student->program = $Info[1];
                $Student->name = $Info[0];
                $Student->img_ext = "unknown.jpg";
                $Student->save();

                $Tables =  $this->Soap->TimeTable($User->id,$Request['log-pwd']);

                
                foreach( $Tables as $Table )
                {
                    // making a TimeTable
                    $TimeTable = new timetable();
                    $TimeTable->student_id = $User->id;
                    $TimeTable->course_name = $Table[0];
                    $TimeTable->course_code = $Table[1];
                    $TimeTable->type = $Table[2];
                    $TimeTable->location = DB::connection()->getPdo()->quote(utf8_encode($Table[3]));
                    $TimeTable->time = $Table[4];
                    $TimeTable->day  = $Table[5];
                    $TimeTable->save(); 
                }

            }
            Auth::login($User);            
           return redirect('/home');
        }
        else      // if username or password is not correct.                                                                      
        {
            echo $Msg = "Username or Password are not correct .Try again !";
            return redirect('/')->witherrors($Msg);
        }

    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
