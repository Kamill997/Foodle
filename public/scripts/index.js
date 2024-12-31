function onJImgInte(json)
{
  console.log(json);
    const photo=document.querySelector("#Intestazione");
   
    const photores=json.image;
    console.log(photores);
    
    photo.style.backgroundImage='url('+photores+')';
}

function onGallery(json)
{
  console.log(json);
  const gallery=document.querySelector("#Galleria .Foto");
  const marchi=document.querySelector("#Centro .Marchi");
  const marchi2=document.querySelector("#Centro .Marchi-2");
  const box=document.querySelector(".Box .Sinistra");
  const header=document.querySelector("#Intestazione");
  const footer=document.querySelector("#Chiusura");

  for(result of json)
  {  
    if(result.Nome=='KFC')
    {
        const div=document.createElement("div");
        div.classList.add("Kfc");

        const img=document.createElement("img");
        img.src=result.Img;
        const testo=document.createElement("h1");
        testo.textContent=result.Nome;

        div.appendChild(img);
        div.appendChild(testo);

        marchi.appendChild(div);
    }
    else if(result.Nome=='MC')
    {
        const div=document.createElement("div");
        div.classList.add("Mc");
        
        const img=document.createElement("img");
        img.src=result.Img;
        const testo=document.createElement("h1");
        testo.textContent=result.Nome;

        div.appendChild(img);
        div.appendChild(testo);

        marchi.appendChild(div);
    }
    else if(result.Nome=='STARBUCKS')
    {
        const div=document.createElement("div");
        div.classList.add("Starbucks");
        
        const img=document.createElement("img");
        img.src=result.Img;
        const testo=document.createElement("h1");
        testo.textContent=result.Nome;

        div.appendChild(img);
        div.appendChild(testo);

        marchi.appendChild(div);
    }
    else if(result.Nome=='CHIPOTLE')
    {
        const div=document.createElement("div");
        div.classList.add("Chipotle");
        
        const img=document.createElement("img");
        img.src=result.Img;
        const testo=document.createElement("h1");
        testo.textContent=result.Nome;

        div.appendChild(img);
        div.appendChild(testo);

        marchi2.appendChild(div);
    }
    else if(result.Nome=='BURGER KING')
    {
        const div=document.createElement("div");
        div.classList.add("BK");
        
        const img=document.createElement("img");
        img.src=result.Img;
        const testo=document.createElement("h1");
        testo.textContent=result.Nome;

        div.appendChild(img);
        div.appendChild(testo);

        marchi2.appendChild(div);
    }
    else if(result.Nome=='PIZZA HUT')
    {
        const div=document.createElement("div");
        div.classList.add("HUT");
        
        const img=document.createElement("img");
        img.src=result.Img;
        const testo=document.createElement("h1");
        testo.textContent=result.Nome;

        div.appendChild(img);
        div.appendChild(testo);

        marchi2.appendChild(div);
    }
    else if(result.Nome=='Box')
    {
        const img=document.createElement("img");
        img.src=result.Img;

        box.appendChild(img);
    }
    else if(result.Nome=='Header')
    {
        header.style.backgroundImage='url('+result.Img+')';
    }
    else if(result.Nome=='Footer')
    {
        footer.style.backgroundImage='url('+result.Img+')';
    }
    else if(result.Nome!='Header' && result.Nome!='Footer' && result.Nome!='Cart_Header' && result.Nome!='Delete' && result.Nome!='checkout' && result.Nome!='Cart' && result.Nome!='Contattaci' && result.Nome!='Gif-Delivery' && result.Nome!='Food' && result.Nome!='Order-Delivery' && result.Nome!='Food-Background' && result.Nome!='Success' && result.Nome!='BackProfile' && result.Nome!='Empty')
    {
        const div=document.createElement("div");
        
        const img=document.createElement("img");
        img.src=result.Img;

        div.appendChild(img);
        gallery.appendChild(div);
    }
  }
}

function searchResponse(response)
{
    console.log(response);
    return response.json();
}

function showGallery()
{
    fetch("home/photo").then(searchResponse).then(onGallery);
}

window.onload=showGallery;