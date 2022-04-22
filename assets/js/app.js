$(document).ready(function() {

});
console.log('load');


function login() {
    var username = $('#username').val().trim();
    var password = $('#password').val().trim();

    
    $.ajax({        
        url: './process/auth.php',
        type: 'POST',
        data: {
            login: true,
            username: username,
            password: password
        },
        success: function(response) {
            
            console.log(response)
            if(response == 0){
                console.log(response);
            }
            else{
                window.location.href = "./index.php";
            }
         }
        
    });
}

function logout() {
    console.log('clic')
    $.ajax({        
        url: './process/auth.php',
        type: 'POST',
        data: { 
            logout: true
        },
        success: function(response) {
            console.log(response)
            if(response == 0){
                console.log(response);
            }
            else{
                window.location.href = "./index.php";
            }
        }
    });
}