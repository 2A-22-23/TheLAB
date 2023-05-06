function saisie(){
    var name=document.getElementById("name").value; 
    var email=document.getElementById("email").value; 
    var error=document.querySelector("#error");
    var error1=document.querySelector("#error1");
    var subject=document.getElementById("subject").value;
    var description=document.getElementById("description").value;
    var error2=document.querySelector("#error2");
    var error3=document.querySelector("#error3");

    var letters = /^[A-Za-z]+$/; // expression régulière pour les lettres seulement
    var validEmail = /\S+@\S+\.\S+/; // expression régulière pour l'email valide

    if (name.length == 0){
        error.innerHTML="Veuillez saisir votre nom.";
        error.style.color="red";
    }
    else if (!name.match(letters)){
        error.innerHTML="Veuillez saisir seulement des lettres.";
        error.style.color="red";
    }
    else
    {
        error.innerHTML="Correct";
        error.style.color="green";  
    }

    if (email.length == 0){
        valid = false;
        error1.innerHTML="Veuillez saisir votre email.";
        error1.style.color="red";
    }
    else if (!email.match(validEmail)){
        valid = false;
        error1.innerHTML="Veuillez saisir une adresse email valide.";
        error1.style.color="red";
    }
    else
    {
        error1.innerHTML="Correct";
        error1.style.color="green";  
    }

    if (subject.length == 0){
        error2.innerHTML="Veuillez saisir votre subject.";
        error2.style.color="red";
    }
    else
    {
        error2.innerHTML="Correct";
        error2.style.color="green";  
    }

    if (description.length == 0){
        error3.innerHTML="Veuillez saisir votre description";
        error3.style.color="red";
    }
    else
    {
        error3.innerHTML="Correct";
        error3.style.color="green";  
    } 
}

function envoyer(){
    var name=document.getElementById("name").value; 
    var email=document.getElementById("email").value;
    var subject=document.getElementById("subject").value; 
    var description=document.getElementById("description").value; 
    var dateCreation=document.getElementById("dateCreation").value; 
    if (name.length==0 || email.length==0 || subject.length==0 || description.length==0 || dateCreation.length==0 )
    alert("completer les champs");
}
