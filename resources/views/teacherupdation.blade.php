<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>
<style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style> 
<head>   
    <title>  
    Registration Page  
    </title>  
     
    </head>  
    <div class="container">
    <h1>Teacher updation form</h1>
    <body bgcolor="beige">  
    <br>  
    <br>  
    <form action="{{$url}}" method="post">  
         
        {{csrf_field()}}
      
         <label> Full name: </label>         
         <input type="text" name="name" size="15" value="{{$teacher->name}}"/> <br> <br> 
         <span class="text-danger" >
           @php 
            foreach($errors->get('name')as $message)
            {echo $message;}
           @endphp 
         </span>  
         <label> Course: </label>         
         <input type="text" name="course" size="15" value="{{$teacher->course}}"/> <br> <br>
         @php 
            foreach($errors->get('course')as $message)
            {echo $message;}
           @endphp   
         <br>  
         <br>  
         <label>   
         Gender :  
         </label>
         <input type="text" name="gender" size="15" value="{{$teacher->gender}}"/> <br> <br> 
         @php 
            foreach($errors->get('gender')as $message)
            {echo $message;}
           @endphp 
         <br>  
         <br>   
         <label>   
         Phone Number:  
         </label>   
         <input type="text" name="number" size="10" value="{{$teacher->number}}"/> <br> <br> 
         @php 
            foreach($errors->get('number')as $message)
            {echo $message;}
           @endphp  
         <br>
         <br>  
         Email:  
         <input type="email" id="email" name="email" value="{{$teacher->email}}"/>
         @php 
            foreach($errors->get('email')as $message)
            {echo $message;}
           @endphp  <br>    
         <br>
         <br>   
         <button type="submit" class="btn btn-primary">Update</button><br><br>
      </form> 
    </div> 
 </body>  
     
        
    
    
    