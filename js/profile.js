

function user_profile(){

    var  name=document.getElementById('name');
    var s_name=document.getElementById('s_name');
    var dob=document.getElementById('dob');
    var email=document.getElementById('email');

    var address=document.getElementById('address');
    var p_no=document.getElementById('p_no');

    var country=document.getElementById('country');
    var state=document.getElementById('state');

   var age= calculate_age(dob.value);
  
   

const user_data=  "email=" + email.value+"&name=" + name.value + "& s_name=" + s_name.value+ "&age=" + age + "& address=" + address.value +"&p_no=" + p_no.value + "& country=" + country.value+"&state=" + state.value;



    var request = new XMLHttpRequest();
    

  

    request.onload = () => {
        let responseObject = null;
    
        try {
            responseObject = (request.responseText);

            
            
        } catch (e) {
            console.error('Could not parse JSON!');
        }
    
        if (responseObject) {
            
            handle_request(name.value,email.value);

        }
    };

    request.open("POST", "php/profile.php",true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(user_data);

}
function calculate_age(dob){
    var today = new Date();
var dob = new Date(dob); 
var diffInMillis = today.getTime() - dob.getTime();
var ageInMillis = 1000 * 60 * 60 * 24 * 365.25;
var age = Math.floor(diffInMillis / ageInMillis);
return age;

}

function handle_request(name,email){
   

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("main").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "php/index.php?name="+name+"&email="+email, true);
      xhttp.send();
      
}

