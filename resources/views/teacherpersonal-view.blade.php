<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>
  </head>
  <body>
  <style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style> 
      <div class="container">
           <table class="table">
              <thead>
                  <tr>
                      <th>Teacher_id</th>
                      <th>Name</th>
                      <th>Experience</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Course</th> 
                  </tr>
              </thead>
              <tbody>
                  @foreach($teacher as $value)
                  <tr>
                      <td>{{$value->teacher_id}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->experience}}</td>
                      <td>@if($value->gender=="M")
                          Male
                          @elseif($value->gender=="F")
                          Female 
                          @else
                          Other
                          @endif
                      </td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->course}}</td>
                      </tr>
                  @endforeach  
              </tbody>
          </table>
      
         <a href="{{url('/assignment')}}">
         <button type="button" class="btn btn-primary">Add assignment</button><br><br>
         </a>
         
         <a href="{{url('/viewassignment')}}">
         <button type="button" class="btn btn-primary">Show assignments</button><br><br>
         </a>

         <a href="{{url('/students')}}">
         <button type="button" class="btn btn-primary">Your Students</button><br><br>
         </a>

         <a href="{{url('/logout')}}">
         <button type="button" class="btn btn-primary">Log out</button><br><br>
         </a> 
        </div>
  </body>
</html>