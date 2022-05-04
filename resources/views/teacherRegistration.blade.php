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
    Teacher Registration Page  
    </title>  
    </head>  
    <div class="container">
    <h1>Teacher registration form</h1>
    <body bgcolor="beige">  
    <br>  
    <br>
      <form action="{{url ('/')}}/teacher/register" method="post">  
        {{csrf_field()}}
         <label> Full name: </label>         
         <input type="text" name="name" size="15"/> <br> <br>
         <span class="text-danger" >
           @php 
            foreach($errors->get('name')as $message)
            {echo $message;}
           @endphp 
         </span>  
         <label> Course: </label>         
         <input type="text" name="course" size="15"/> <br><br>
         <span class="text-danger" >
           @php 
            foreach($errors->get('course')as $message)
            {echo $message;}
           @endphp 
         </span>  
         <label> Experience in years: </label>         
         <input type="text" name="experience" size="15"/> <br> 
         @php 
            foreach($errors->get('course')as $message)
            {echo $message;}
           @endphp
         <br>  
         <br>  
         <label>   
         Gender :  
         </label>
         <input type="text" name="gender" size="15"/> <br> 
         @php 
            foreach($errors->get('gender')as $message)
            {echo $message;}
           @endphp 
         <br>  
         <br>  
         <label>   
         Phone Number:  
         </label>  
         <input type="text" name="number" size="10"/> <br>
         @php 
            foreach($errors->get('number')as $message)
            {echo $message;}
           @endphp
         <br><br>  
         Email:  
         <input type="email" id="email" name="email"/>
         @php 
            foreach($errors->get('email')as $message)
            {echo $message;}
           @endphp  <br>    
         <br> 
         Password:  
         <input type="password" id="pass" name="password">
         @php 
            foreach($errors->get('')as $message)
            {echo $message;}
           @endphp<br><br>
         <button type="submit" class="btn btn-primary">Register</button><br><br>
         <a href="{{url('/home')}}">
         <button type="button" class="btn btn-primary">Go to homepage</button><br><br>
         </a>
       </form> 
    </div> 
  </body>  
     
        
    
    
    