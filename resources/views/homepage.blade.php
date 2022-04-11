<style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>

<div class="container">
   <h1>Homepage</h1>

<div class="container">
    <h2>Student</h2><br>
Login:
<a href="{{url('/login')}}">
         <button type="button" class="btn btn-primary">Login</button><br><br>
         </a>

Register:
<a href="{{url('/register')}}">
         <button type="button" class="btn btn-primary">Register</button><br><br><br><br>
         </a>  
         
<h2>Teacher</h2><br>
Login:
<a href="{{url('/tlogin')}}">
         <button type="button" class="btn btn-primary">Login</button><br><br>
         </a>

Register:
<a href="{{url('/tregister')}}">
         <button type="button" class="btn btn-primary">Register</button><br><br><br><br>
         </a> 

<h2>Admin</h2><br> 
Login:
<a href="{{url('/alogin')}}">
         <button type="button" class="btn btn-primary" >Login</button><br><br>
         </a>
         </div>                 
         