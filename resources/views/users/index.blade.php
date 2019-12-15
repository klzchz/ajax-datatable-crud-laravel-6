<!doctype html>
<html lang="pt-br">
  <head>
    <title>{{'Users' ?? $title}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    
  </head>
  <body>
  <div class="container">    
     <br />
     <h3 align="center">Usuarios</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create user</button>
     </div>
     <br />
   <div class="table-responsive">
    <table id="user_table" class="table table-bordered table-striped">
     <thead>
      <tr>
            <th>Name</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    
  </body>
  <script></script>
</html>
@include('users.modal')


<script>
$(document).ready(function(){

// Listando usuarios
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
//Abriu a modal
$("#create_record").click((e)=>{
    $('#formModal').modal('show');
});

// pega o formulario
$("#user_form").on('submit',function(e){
    e.preventDefault();
    var action_url = '';

    if($('#action').val() ==  'Add')
    {
      action_url = "{{route('users.store')}}";
    }

    $.ajax({
        url:action_url,
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",

        success:(data)=>{
          $('#form_result').html('');
          console.log(data);
          var html ='<div class="alert alert-success">'+data.success+'</div>';

          $('#user_form').trigger('reset');
          $('#user_table').DataTable().ajax.reload();
          $('#form_result').html(html);

        },
        error:(data)=>{
          $('#form_result').html('');
          console.log(data.responseJSON.errors);
            var errors = data.responseJSON.errors;
            
            var html = '<div class="alert alert-danger text-center">';

            $.each(errors, function(key,value) {
              html += '<p >'+value+'</p>';
            });
              
            html +=  "</div>";
            $('#form_result').html(html);


        }


    })
    
})

// $('#action_button').on('click',function(e){
//      e.preventDefault();
//      $('#formModal').modal('hide');

// });

});

</script>