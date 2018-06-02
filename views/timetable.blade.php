@extends('layout.header')


@section('content')

<table>
  <thead>
    <tr>
    <th>Day</th>
      <th>Course_Name</th>
      <th>Course_Code</th>
      <th>Type</th>
      <th>Room</th>
      <th>Time</th>
    </tr>
  </thead>
  <tbody>
  @foreach($timetables as $subject)
    <tr>
      <td data-column="Day">{{$subject->day}}</td>
      <td data-column="Subject">{{$subject->course_name}}</td>
      <td data-column="Time">{{$subject->course_code}}</td>
      <td data-column="Time">{{$subject->type}}</td>
      <td data-column="Time">{{$subject->location}}</td>
      <td data-column="Time">{{$subject->time}}</td>
    </tr>
   @endforeach
  </tbody>


@endsection