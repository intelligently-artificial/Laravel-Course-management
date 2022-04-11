<style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>

<head>   
    
    <title>  
    Login Page  
    </title>  
     
    </head>  
    <div class="container">
    <h1>Admin login form</h1>
    <body bgcolor="beige">  
    <br>  
    <br>  
    
      <form action="{{url ('/')}}/alogin" method="post">  
         
        {{csrf_field()}}
      
        <div class="form-group">
              <label">Email:</label>
              <input type="email" name="email" id="" class="form-control" placeholder="">
              </div>
              <br><br>
              
              <div class="form-group">
              <label">Password:</label>
              <input type="password" name="password" id="" class="form-control" placeholder=""><br>
              </div>
              
              <button type="submit" class="btn btn-primary">Login</button><br><br>
              <a href="{{url('/home')}}">
         <button type="button" class="btn btn-primary">Go to homepage</button><br><br>
         </a>

              
              
    </div>
    </form>
    </body>