
function verifier(rand_code){

  var n = document.getElementById("verify-email").value;
  if(n == rand_code){
      
    window.location.href = "confirm_code.php";


  }
  else{
    Swal.fire({
      icon: 'error',
      title: 'Erreur',
      text: 'Le code est incorrect !!!!'
  });
  }
}