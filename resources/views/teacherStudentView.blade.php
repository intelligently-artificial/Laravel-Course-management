<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>
  </head>
  <style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style> 
  <body>   
  <div class="container"> 
     <table class="table">
                 <thead>
                     <tr>
                         <th>Student_id</th>
                         <th>Name</th>
                         <th>Number</th>
                         <th>Gender</th>
                         <th>Email</th>
                         <th>Course</th> 
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($me as $i)
                     @php 
                      $yc=$i->course;
                     @endphp 
                     @endforeach
   
                     @foreach($student as $i)
                     @if($i->course == $yc)
                     <tr>
                         <td>{{$i->student_id}}</td>
                         <td>{{$i->name}}</td>
                         <td>{{$i->number}}</td>
                         <td>@if($i->gender=="M")
                             Male
                             @elseif($i->gender=="F")
                             Female 
                             @else
                             Other
                             @endif
                         </td>
                         <td>{{$i->email}}</td>
                         <td>{{$i->course}}</td>
                         @endif
                         </tr>
                     @endforeach  
                 </tbody>
             </table>
             <a href="{{url('/teachers/view')}}">
         <button type="button" class="btn btn-primary">Back</button><br><br>
         </a>   
      </div>
  </body>
</html> 