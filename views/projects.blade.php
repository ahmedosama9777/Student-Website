@extends('layout.header')

<html>

    @section('content')

        <div class="col-lg-6">
               

               @if( count($projects) )
                    @foreach( $projects as $project)
               
    <div class = "info"  >
        <div class = "info-head" style= "width:90%;">
            <h2>Project</h2>
        </div>
        <div class = "project-text">
            <p >Project Name :  <span>{{$project->name}}</span></p>
            <p >Short Description : <span> {{$project->description}} </span></p>
             <p >Details : <span> {{$project->details}} </span></p>

        <a href = "/uploads/project/{{$project->file_name}}" style = "margin-left:2%;" download = "{{$project->file_name}}">
                            <button  class="btn btn-primary btn-sm">
                              <i class="fa fa-dot-circle-o"></i> Download
                            </button>
        </a>    
        </div>
        </div>
    </div> 
     @endforeach
              @endif
        </div>
                      
    @endsection


</html>