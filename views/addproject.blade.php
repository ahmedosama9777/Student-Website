@extends('layout.header')

<html>

    @section('content')

        <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">
                      <strong>Add Project </strong><hr>
                        <form action="/addproject" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                          {{csrf_field()}}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name </label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Project Name" class="form-control" required></div>
                          </div>
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="description" placeholder="short description" class="form-control" required></div>
                          </div>
                          
                        
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" >Details</label></div>
                            <div class="col-12 col-md-9"><textarea name="details" id="textarea-input" rows="9" placeholder="Write about the project" class="form-control" required></textarea></div>
                          </div>
                           
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file" class="form-control-file" required></div>
                          </div>
                         
                          
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Add
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>
                    </div>
                        </form>
                      </div>
                      
    @endsection


</html>