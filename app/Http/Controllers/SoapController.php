<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{
    public static function SoapRequest($Id,$Pass ,$Func )
    {
        $Wsdl = 'http://chws.eng.cu.edu.eg/webservice1.asmx?WSDL';
        
        try
        {
            $Clinet=new \SoapClient($Wsdl);
    

            $Ver =array("Params_CommaSeparated" => (string)$Id.','.(string)$Pass.','.(string)$Func);  // Sending Id and password for student plus the number of function required
            $Quates=$Clinet->GetData($Ver); // Sending the request 
       
             
            $Str =  ($Quates->GetDataResult);  // Getting the request result
        
            return $Str;
            
        }
    
        catch(SoapFault $E)
        {
            $Message =  $E->getMessage();
            return view('soap')->with('message',$Message);
        }
    }

   
    public function CheckLog($Id,$Pass)
    {
        $Str = $this->SoapRequest($Id,$Pass,0); // Id and password for the student .. and function ( 0 ) for requesting logging


        if(strpos($Str,'Wrong'))
        {
            return false;
        }
        return true;
    }
    
        public function PersonalInfo($Id,$Pass)
        {

            $Str = $this->SoapRequest($Id,$Pass,3);// number ( 3 ) for presonal info SOAP request
            $Length = strlen($Str);
            $Word = '';
    
            $Subjects = array();
            
            for( $i = 0; $i < $Length; $i++ )
            {
                $Word .= $Str[$i];
                if( strpos($Word,'Student_Code') !== false )
                {
                    $Word = '';
                    $Code =  $Str[$i+5].$Str[$i+6].$Str[$i+7].$Str[$i+8].$Str[$i+9].$Str[$i+10].$Str[$i+11]; // length of student code is 7 
                    $i += 11;
                }
                else if( strpos($Word,'Student_Name_EN') !== false )
                {
                    $Word = '';
    
                    $Name = '';
                    $i+=5;
    
                    while($Str[$i] !== '"')
                    {
                        $Name .= $Str[$i];
                        $i++;
                    }
                }
                else if (strpos($Word,'Student_Program_Name') !== false )
                {
                    $Word = '';
    
                    $Program = '';
                    $i+=5;
                    while($Str[$i] !== '"')
                    {
                        $Program .= $Str[$i];
                        $i++;
                    }
    
                }
                else if (strpos($Word,'Student_GPA') !== false )
                {
                    $Word = '';
    
                    $Gpa = '';
                    $i+=5;
                    while($Str[$i] !== '"')
                    {
                        $Gpa .= $Str[$i];
                        $i++;
                    }
                    
                }
               
            } 
    
            return $Info = array($Name,$Program,$Gpa);
    
            
        }
    
    
        public function TimeTable($Id,$Pass)
        {
            $Str = $this->SoapRequest($Id,$Pass,1);
    
            $Length = strlen($Str);
            $Word = '';
            
            $TimeTable = array();
            for( $i = 0; $i < $Length; $i++ )
            {
                $Word .= $Str[$i];
                if( strpos($Word,'Day_Name') !== false )
                {
                    $Word = '';
                    $i+=5;
                    $Day = '';
                    
                    while($Str[$i] !== '"')
                    {
                    
                            $Day .= $Str[$i];
                   
                        $i++;
                    }
                }
                else if( strpos($Word,'Course_Name') !== false )
                {
                    $Word = '';
    
                    $CourseName = '';
                    $i+=5;
    
                    while($Str[$i] !== '"')
                    {
                        $CourseName .= $Str[$i];
                        $i++;
                    }
                }
                else if (strpos($Word,'Course_Code') !== false )
                {
                    $Word = '';
    
                    $CourseCode = '';
                    $i+=5;
                    while($Str[$i] !== '"')
                    {
                        $CourseCode .= $Str[$i];
                        $i++;
                    }
    
                }
                else if (strpos($Word,'Location') !== false )
                {
                    $Word = '';
    
                    
                    $Location = '';
                    $i+=5;
                    while($Str[$i - 1] !== ']')
                    {
                           
                        $Location .= $Str[$i];
                        $i++;
                       
                    }
                    
                }
                else if (strpos($Word,'Type') !== false )
                {
                    $Word = '';
    
                    $Type = '';
                    $i+=5;
                    while($Str[$i] !== '"')
                    {
                        $Type .= $Str[$i];
                        $i++;
                    }
                    
                }
                else if (strpos($Word,'From') !== false )
                {
                    $Word = '';
    
                    $Time = '';
                    $i+=5;
                    while($Str[$i] !== '"')
                    {
                        $Time .= $Str[$i];
                        $i++;
                    }
                    $Time .= " To ";
                    
                }
                else if (strpos($Word,'To') !== false )
                {
                    $Word = '';
    
                    $i+=5;
                    while($Str[$i] !== '"')
                    {
                        $Time .= $Str[$i];
                        $i++;
                    }
    
                    $Subject = array($CourseName,$CourseCode,$Type,$Location,$Time,$Day);
                    array_push($TimeTable,$Subject);
                    
                }
                
               
            }
            return $TimeTable;
        }
}
