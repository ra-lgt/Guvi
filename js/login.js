function user_login(){
    const cookies = document.cookie.split(';');
let sessionId = '';

for (let i = 0; i < cookies.length; i++) {
  const cookie = cookies[i].trim();

  if (cookie.startsWith('PHPSESSID=')) {
    sessionId = cookie.substring('PHPSESSID='.length, cookie.length);
    break;
  }
}

localStorage.setItem('session',sessionId);


    var email=document.getElementById('mail');
    var pass=document.getElementById('pass');

    var check_email=check_special_symbols(email.value);
    
    if(check_email){
        alert("only @ and dot is allowed")
    }

    const user_data= "email=" + email.value + "& password=" + pass.value;

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
            
            location.href="profile.html";
        }
    };
    

    request.open("POST", "php/login.php",true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");



    request.send(user_data);

console.log(user_data);

}


function check_special_symbols(string){
    const specialChars = /[`!#$%^&*()_+\-=\[\]{};':"\\|,<>\/?~]/;
  return specialChars.test(string);
}