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
    <form action="api/posts" method='post' id='formposts'>
        @csrf
        <div class="outer_div">
   
        <div class="alert alert-success alert-dismissible success-msg">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
        <div class="alert alert-danger alert-dismissible error-msg">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
        <div class="app_name_div">
            User Registration
        </div>
        <div class="names_div">
              <input type='text' class='first_name' name='firstname' placeholder='First Name' value="{{old('first_name')}}"> </input>
              <input type='text' class='last_name' name='lastname' placeholder='Last Name' value="{{old('last_name')}}"> </input>
        </div>
              <input type='email' class='email' name='email' placeholder='Email' value="{{old('email')}}"> </input>
              <input type='password' class='password' name='password' placeholder='Password' value="{{old('password')}}"> </input>
              <select name="gender" class="gender">
                 <option value="{{ old('gender') }}" selected disabled hidden> @if(old('gender') != "") {{ old('gender') }} @else {{'Gender'}} @endif </option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
                 <option value="Other">Other</option>
                </select>
              <input type='submit' value='Submit'  class='submit_btn' name='submit_btn'></input>
              <a href='/'>Login</a>
        
        </div>
        </form>
    </body>
    <script>
        $(document).ready(function(){
            $('.submit_btn').one('click',(event)=>{
               // Perform AJAX request to submit form data
                $('#formposts').submit(function(e){
                e.preventDefault(); // Prevent form submission
                      // Serialize form data into an array of objects
                   var formDataArray = $(this).serializeArray();

                   // Convert form data array to JSON
                   var jsonData = {};
                    $.each(formDataArray, function(index, field){
                    jsonData[field.name] = field.value;
                       });
                    jsonData = JSON.stringify(jsonData);
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    contentType: 'application/json',
                    data: jsonData, 
                    success: function(response){
                    // console.log(response);
                        var keys = Object.keys(response);
                        if(keys[0] == 'success'){
                            $('.success-msg').text(response[keys[0]]);
                            $('.success-msg').css('display','block');
                            setTimeout(() => {
                            $('.success-msg').css('display','none');
                          }, 1500);
                        }
                        else if(keys[0] == 'fail'){
                            $('.error-msg').text(response[keys[0]]);
                            $('.error-msg').css('display','block');
                            setTimeout(() => {
                            $('.error-msg').css('display','none');
                          }, 1500);
                        }
                        else{
                        $.each(keys, function(key, value) { 
                            $('.error-msg').text(response[value][0]);
                            $('.error-msg').css('display','block');
                              return false; // breaks
                          });
                          setTimeout(() => {
                            $('.error-msg').css('display','none');
                          }, 1500);
                        }
                    }
  
                });
            });

            });

        });
        </script>
</html>
