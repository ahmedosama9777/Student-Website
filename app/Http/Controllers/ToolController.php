<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function ViewGPACalc()
    {
        return view('gpacalc');
    }
    public function CalculateGPA(Request $Request)
    {
        $Class = array($Request['class1'],$Request['class2'],$Request['class3'],$Request['class4'],$Request['class5'],$Request['class6']);
        // get the grade of each Course
        $PrevCredits = $Request['prevcrdts'];
        $PrevGPA = $Request['prevGPA'];
        $Credits1 = $Request['credits1'];
        $Credits2 = $Request['credits2'];
        $Credits3 = $Request['credits3'];
        $Credits4 = $Request['credits4'];
        $Credits5 = $Request['credits5'];
        $Credits6 = $Request['credits6'];
        // get the weight Credit of each  Course
        $Den = $PrevCredits + $Credits1 + $Credits2 + $Credits3 + $Credits4 + $Credits5 + $Credits6;
        // total no of credits 
       for( $i=0 ; $i<6 ; $i++)
       {
           if($Class[$i]=="A+" || $Class[$i]=='A')
           {
                $Class[$i]=4;
           }
           else if($Class[$i]=="A-")
           {
            $Class[$i]=3.7;
           }
           else if($Class[$i]=="B+")
           {
            $Class[$i]=3.3;
           }
           else if($Class[$i]=="B")
           {
            $Class[$i]=3.0;
           }
           else if($Class[$i]=="B-")
           {
            $Class[$i]=2.7;
           }
           else if($Class[$i]=="C+")
           {
            $Class[$i]=2.3;
           }
           else if($Class[$i]=="C")
           {
            $Class[$i]=2.0;
           }
           else if($Class[$i]=="C-")
           {
            $Class[$i]=1.7;
           }
           else if($Class[$i]=="D+")
           {
            $Class[$i]=1.3;
           }
           else if($Class[$i]=="D")
           {
            $Class[$i]=1.0;
           }
           else if($Class[$i]=="F")
           {
            $Class[$i]=0;
           }
        }
        // the weight of each grade 
       $num = $Credits1 * $Class[0] +  $Credits2 * $Class[1] +  $Credits3 * $Class[2] +  $Credits4 * $Class[3] +  $Credits5 * $Class[4] +  $Credits6 * $Class[5] + $PrevCredits * $PrevGPA;
       $GPA = $num / $Den; 
       $AccGPA = number_format((float)$GPA, 2, '.', '');
       $LTGPA = ($num - ($PrevCredits * $PrevGPA)) / ($Den - $PrevCredits);
       $LasttermGPA = number_format((float)$LTGPA, 2, '.', '');
       return view('gparesult')->with('AccGPA',$AccGPA)->with('LasttermGPA', $LasttermGPA);

    }

    public function CreateNote(Request $Request)
    {
        // create a note with a related date 
        $UserId = Auth::user()->id;
        $Date=request['date'];
        $Note=request['note'];
        $StudentNote = new note();
        $StudentNote->student_id = $UserId;
        $StudentNote->note=$Note;
        $StudentNote->Date=$Date;
        $StudentNote->save();


    }
    public function ViewCalender()
    {
        $Month = date("M");
        $Day = date("D");
        $DayNum = date("d");
        $DayName = date("l");
        $Year = date("Y");
        $MonthDays = array(34); // array of days number 5*7
        $UsePreviousMonth=false; //  boolen variables to determine which divisible will be used
        if($Day == "Sun")
        { $DayNum-=1;}
        if($Day == "Mon")
        {$DayNum-=2;}
        if($Day == "Tue")
        {$DayNum-=3;}
        if($Day == "Wed")
        {$DayNum-=4;}
        if($Day == "Thr")
        {$DayNum-=5;}
        if($Day == "Fri")
        {$DayNum-=6;}
        if($DayNum<=0) // in case the number is negative
        {
            $UsePreviousMonth=true;
             if($Month == "September"|| $Month == "April" || $Month == "June"||$Month == "Novemeber") 
            {
                // Months with 30 Days
                $MonthNumber=30; 
                $DayNum +=30;
                $PrevoiousMonthNumber=31; // for sure the previous month must be 31 
                
            }
            else if ($Month == "February")
             {
                $DayNum+=30;
                $MonthNumber=28;
                $PrevoiousMonthNumber=31;

            }
            else if ($Month == "March") // the previous month is February 
            {
                $DayNum+=27;
                $MonthNumber=31;
                $PrevoiousMonthNumber=28;
            }
            else {
                $MonthNumber=31;
                $DayNum+=29;
                $PrevoiousMonthNumber=30;
            }
         }
         
         for ($i = 0; $i < 35 ; $i++)
         {
             if($UsePreviousMonth==true)
             {
             $IncrementedDay=(($Day_Num+$i)%$PrevoiousMonthNumber);
             $MonthDays[$i]=$IncrementedDay +1; // then i add as the reminder maybe 0 
             if($IncrementedDay==0)
             {
                $DayNum+=1;
                $UsePreviousMonth=false;
             }
             }
             else
             {
                $IncrementedDay=(($DayNum+$i)%$MonthNumber);
                $MonthDays[$i]=$IncrementedDay +1;
             }

         }

       return view('calender')->with('Month',$Month)->with('Day',$Day)->with('Day_name',$DayName)->with('Year',$Year)->with('Month_Days',$MonthDays); 
    }

}
