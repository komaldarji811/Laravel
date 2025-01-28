<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .container {
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table {
            text-align: center;
        }

        th, td {
            padding: 10px;
        }
    </style>

</head>
<body>
<!-- Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="add_edit_form" enctype="multipart/form-data">
        <input type='hidden' name='id' value="" id='id'>
        @csrf
      <div class="modal-body">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" required>
            </div>

            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" aria-describedby="emailHelp" required>
            </div>

            <!-- Post -->
            <div class="mb-3">
                <label for="post" class="form-label">Post</label>
                <textarea class="form-control" id="post" name="post" rows="3" placeholder="Write your post here" required></textarea>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Enter the URL of your avatar image" required>
            </div>
      

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_students">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                    <h1>Student Details</h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">
                    Add Students
                    </button>
            </div>
            <div class="col-xl-12">
                
                <table class="table">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Post</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
loadtable();

function loadtable(){
 $.ajax({
    'type':'get',
    'url':'{{route("getstudents")}}',
    datatype:'json',
    success:function(res){
        $table = '';
        $.each(res,function(k,v){
            $table += ` <tr>
                            <th scope="row">${v.id}</th>
                            <td><image src="images/${v.avatar}" width="40" height="40"/></td>
                            <td>${v.fname}${v.lname}</td>
                            <td>${v.email}</td>
                            <td>${v.post}</td>
                            <td>
                            <button class='btn btn-info edit_students' data-id="${v.id}">Edit</button>
                            <button class='btn btn-danger delete_students' data-id="${v.id}">Delete</button>
                            </td>
                        </tr>`;
        });

        $('table tbody').html($table);
    }
 })
}

$(document).on('click','.save_students',function(e){
    e.preventDefault();
    var form = $('#add_edit_form')[0];
    var formdata = new FormData(form);
    $.ajax({
        'type':'post',
        'url':'{{route("store")}}',
        'data':formdata,
        'cache':false,
        'processData':false,
        'contentType':false,
        success:function(res){
            location.reload();
        }
    });

});

$(document).on('click','.edit_students',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        'type':'get',
        'url':'{{route("getstudents")}}',
        'data':{'id':id},
        'datatype' :'json',
        success:function(res){
            $('#add_modal').modal('show');
            $('#id').val(res[0].id);
            $('#fname').val(res[0].fname);
            $('#lname').val(res[0].lname);
            $('#email').val(res[0].email);
            $('#post').val(res[0].post);
        }
    });

});

$(document).on('click','.delete_students',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        'type':'post',
        'url':'{{route("deletestudents")}}',
        'data':{'id':id},
        'datatype' :'json',
        'headers': {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the header
        },
        success:function(res){
            location.reload();
        }
    });
});
});
</script>
</html>