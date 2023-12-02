/*for password = confirm password*/

var password = document.getElementById("password")
  , confirm_pass = document.getElementById("confirm_pass");

function validatePassword(){
  if(password.value != confirm_pass.value) {
    confirm_pass.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_pass.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_pass.onkeyup = validatePassword;

/*terms and condition*/

function disableSubmit() {
    document.getElementById("checkfirst").disabled = true;
   }
  
    function activateButton(element) {
  
        if(checkfirst.checked) {
          document.getElementById("submit").disabled = false;
         }
         else  {
          document.getElementById("submit").disabled = true;
        }
  
    }
