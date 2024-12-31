function checkName(event) {
    const input = event.currentTarget;
    
    if (input.value.length > 0) 
    {
        input.parentNode.parentNode.classList.remove('errore');
    } 
    else 
    {
        input.parentNode.parentNode.classList.add('errore');
    }
    
}

function ResponseCheckUsername(json) {
    if (!json.exists)
    {
        document.querySelector('.Username').classList.remove('errore');
    } 
    else 
    {
        document.querySelector('.Username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.Username').classList.add('errore');        
    }
}

function ResponseCheckEmail(json) 
{
    if (!json.exists) 
    {
        document.querySelector('.Email').classList.remove('errore');
    } 
    else 
    {
        document.querySelector('.Email span').textContent = "Email già utilizzata";
        document.querySelector('.Email').classList.add('errore');
    }
}

function fetchResponse(response) 
{
    return response.json();
}

function checkUsername() 
{
    const input = document.querySelector('.Username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) 
    {
        input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.parentNode.classList.add('errore');
    } 
    else 
    {
        fetch("registration/Username/"+encodeURIComponent(input.value)).then(fetchResponse).then(ResponseCheckUsername);
    }    
}

function checkEmail() 
{
    const emailInput = document.querySelector('.Email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) 
    {
        document.querySelector('.Email span').textContent = "Email non valida";
        document.querySelector('.Email').classList.add('errore');
    } 
    else 
    {
        fetch("registration/Email/"+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(ResponseCheckEmail);
    }
}

function checkPassword() 
{
    const passwordInput = document.querySelector('.Password input');
    if (passwordInput.value.length >= 8) 
    {
        document.querySelector('.Password').classList.remove('errore');
    } 
    else 
    {
        document.querySelector('.Password span').textContent = "Password debole";
        document.querySelector('.Password').classList.add('errore');
    }
}

function pickRegistration(json)
{
    console.log(json);
    const photo=document.querySelector(".pick");
    
    for(result of json)
    {
      if(result.Nome=="Order-Delivery")
      {
        photo.style.backgroundImage='url('+result.Img+')';
      }
      if(result.Nome=="Food-Background")
      {
          document.body.style.background='url('+result.Img+')';
      }
    }
}

function searchResponse(response)
{
    console.log(response);
    return response.json();
}

function photoregistration()
{
    fetch("registration/photo").then(searchResponse).then(pickRegistration);
}

window.onload=function()
{
    photoregistration();
}

document.querySelector('.Nome input').addEventListener('blur', checkName);
document.querySelector('.Cognome input').addEventListener('blur', checkName);
document.querySelector('.Username input').addEventListener('blur', checkUsername);
document.querySelector('.Email input').addEventListener('blur', checkEmail);
document.querySelector('.Password input').addEventListener('blur', checkPassword);