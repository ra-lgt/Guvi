function register(){
    var email=document.getElementById('email');
    var pass=document.getElementById('pass');
    var c_pass=document.getElementById('c_pass');
    var u_name=document.getElementById('u_name');


    var check_email=check_special_symbols(email.value);
    var check_u_name=check_special_symbols(u_name.value);

    if(pass.value!=c_pass.value){
        alert("passwords doesn't match")
    }
    
    if(check_email || check_u_name){
        alert("only @ and dot is allowed")
    }

    const user_data= "email=" + email.value + "& password=" + pass.value + "&u_name="+u_name.value;

    var request = new XMLHttpRequest();

    request.onload = () => {
        let responseObject = null;
    
        try {
            responseObject = (request.responseText);
            console.log(responseObject);
        } catch (e) {
            console.error('Could not parse JSON!');
        }
    
        if (responseObject) {
            location.href='login.html';
        }
        else{
            alert('error');
        }
    };
    

    request.open("POST", "php/register.php",true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");



    request.send(user_data);

console.log(user_data);

}


function check_special_symbols(string){
    const specialChars = /[`!#$%^&*()_+\-=\[\]{};':"\\|,<>\/?~]/;
  return specialChars.test(string);
}