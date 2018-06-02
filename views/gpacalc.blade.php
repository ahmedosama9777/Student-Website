
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
                        <strong>GPA Calculator</strong> 
                      </div>
                      <div class="card-body card-block">

                        <form action="/gpacalc" method="POST" class = "form-gpa" >
                          
                          {{csrf_field()}}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Previous Credits:</label></div>
                            <div class="col-12 col-md-9"><input type="text" class = "gpatext"  id="text-input" name="prevcrdts" placeholder="Previous Credits" class="form-gpa" value = "" required></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Previous GPA:</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="prevGPA" placeholder="Previous GPA" class="form-gpa" value = "" required></div>
                          </div>

                          <div class="row form-group" style = "float:left;">
                          
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Class 1:</label></div>
                            <div  class="col-12 col-md-9"><select id="text-input" name="class1">
                              <option value="A+">A+</option>
                              <option value="A">A</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B">B</option>
                              <option value="B-">B-</option>
                              <option value="C+">C+</option>
                              <option value="C">C</option>
                              <option value="C-">C-</option>
                              <option value="D+">D+</option>
                              <option value="D">D</option>
                              <option value="F">F</option>
                            </select></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Class 2:</label></div>
                            <div class="col-12 col-md-9"><select id="text-input" name="class2">
                              <option value="A+">A+</option>
                              <option value="A">A</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B">B</option>
                              <option value="B-">B-</option>
                              <option value="C+">C+</option>
                              <option value="C">C</option>
                              <option value="C-">C-</option>
                              <option value="D+">D+</option>
                              <option value="D">D</option>
                              <option value="F">F</option>
                            </select></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Class 3:</label></div>
                            <div class="col-12 col-md-9"><select id="text-input" name="class3">
                              <option value="A+">A+</option>
                              <option value="A">A</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B">B</option>
                              <option value="B-">B-</option>
                              <option value="C+">C+</option>
                              <option value="C">C</option>
                              <option value="C-">C-</option>
                              <option value="D+">D+</option>
                              <option value="D">D</option>
                              <option value="F">F</option>
                            </select></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Class 4:</label></div>
                            <div class="col-12 col-md-9"><select id="text-input" name="class4">
                              <option value="A+">A+</option>
                              <option value="A">A</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B">B</option>
                              <option value="B-">B-</option>
                              <option value="C+">C+</option>
                              <option value="C">C</option>
                              <option value="C-">C-</option>
                              <option value="D+">D+</option>
                              <option value="D">D</option>
                              <option value="F">F</option>
                            </select></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Class 5:</label></div>
                            <div class="col-12 col-md-9"><select id="text-input" name="class5">
                              <option value="A+">A+</option>
                              <option value="A">A</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B">B</option>
                              <option value="B-">B-</option>
                              <option value="C+">C+</option>
                              <option value="C">C</option>
                              <option value="C-">C-</option>
                              <option value="D+">D+</option>
                              <option value="D">D</option>
                              <option value="F">F</option>
                            </select></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-gpa-label">Class 6:</label></div>
                            <div class="col-12 col-md-9"><select id="text-input" name="class6">
                              <option value="A+">A+</option>
                              <option value="A">A</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B">B</option>
                              <option value="B-">B-</option>
                              <option value="C+">C+</option>
                              <option value="C">C</option>
                              <option value="C-">C-</option>
                              <option value="D+">D+</option>
                              <option value="D">D</option>
                              <option value="F">F</option>
                            </select></div>
                          </div>

                          <div >
                          <div class="col-12 col-md-9"><select id="text-input" name="credits1">
                              <option value="2">2</option>
                              <option value="3">3</option>
                      
                            </select></div>
                          <div class="col-12 col-md-9"><select id="text-input" name="credits2">
                              <option value="2">2</option>
                              <option value="3">3</option>
                      
                            </select></div>
                          <div class="col-12 col-md-9"><select id="text-input" name="credits3">
                              <option value="2">2</option>
                              <option value="3">3</option>
                      
                            </select></div>
                          <div class="col-12 col-md-9"><select id="text-input" name="credits4">
                              <option value="2">2</option>
                              <option value="3">3</option>
                      
                            </select></div>
                          <div class="col-12 col-md-9"><select id="text-input" name="credits5">
                              <option value="2">2</option>
                              <option value="3">3</option>
                      
                            </select></div>
                          <div class="col-12 col-md-9"><select id="text-input" name="credits6">
                              <option value="2">2</option>
                              <option value="3">3</option>
                      
                            </select></div>
                          </div>

                          <div class="card-footer">
                            <button class="btn btn-primary btn-sm" >
                              <i class="fa fa-dot-circle-o"></i> Calculate GPA
                            </button>
                             
                        </div>
                          

    @endsection


</html>