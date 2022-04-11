<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="{{url ('/')}}/register" method="post">
{{csrf_field()}}
  <div class="container">
    <h1>Register</h1>
   
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" id="name"  required size="15"/>
    <span class="text-danger" >
           @php 
            foreach($errors->get('name')as $message)
            {echo $message;}
           @endphp 
          
         </span>  

    <label for="course"><b>Course</b></label>
    <input type="text" placeholder="Enter course" name="course" id="course" required size="15"/>
    <span class="text-danger" >
           @php 
            foreach($errors->get('course')as $message)
            {echo $message;}
           @endphp 
          
         </span>  

    <label for="gender"><b>Gender</b></label>
    <input type="text" placeholder="Enter gender" name="gender" id="gender" required size="15"/>
    <span class="text-danger" >
           @php 
            foreach($errors->get('gender')as $message)
            {echo $message;}
           @endphp 
          
         </span>  

    <label for="number"><b>Phone number</b></label>
    <input type="text" placeholder="Enter number" name="number" id="number" required>
    <span class="text-danger" >
           @php 
            foreach($errors->get('number')as $message)
            {echo $message;}
           @endphp 
          
         </span>  


    <label for="tttt"><b>tttt</b></label>
    <input type="tttt" placeholder="Enter tttt" name="tttt" id="tttt" required>
    <span class="text-danger" >
           @php 
            foreach($errors->get('tttt')as $message)
            {echo $message;}
           @endphp 
          
         </span>  

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <span class="text-danger" >
           @php 
            foreach($errors->get('password')as $message)
            {echo $message;}
           @endphp 
          
         </span>  

    <hr>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  
</form>

</body>
</html>
