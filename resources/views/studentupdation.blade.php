 
<head>   
    
<title>  
Registration Page  
</title>  
 
</head> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>

<style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style>  
<div class="container">
<h1>Student updation form</h1>
<body bgcolor="beige">  
<br>  
<br>  

  <form action="{{$url}}" method="post">  
     
    {{csrf_field()}}
  
     <label> Full name: </label>         
     <input type="text" name="name" size="15" value="{{$student->name}}"/> <br> <br> 
     <span class="text-danger" >
       @php 
        foreach($errors->get('name')as $message)
        {echo $message;}
       @endphp 
      
     </span>  
   
     <label> Course: </label>         
     <input type="text" name="course" size="15" value="{{$student->course}}"/> <br> <br>
     @php 
        foreach($errors->get('course')as $message)
        {echo $message;}
       @endphp  
     
       
     <br>  
     <br>  
     <label>   
     Gender :  
     </label>
     <input type="text" name="gender" size="15" value="{{$student->gender}}"/> <br> <br> 
     @php 
        foreach($errors->get('gender')as $message)
        {echo $message;}
       @endphp 
  
      
     <br>  
     <br>  
       
     <label>   
     Phone Number:  
     </label>  
       
     <input type="text" name="number" size="10" value="{{$student->number}}"/> <br> <br> 
     @php 
        foreach($errors->get('number')as $message)
        {echo $message;}
       @endphp  

     <br> <br>  
     Email:  
     <input type="email" id="email" name="email" value="{{$student->email}}"/>
     @php 
        foreach($errors->get('email')as $message)
        {echo $message;}
       @endphp  <br>    
     <br> <br>  
     
      
     <button type="submit" class="btn btn-primary">Update</button>
     </form> 
</div> 
</body>  
 
    


