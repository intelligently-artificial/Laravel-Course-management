<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <a class="nav-link active" aria-current="page" href="/hello/admin">Home</a>
        <a class="nav-link" href="{{route('student')}}">Student List</a>
        <a class="nav-link" href="{{route('teacher')}}">Teacher List</a>
        <a class="nav-link active" aria-current="page" href="/admin/assignment">Assignments</a>
        <a class="nav-link active" aria-current="page" href="{{route('new')}}">All in one view</a>
        <!-- <a class="nav-link active" aria-current="page" href="viewblog.php">ViewBlogs</a>
        <a class="nav-link" href="link">ViewProfile</a> -->
        <a class="nav-link active" aria-current="page" href="/logout">Logout</a> 
      </div>
    </div>
  </div>
</nav>