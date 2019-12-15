<!doctype html>
<html lang="pt-br">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  </head>
  <body>
  <div class="container">    
     <br />
     <h3 align="center">How to Delete or Remove Data From Mysql in Laravel 6 using Ajax</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
     </div>
     <br />
   <div class="table-responsive">
    <table id="user_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th > Name</th>
            <th>Email</th>
            <th>Action</th>
      </tr>
     </thead>
    </table>
   </div>
   <br />
   <br />
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        

    
  </body>
  <script></script>
</html>
@include('users.modal')


<script>
$(document).ready(function(){

$("#user_table").DataTable({
    processing:true,
    serverSide:true,
    ajax:{
        url:"{{route('users.index')}}",
    },
    columns:[
          {data:'name', name:'name'},
          {data:'email', name:'email'},
          {data:'action',name:'action', orderable:false},

    ]
});

$("#create_record").click((e)=>{
  e.preventDefault();

    $('#formModal').modal('show');

});

$('#action_button').on('click',function(e){
     e.preventDefault();
     $('#formModal').modal('hide');

});

});

</script>