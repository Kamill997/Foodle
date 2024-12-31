function contact(json)
{
    console.log(json);
    const footer=document.querySelector("#Chiusura");
    
    for(result of json)
    {
      if(result.Nome=="Footer")
      {
        footer.style.backgroundImage='url('+result.Img+')';
      }
      if(result.Nome=="Contattaci")
      {
        document.body.style.backgroundImage='url('+result.Img+')';
      }
    }
}

function searchResponse(response)
{
    console.log(response);
    return response.json();
}

function pick()
{
    fetch("contact/photo").then(searchResponse).then(contact);
}

function request(event)
{
    event.preventDefault();

    const form=new FormData();
    const email=document.getElementById("email").value;
    const messaggio=document.getElementById("messaggio").value;
    const dettagli=document.getElementById("dettagli").value;
    const token=document.querySelector('meta[name="csrf-token"]').content;
    
    form.append('Email',email);
    form.append('Messaggio',messaggio);
    form.append('Dettagli',dettagli);

    fetch("contact/request",{method:"POST",body:form,headers:{"X-CSRF-TOKEN":token}}).then(searchResponse).then(added);
}

function added(json)
{
    console.log(json);
    const error=document.querySelector(".errore-msg");
    const success=document.querySelector(".successo-msg");
    const email=document.getElementById("email");
    const messaggio=document.getElementById("messaggio");
    const dettagli=document.getElementById("dettagli");

    if(email!='' || messaggio!='' || dettagli!='')
    {
      messaggio.value='';
      dettagli.value='';
      if(json.message=="Richiesta inviata con successo")
      {
        success.classList.remove("hidden");
        success.textContent=json.message;
        email.value='';
        setTimeout(function()
        {
          (success).classList.add("hidden")
          success.innerHTML='';
        },2500);

      }
      else
      {
        error.classList.remove("hidden");
        error.textContent=json.message;
        setTimeout(function()
        {
          (error).classList.add("hidden")
          error.innerHTML='';
        },2500);
      }
    } 
}

function checkEmail() 
{
    const emailInput = document.querySelector('.Email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) 
    {
        document.querySelector('.Email').classList.add('errore');
    } 
    else 
    {
        document.querySelector('.Email').classList.remove('errore');
    }
}

function checkMsg(event) 
{
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

window.onload=function()
{
    pick();
}

document.querySelector('.Email input').addEventListener('blur', checkEmail);
document.querySelector('.Oggetto input').addEventListener('blur', checkMsg);
document.querySelector('.Messaggio textarea').addEventListener('blur', checkMsg);
document.querySelector('#contact').addEventListener('submit',request);