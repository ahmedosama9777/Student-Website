@extends('layout.header')

<html>

    @section('content')

</br>
                </br>
                </br>
        <div class="col-lg-6">
          <div class ="row" >                  
  					<div class ="col-sm">
					<div class="card">
                      <div class="card-header">
                        <strong>Edit</strong> Personal Info
                      </div>
                      <div class="card-body card-block">

                        <form action="/editprofile" method="post" enctype="multipart/form-data" class="form-horizontal">
                          
                          {{csrf_field()}}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">UserName</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="user-name" placeholder="First Name" class="form-control" value = "{{$user->name}}" required></div>
                          </div>

                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" >City</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="city" placeholder="City" class="form-control" value = "{{$student->city}}" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" value = "{{$student->about_you}}">About you</label></div>
                            <div class="col-12 col-md-9"><textarea name="about-you" id="textarea-input" rows="9" placeholder="Write about youtself" class="form-control">{{$user->about_you}}</textarea></div>
                          </div>
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Facebook</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="facebook" value = "{{$student->facebook}}" placeholder="Facebook Link" class="form-control"></div>
                          </div>
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Twitter</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="twitter" value = "{{$student->twitter}}" placeholder="Twitter Link" class="form-control"></div>
                          </div>
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Linkdin</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="linkdin" placeholder="Linkdin Link" value = "{{$student->linkdin}}" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Resume</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="resume" class="form-control-file"></div>
                          </div>
                         
                            <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>
                    </div>  
                        </form>
                      </div>
				</div>
				
				
				<div class = "col-sm">
                    <div class="card">
                      <div class="card-header">
                        <strong>Change</strong> Profile Picture 
                      </div>
                      <div class="card-body card-block">
                        
                         @if(session('uploaded'))
                            
                            <div class="alert alert-success" role="alert">{{session('uploaded')}}</div>

                        @elseif(session('notuploaded'))
                            
                            <div class="alert alert-danger" role="alert">{{session('notuploaded')}}</div>

                        @endif

                        <form action="/changepic" method="post" enctype="multipart/form-data" class="form-horizontal">
                          

                          {{csrf_field()}}
                          
                           <div class="row form-group">
                            <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Uplaod Photo</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="profile-pic"  class="form-control-file"></div>
                          </div>
                          
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Change
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>
                    </div>
                      </form>
                      </div>
                      
                      
                      
                      </div>
                      
            </div>
          </div>

                                      

    @endsection


</html>