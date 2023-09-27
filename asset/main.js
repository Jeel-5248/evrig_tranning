$(document).ready(function(){
    $('#submit').click(function(e){
        // e.preventDefault();
        let name=$('#name').val();
        let email=$('#email').val();
        let message=$('#message').val().trim();
        console.log(message);
        let nameRegx= /^[A-Za-z\s]*$/;
        let emailRegx=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;

        if(name=='' && email=='' && message.trim()==''){
            $('#error').html('Enter all Values');
            return false;
        }
       
else{
    $('#error').hide();
            if(name==''){
            $('#nameError').html('Please Enter Name');
            return false;
        }
        else if(!nameRegx.test(name)){
            $('#nameError').html('Enter Name only in alphabatics');
            return false;
        }
        else{
            $('#nameError').hide();
        }
        if(email==''){
            $('#emailError').html('Please Enter email');
            return false;
        }
        else if(!emailRegx.test(email)){
            $('#emailError').html('Please Enter Valid email in formate 123@gmail.com');
            return false;
        }
        else{
            $('#emailError').hide();
        }
        if(message==" "){
            $('#messageError').html('Please Enter Message');
            return false;
        }
    }
    $.ajax({
        'url': 'task1.php',
        'type':'post',
        'data':{
            'action':'submit_data',
            'name':name,
            'email':email,
            'message':message
        },
        'success': function (result) {
           console.log(result);
        },
       'error': function(err){
           console.log(err);
       }
    });
    })

    $('#reset').click(function(){
        window.location.href = window.location.href
    })
  });
