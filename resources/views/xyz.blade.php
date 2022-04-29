<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form action="{{url ('/')}}/register" method="post" class="mx-1 mx-md-4">
                {{csrf_field()}}

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Your Name</label>
                      <input type="text" name="name" id="form3Example1c" class="form-control" />
                      <span class="text-danger" >
           @php 
            foreach($errors->get('name')as $message)
            {echo $message;}
           @endphp 
          
         </span>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Email</label>
                      <input type="email" name="email" id="form3Example3c" class="form-control" />
                      <span class="text-danger" >
           @php 
            foreach($errors->get('email')as $message)
            {echo $message;}
           @endphp 
          
         </span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Gender</label>
                      <input type="text" name="gender" id="form3Example1c" class="form-control" />
                      <span class="text-danger" >
           @php 
            foreach($errors->get('gender')as $message)
            {echo $message;}
           @endphp 
          
         </span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Phone number</label>
                      <input type="text" name="number" id="form3Example1c" class="form-control" />
                      <span class="text-danger" >
           @php 
            foreach($errors->get('number')as $message)
            {echo $message;}
           @endphp 
          
         </span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Course</label>
                      <input type="text" name="course" id="form3Example1c" class="form-control" />
                      <span class="text-danger" >
           @php 
            foreach($errors->get('course')as $message)
            {echo $message;}
           @endphp 
          
         </span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Password</label>
                      <input type="password" name="password" id="form3Example4cd" class="form-control" />
                      <span class="text-danger" >
           @php 
            foreach($errors->get('password')as $message)
            {echo $message;}
           @endphp 
          
         </span>
                    </div>
                  </div>

                  
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="button" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>