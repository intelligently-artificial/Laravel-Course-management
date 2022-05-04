<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><br>
<head>     
<title>  
Assignment Page  
</title>  
</head> 
<style>
.container {
  border: 5px outset pink;
  background-color: lightblue;    
  text-align: center;
}
</style>
<div class="container">
<h2>Enter Details</h2>
<body bgcolor="beige">  
<br>  
<br>  
  <form action="{{url ('/')}}/assignment" method="post">   
    {{csrf_field()}}
     <label> Full name: </label>         
     <input type="text" name="name" size="15"/> <br> <br> 
     <span class="text-danger" >
       @php 
        foreach($errors->get('name')as $message)
        {echo $message;}
       @endphp 
     </span>  
     <label> Course:   </label>         
     <input type="text" name="course"size="15"  value="{{$me[0]->course}}"/> <br> <br> 
     <span class="text-danger" >
       @php 
        foreach($errors->get('course')as $message)
        {echo $message;}
       @endphp 
     </span>  
     <label> Assignment: </label>         
     <input type="text" name="assignment" size="15"/> <br> <br>
     @php 
        foreach($errors->get('assignment')as $message)
        {echo $message;}
       @endphp   
     <br>   
    <button type="submit" class="btn btn-primary">Submit</button>
   </button>  
  </form> 
    <a href="{{url('/teachers/view')}}">
    <button type="button" class="btn btn-primary">Back</button><br><br> </a>
</div> 
</body>  