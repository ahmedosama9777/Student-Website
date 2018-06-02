@extends('layout.header')

<html>

    @section('content')

        <div class="col-lg-6">
               
               @if( count($users) )
                    @foreach( $users as $user)
                        <div class="card">
                          <div class="card-header">
                            <strong>{{$user->name}}</strong> 
                          </div>
                          <div class="card-body card-block">
                            
                            
                            <img src= "/images/profile_pic/{{$user->img_ext}}" width = "100px" length = "100px" style = "float:left;">

                              <div class="row form-group">
                                <p>{{$user->id}}</p>
                              </div>

                                <p>{{$user->city}}</p>
                              </div>

                            

                          </div>
                         <div class="card-footer">
                           <a href = "/profile/{{$user->id}}" >
                            <button  class="btn btn-primary btn-sm" >
                              <i class="fa fa-dot-circle-o"></i> View Profile
                            </button>
                          </a>    
                        </div>
                    </div>
                    @endforeach
              @endif
        </div>
                      
    @endsection

</html>