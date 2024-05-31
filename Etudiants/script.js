function sendMail(event,rand) {
    if (event) {
        event.preventDefault();
    }
      
    var params = {
      name: "bourssi",
      email: document.getElementById("email").value,
      message: rand,
    };
    const serviceID = "service_kierzjh";
    const templateID = "template_o59s90f";
  
      emailjs.send(serviceID, templateID, params)
      .then(res=>{
          console.log(res);
          sendCodeToPHP(params.message); 
          window.location.href="verifier_code.php";
      })
      .catch(err=>console.log(err));
  }
  function sendCodeToPHP(message) {
    fetch('verifier_code.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `code=${message}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        // Vous pouvez gérer la réponse du serveur ici
    })
    .catch(error => console.error('Error:', error));
}

// function getRandomIntWithLength(length) {
//     const min = Math.pow(10, length - 1);
//     const max = Math.pow(10, length) - 1;
//     return Math.floor(Math.random() * (max - min + 1)) + min;
//   }