@extends('layout.header')

@section('content')

    <div class = "prof-header"  align="center" >
        <div>
        <img src = "/images/profile_pic/{{$user->img_ext}}" id = "prof-pic"alt = "profile pictue">

        <p>{{$user->username}}</p>
        <p id = "department"> {{$user->program}} </p>
        </div>
        <div  class = 'links'>
              <a href = "{{$user->facebook}}"  id = "social-link" target="_blank">   <i class="fa fa-facebook-square"  ></i></a>
                 <a href = "{{$user->twitter}}"  id = "social-link" target="_blank">   <i class="fa fa-twitter-square" ></i></a>
                   <a href = "{{$user->linkdin}}"  id = "social-link" target="_blank">   <i class="fa fa-linkedin-square" ></i> </a>
        </div>
    </div>


    <div class = "info"  align="center">
        <div class = "info-head">
            <h2>About Me</h2>
        </div>
        <div class = "info-text">
            <p>{{$user->about_you}}</p>
        </div>
        
    </div> 

    <div class = "info"   align="center">
        <div class = "info-head">
            <h2>Links</h2>
        </div>
        <div class = "info-text" style = "height:110px;">
        <a href="/projects/{{$user->id}}">   <p id = "viewproject">View Projects </p></a>

        <a href="/uploads/resume/{{$user->cv}}" target = "_blank">   <p id = "viewproject">View Resume </p></a>
        </div>

            
    </div> 
@endsection