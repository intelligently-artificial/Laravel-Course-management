@include('index')
<!doctype html>
<html lang="en">
  <head>
    <title>AssignmentTableAdmin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS --> 
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
                      <th>Teacher Name</th>
                      <th>Assignment</th>
                      <th>Course</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($assignment as $value)
                  <tr>
                      <td>{{$value->name}}</td>
                      <td>{{$value->assignment}}</td>
                      <td>{{$value->course}}</td>
                      </td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->password}}</td>
                      </tr>
                  @endforeach 
              </tbody>
          </table>
        <div class="row">{{$assignment->links()}}</div><br>
      </div>
  </body>
</html>