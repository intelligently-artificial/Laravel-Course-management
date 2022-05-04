<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>
  </head> 
  <body>
  <style>
.myDiv {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style>
<div class="myDiv">
  <h3>Student details</h3>
  <table class="table">
              <thead>
                  <tr>
                      <th>Student_id</th>
                      <th>Name</th>
                      <th>Course</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Password</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($student as $value)
                  <tr>
                      <td>{{$value->student_id}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->course}}</td>
                      <td>@if($value->gender=="M")
                          Male
                          @elseif($value->gender=="F")
                          Female 
                          @else
                          Other
                          @endif
                      </td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->password}}</td>
                      </tr>
                  @endforeach  
              </tbody>
          </table>
          </div>
          <div class="myDiv">
          <h3> Assignments</h3>
          <table class="table">
                 <thead>
                     <tr>
                         <th>Teacher</th>
                         <th>Course</th>
                         <th>Assignment</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($student as $i)
                     @php 
                      $yc=$i->course;
                     @endphp 
                     @endforeach
                     @foreach($assignment as $i)
                     @if($i->course == $yc)
                     <tr>
                         <td>{{$i->name}}</td>
                         <td>{{$i->course}}</td>
                         <td>{{$i->assignment}}</td>
                         @endif
                         </tr>
                     @endforeach    
                 </tbody>
             </table>
             <a href="{{url('/logout')}}">
         <button type="button" class="btn btn-primary">Log out</button><br><br>
         </a>
      </div>
    </body>
</html>