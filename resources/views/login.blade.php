<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>
<style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style>
 <div class="container">
<head>   
    <title>  
    Login Page  
    </title>  
    </head>  
    <div class="container"><h1>Student login form</h1></div>
    <body bgcolor="beige">  
    <br>  
    <br>  
      <form action="{{url ('/')}}/login" method="post" >  
      {{ csrf_field() }}
        <div class="form-group">
              <labe"l><h4>Email:</h4></label>
              <input type="email" name="email" id="" class="form-control" placeholder="">
              </div>
              <br><br>
              <div class="form-group">
              <label"><h4>Password:</h4></label>
              <input type="password" name="password" id="" class="form-control" placeholder="">
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Login</button><br><br>
              <a href="{{url('/home')}}">
         <button type="button" class="btn btn-primary">Go to homepage</button><br><br>
         </a>
    </form>
  </body>
</div>