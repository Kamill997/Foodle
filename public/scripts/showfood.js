function onJImgInte(json)
{
    console.log(json);
    const photo=document.querySelector("#Intestazione");

    photo.style.backgroundImage='url('+json.image+')';
}

function onGallery(json)
{
    console.log(json);
    const footer=document.querySelector("#Chiusura");

    for(result of json)
    {
      if(result.Nome=='Footer')
      {
        footer.style.backgroundImage='url('+result.Img+')';
      }
    }
}

function onMenu(json)
{
  console.log(json);

  const sect=document.querySelector("#elem");

  sect.innerHTML='';

  for(result of json)
  {
    const container = document.createElement("div");
    container.classList.add("flex-item");

    const cont2=document.createElement("div");
    cont2.classList.add("cont");

    const title = document.createElement("h2");
    title.classList.add("testo");
    title.textContent = result.Nome;

    const bord=document.createElement("div");
    bord.classList.add("bord");

    const immagine = document.createElement("img");
    immagine.src = result.Img;

    const testo = document.createElement("span");
    testo.classList.add("mostra");
    testo.textContent = "Clicca per visualizzare di che ricetta tipica si tratta";
    
    const descrizione=document.createElement("div");
    descrizione.classList.add("hidden");
    descrizione.classList.add("descrizione");
    
    const span=document.createElement("span");
    span.textContent=result.Descrizione;

    descrizione.appendChild(span);

    const prezzo=document.createElement("h3");
    prezzo.textContent="€"+result.Costo;

    const form=document.createElement("form");
    form.setAttribute("method","POST");
    form.setAttribute("class","addTo");

    const pid=document.createElement("input");
    pid.setAttribute("type","hidden");
    pid.setAttribute("class","pid");
    pid.setAttribute("name","pid");
    pid.setAttribute("value",result.id);

    const pnome=document.createElement("input");
    pnome.setAttribute("type","hidden");
    pnome.setAttribute("class","pnome");
    pnome.setAttribute("name","pnome");
    pnome.setAttribute("value",result.Nome);

    const pprezzo=document.createElement("input");
    pprezzo.setAttribute("type","hidden");
    pprezzo.setAttribute("class","pprezzo");
    pprezzo.setAttribute("name","pprezzo");
    pprezzo.setAttribute("value",result.Costo);
    
    const quantita=document.createElement("input");
    quantita.setAttribute("type","number");
    quantita.setAttribute("name","qnt");
    quantita.setAttribute("class","qnt");
    quantita.setAttribute("min","1");
    quantita.setAttribute("max","20");
    quantita.setAttribute("value","1");

    const pImg=document.createElement("input");
    pImg.setAttribute("type","hidden");
    pImg.setAttribute("class","pImg");
    pImg.setAttribute("name","pImg");
    pImg.setAttribute("value",result.Img);

    const bottone = document.createElement("button");
    bottone.setAttribute("type",'submit');
    bottone.setAttribute("name","sb");
    bottone.classList.add("preferiti");

    const cartimg=document.createElement("img");
    cartimg.src="img/cart.png";

    bottone.appendChild(cartimg);
   
    container.appendChild(cont2);
    cont2.appendChild(immagine);
    container.appendChild(title);
    container.appendChild(bord);
    container.appendChild(testo);
    container.appendChild(descrizione);
    container.appendChild(prezzo);
    testo.addEventListener("click",descr);
    container.appendChild(form);
    form.appendChild(pid);
    form.appendChild(pnome);
    form.appendChild(pprezzo);
    form.appendChild(quantita);
    form.appendChild(pImg);
    form.appendChild(bottone);
    form.addEventListener('submit',Aggiungi);
    sect.appendChild(container);
  }
}

function searchResponse(response)
{
    console.log(response);
    return response.json();
}

function changeImg()
{
    fetch("menu/header").then(searchResponse).then(onJImgInte);
    fetch("menu/photo").then(searchResponse).then(onGallery);
}

/*function menu(event)
{
  event.preventDefault();
  const content=document.querySelector("#dish").value;

  console.log(content);

  fetch("menu/showMenu/"+encodeURIComponent(content)).then(searchResponse).then(onMenu);
}*/

function descr(event)
{
  const testo=event.currentTarget;
  
  const desc=testo.parentNode.querySelector(".descrizione");
  desc.classList.remove("hidden");
  testo.textContent="Nascondi";

  testo.removeEventListener("click",descr);
  testo.addEventListener("click",nodescr);
}


function nodescr(event)
{
  const testo=event.currentTarget;
 
  const desc=testo.parentNode.querySelector(".descrizione");
  desc.classList.add("hidden");
  testo.textContent="Clicca per visualizzare di che ricetta tipica si tratta";

  testo.removeEventListener("click",nodescr);
  testo.addEventListener("click",descr);
}

function esito(response){
  console.log(response);
  return response.text();
}

function mostra(json)
{
  console.log(json);
  const success=document.querySelector(".successo");
  const error=document.querySelector(".errore");

  if(json.exists===true)
  {
    error.classList.remove("hidden");
    setTimeout(function()
    {
      (error).classList.add("hidden")
    },2000);
  }
  else
  {
    success.classList.remove("hidden");
    setTimeout(function()
    {
      (success).classList.add("hidden")
    },2000);
  }
}

function FilterFood(event)
{
  const select=document.querySelector('#Tipo').value;
  console.log(select);
  fetch("menu/showMenu/"+select).then(searchResponse).then(onMenu);

}

function Aggiungi(event)
{
  event.preventDefault();

  console.log(event.currentTarget);

  const current=event.currentTarget;

  const form=new FormData();

  const id=current.querySelector(".pid").value;

  const nome=current.querySelector(".pnome").value;

  const prezzo=current.querySelector(".pprezzo").value;

  const img=current.querySelector(".pImg").value;

  const qnt=current.querySelector(".qnt").value;

  const token=document.querySelector('meta[name="csrf-token"]').content;

  console.log(token);

  form.append('pid',id);
  form.append('pnome',nome);
  form.append('quantita',qnt);
  form.append('pprezzo',prezzo);
  form.append('pImg',img);
  
  console.log(id);
  console.log(nome);
  console.log(qnt);
  console.log(prezzo);
  console.log(img);

  fetch("menu/add",{method:'POST',body:form,headers:{"X-CSRF-TOKEN":token}}).then(searchResponse).then(mostra);  
}

/*function aggiornaEventi()
{
    fetch("menu/welcomeMenu").then(searchResponse).then(onMenu2);
}*/

function CercaPiatti()
{
  const cerca=document.getElementById("barra").value;
  const piatti=document.querySelectorAll(".flex-item");

  for(let piatto of piatti)
  {
    if(piatto.querySelector("h2").textContent.toLowerCase().indexOf(cerca.toLowerCase())===-1)
    {
      piatto.classList.add("hidden");
    }
    
    else
    {
      piatto.classList.remove("hidden");
    }
  }
}

/*const form = document.querySelector("#search");
form.addEventListener("submit",menu);*/


window.onload=function()
{
  changeImg();
  FilterFood();
}