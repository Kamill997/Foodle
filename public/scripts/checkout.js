function ShowItem(json)
{
    console.log(json);

    let tot_prezzo=0;

    const tbody=document.querySelector(".item");

    const form=document.querySelector("#validate");

    for(result of json)
    {
        const nome=document.createElement("p");
        nome.textContent=result.Nome_Cibo+" x"+result.Quantita+": €"+result.Tot;

        const id=document.createElement("input");
        id.setAttribute("type","hidden");
        id.setAttribute("id","pid");
        id.setAttribute("name","Pid[]");
        id.setAttribute("value",result.ID_Cibo);

        tot_prezzo=tot_prezzo+parseFloat(result.Tot);

        form.appendChild(id);
        tbody.appendChild(nome);

    }

    const tot=document.createElement("span");
    tot.classList.add("totale");
    tot.textContent="Prezzo totale: €"+tot_prezzo;

    const input=document.createElement("input");
    input.setAttribute("type","hidden");
    input.setAttribute("id","tot");
    input.setAttribute("name","Tot");
    input.setAttribute("value",tot_prezzo);

    form.appendChild(input);

    tbody.appendChild(tot);
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
        document.querySelector('.Email').classList.remove('errore');
    }
}

function checkPhone()
{
    const PhoneInput = document.querySelector('.Cellulare input');
    if(!/^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(PhoneInput.value)) 
    {
        document.querySelector('.Cellulare span').textContent = "Numero di telefono non valido";
        document.querySelector('.Cellulare').classList.add('errore');
    } 
    else 
    {
        document.querySelector('.Cellulare').classList.remove('errore');
    }
}

function checkMsg(event) 
{
    const input = event.currentTarget;
    if (input.value.length > 1) 
    {
        input.parentNode.parentNode.classList.remove('errore');
    } 
    else 
    {
        input.parentNode.parentNode.classList.add('errore');
    }
}

document.querySelector('.Email input').addEventListener('blur', checkEmail);
document.querySelector('.Cellulare input').addEventListener('blur', checkPhone);
document.querySelector('.Indirizzo input').addEventListener('blur', checkMsg);
document.querySelector('.Provincia input').addEventListener('blur', checkMsg);
document.querySelector('.Proprietario input').addEventListener('blur', checkMsg);

function HeaderCheckout(json)
{
    console.log(json);
    const photo=document.querySelector("#Intestazione");
    const footer=document.querySelector("#Chiusura");
    
    for(result of json)
    {
      if(result.Nome=="checkout")
      {
        photo.style.backgroundImage='url('+result.Img+')';
      }
      if(result.Nome=="Footer")
      {
        footer.style.backgroundImage='url('+result.Img+')';
      }
    }
}

function searchResponse(response)
{
    console.log(response);
    return response.json();
}

function checkout(event)
{   
    fetch("checkout/item").then(searchResponse).then(ShowItem);
}

function Header()
{
    fetch("checkout/photo").then(searchResponse).then(HeaderCheckout);
}

const stripe = Stripe('pk_test_51J2AmWB3KDsI1CNTYwqR4h4gH4asHVHq0o8Fg3DiRi1TQrfF6U1RIeRxvjjdphEDi4BT62JAaUU9jUx7risO6SIv00DWHk83jF');
console.log(stripe);
const elements = stripe.elements();
const cardElement = elements.create('card');
cardElement.mount('#card-element');
cardElement.addEventListener('change',check_card);

function check_card(event)
{
    const displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
}

const form = document.getElementById('validate');
form.addEventListener('submit', token_submit);


function stripeTokenHandler(token) 
{
    const form = document.getElementById('validate');
    const stripetoken = document.createElement('input');
    stripetoken.setAttribute('type', 'hidden');
    stripetoken.setAttribute('name', 'stripeToken');
    stripetoken.setAttribute('value', token.id);
    form.appendChild(stripetoken);
    form.submit();
}

function token(result)
{
    console.log(result);
    if (result.error) 
    {
        const errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
    }
    else 
    {
        stripeTokenHandler(result.token);
    }
}

function token_submit(event) 
{
    event.preventDefault();
  
    stripe.createToken(cardElement).then(token);
}

window.onload=function()
{
    checkout();
    Header();
}