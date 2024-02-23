<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Managemen App</title>
         <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container dashboard_form col-sm-12 p-3 mt-5">
        <button class="btn btn-danger mb-2">Logout</button>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                <td>Sr.no</td>
                <td>Name</td>
                <td>Email</td>
                <td>Gender</td>
                </tr>
            </thead>
                <tbody>
                </tbody>
        </table>
    </div>
    </body>
    <script>
      $(document).ready(function(){
              $.ajax({
                  url: 'api/posts',
                  type: 'get',
                  contentType: 'application/json',
                  success: function(response){
                    var keys = Object.keys(response['posts']);
                    console.log(keys);
                    $('.table tbody').text('');
                    var no = 1;
                    $.each(keys, function(keys, value) { 
                            $('.table tbody').append('<tr><td>'+ no++ +'</td><td>'+ response['posts'][keys]['first_name'] +' ' +response['posts'][keys]['last_name'] +'</td><td>'+ response['posts'][keys]['email'] +'</td><td>'+ response['posts'][keys]['gender'] +'</td></tr>');
                          });
                    
                  }
              });
              $('button').one('click',(e)=>{
                e.preventDefault();
                location.replace("/");
              });

      });
      </script>
</html>
