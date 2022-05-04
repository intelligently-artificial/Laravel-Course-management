<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    @include('index') 
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
          <form action="">
              <div class="form-group">
                <input type="search" name="search" id="" class="form-control" placeholder="Search here by name or email" value="{{$search}}" ><br>
                <button  class="btn btn-primary">Search</button><br><br>
              </div>
          </form>
        <a href="{{url('/register')}}">
         <button type="button" class="btn btn-primary">Add a student</button><br><br>
         </a>
          <table class="table">
              <thead>
                  <tr>
                      <th>Student_id</th>
                      <th>Name</th>
                      <th>Course</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Action1</th>
                      <th>Action2</th>
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
                      <td style="background-color:#e9b0b3;">
                            <form action="/student/gone/{{$value->student_id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id">
                            <button button style="background-color:#f09797;" type="submit">Delete</button>
                            </form></td>                      
                            <td>
                              <a href="{{url('/student/do/')}}/{{$value->student_id}}">
                              <button type="button" class="btn btn-primary" >Edit</button><br><br>
                             </a> 
                           </td>
                  </tr>
                  @endforeach 
              </tbody>
          </table>
          <div class="row">{{$student->links()}}</div>
      </div>
  </body>
</html>