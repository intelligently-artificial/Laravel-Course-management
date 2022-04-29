<!doctype html>
<html lang="en">
  <head>
    <title>Admin view</title>
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
         <table class="table">
              <thead>
                  <tr>
                      <th>Teacher_id</th>
                      <th>Name</th>
                      <th>Experience</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Course</th>
                      <th>Action1</th>
                      <th>Action2</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($data as $value)
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
                      <td><a href="{{url('/teacher/delete/')}}/{{$value->teacher_id}}"><button type="button" class="btn btn-primary">Delete</button></td></a>
                      <td><a href="{{url('/teacher/edit/')}}/{{$value->teacher_id}}"><button type="button" class="btn btn-primary">Edit</button></td></a>
                      </tr>
                  @endforeach
                  {{ $data->appends($_GET)->links() }}  
              </tbody>
          </table>
      </div>
  </body>
</html>