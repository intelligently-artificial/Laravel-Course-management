@include('index')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Student,Teacher,Assignment <b>Info</b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                        <th>Student email</th>
                        <th>Teacher Name</th>
                        <th>assignment</th>
                        <th>course</th>
                       </tr>
                   </thead>
                   <tbody>
                   @foreach($data as $row)
                   <tr>
                   <td>{{ $row->email }}</td>  
                   <td>{{ $row->name }}</td>
                   <td>{{ $row->assignment }}</td>
                   <td>{{ $row->course }}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
                    {{ $data->appends($_GET)->links() }}
                    </div>
                </div>
           </div>          