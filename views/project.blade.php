@extends('layout.header')

   @section('content')

      <div class="col-lg-6">
               
               <div class="card">
                          <div class="card-header">
                            <strong>{{$project->name}}</strong> 
                          </div>
                          <div class="card-body card-block">
                            
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong> Description  </strong></label></div>
                                <p>{{$project->description}}</p>
                              </div>

                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong> Details  </strong></label></div>
                                <p>{{$project->details}}</p>
                              </div>
                          </div>
                         <div class="card-footer">
                           <a href = "/uploads/project/{{$project->file_name}}" download = "{{$project->file_name}}">
                            <button  class="btn btn-primary btn-sm">
                              <i class="fa fa-dot-circle-o"></i> Download
                            </button>
                          </a>    
                        </div>
                    </div>
                  
        </div>
    @endsection
