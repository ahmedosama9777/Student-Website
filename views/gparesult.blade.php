@extends('layout.header')

<html>

    @section('content')

        <div class="col-lg-6">
             <div class="card">
                <div class="card-body card-block">
                     <div class="row form-group">
                         <p class = "GPAdisp"> <strong>Cummulative GPA: {{$AccGPA}}</strong>  </p>
                     </div>
                     <div class="row form-group">
                         <p class = "GPAdisp"> <strong>Last term GPA: {{$LasttermGPA}}</strong>  </p>
                     </div>
                 </div>
            </div>
        </div>             
    @endsection

</html>
