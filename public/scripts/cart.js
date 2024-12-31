function ShowItem(json)
{
    console.log(json);

    let tot_prezzo=0;

    console.log(json.length);
   
    if(json.length>0)
    {
    const tbody=document.querySelector("tbody");
    tbody.innerHTML='';

    const th1=document.createElement("th");
    const th2=document.createElement("th");
    th2.textContent="Prodotto";
    const th3=document.createElement("th");
    th3.textContent="Prezzo";
    const th4=document.createElement("th");
    th4.textContent="Quantita";
    const th5=document.createElement("th");
    th5.textContent="Totale";
    const th6=document.createElement("th");
    th6.textContent="Elimina elemento";

    tbody.appendChild(th1);
    tbody.appendChild(th2);
    tbody.appendChild(th3);
    tbody.appendChild(th4);
    tbody.appendChild(th5);
    tbody.appendChild(th6)


    for(result of json)
    {
        const tr=document.createElement("tr");
        const td=document.createElement("td");
        const td2=document.createElement("td");
        const td3=document.createElement("td");
        const td4=document.createElement("td");
        const td5=document.createElement("td");
        const td6=document.createElement("td");

        const img=document.createElement("img");
        img.src=result.Img_Cibo;

        const nome=document.createElement("h3");
        nome.textContent=result.Nome_Cibo;

        const form=document.createElement("form");
        form.setAttribute("method","GET");
        form.setAttribute("id","Rimuovi");

        const input=document.createElement("input");
        input.setAttribute("type","hidden");
        input.setAttribute("name","id");
        input.setAttribute("class","id");
        input.setAttribute("value",result.ID_Cibo);

        const form2=document.createElement("form");
        form2.setAttribute("method","POST");
        form2.setAttribute("id","Cambia");

        const quant=document.createElement("input");
        quant.setAttribute("type","number");
        quant.setAttribute("name","qnt");
        quant.setAttribute("class","qnt");
        quant.setAttribute("min","1");
        quant.setAttribute("max","20");
        quant.setAttribute("value",result.Quantita);

        const cid=document.createElement("input");
        cid.setAttribute("type","hidden");
        cid.setAttribute("class","cid");
        cid.setAttribute("name","cid");
        cid.setAttribute("value",result.id);

        const pprezzo=document.createElement("input");
        pprezzo.setAttribute("type","hidden");
        pprezzo.setAttribute("class","pprezzo");
        pprezzo.setAttribute("name","pprezzo");
        pprezzo.setAttribute("value",result.Prezzo_Cibo);

        const bottone=document.createElement("button");
        bottone.setAttribute("type","submit");
        bottone.setAttribute("name","sb");
        bottone.classList.add("remove");

        const immag=document.createElement("img");
        immag.src="img/delete.png";

        bottone.appendChild(immag);

        const prezzo=document.createElement("h3");
        prezzo.textContent="€"+result.Prezzo_Cibo;

        const quantita=document.createElement("h3");
        quantita.textContent=result.Quantita;

        const tot_cibo=document.createElement("h3");
        tot_cibo.textContent="€"+result.Tot;

        tot_prezzo=tot_prezzo+parseFloat(result.Tot);
        
     
        tbody.appendChild(tr);
        tr.appendChild(td);
        tr.appendChild(td2)
        tr.appendChild(td3)
        tr.appendChild(td4);
        tr.appendChild(td5);
        tr.appendChild(td6);
        td.appendChild(img);
        td2.appendChild(nome);
        td3.appendChild(prezzo);

        td4.appendChild(form2);
        form2.appendChild(cid);
        form2.appendChild(pprezzo);
        form2.appendChild(quant);
        form2.addEventListener("submit",ChangeQnt);

        td5.appendChild(tot_cibo);

        td6.appendChild(form);
        form.appendChild(input);
        form.appendChild(bottone);
        form.addEventListener("submit",Rimuovi);
    }

    const tr2=document.createElement("tr");
    const td2=document.createElement("td");
    const tr3=document.createElement("tr");
    const td3=document.createElement("td");

    const bottone_all=document.createElement("button");
    bottone_all.classList.add("remove_all");
    bottone_all.innerHTML = "Elimina tutto";
    bottone_all.addEventListener("click",RimuoviTutto);

    const button_checkout=document.createElement("button");
    button_checkout.classList.add("checkout");

    const checkout=document.createElement("a");
    checkout.href="checkout";
    checkout.innerHTML="Checkout";

    const Totale=document.createElement("h3");

    Totale.textContent="Prezzo totale: €"+tot_prezzo;

   
    tbody.appendChild(tr2);
    tbody.appendChild(tr3);
    tr2.appendChild(td2);
    tr3.appendChild(td3);
    td2.appendChild(Totale);
    td2.appendChild(bottone_all);
    td3.appendChild(button_checkout);
    button_checkout.appendChild(checkout);
}
else
{
    const sect=document.querySelector(".Contenitore");
    sect.style.display="block";
    sect.innerHTML='';
    const div=document.createElement("div");
    div.classList.add("Content");
    const div2=document.createElement("div");
    const img=document.createElement("img");
    img.src="img/Empty.png";
    const h1=document.createElement("h1");
    h1.textContent="Il tuo carrello è attualmente vuoto";
    const p=document.createElement("p");
    p.textContent="Seleziona qualcosa dal nostro menù prima di procedere al checkout";
    const div3=document.createElement("div");
    const button=document.createElement("button");
    const a=document.createElement("a");
    a.href="menu";
    a.textContent="Vai al menù";

    div2.appendChild(img);
    div2.appendChild(h1);
    div2.appendChild(p);
    div2.appendChild(div3);
    button.appendChild(a);
    div3.appendChild(button);
    div.appendChild(div2)
    sect.appendChild(div);
}
}

function HeaderOrder(json)
{
    console.log(json);
    const footer=document.querySelector("#Chiusura");
    const photo=document.querySelector("#Intestazione");  
    
    for(result of json)
    {
      if(result.Nome=="Cart_Header")
      {
        photo.style.backgroundImage='url('+result.Img+')';
      }
      
      if(result.Nome=='Footer')
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

function esito(response)
{
    console.log(response);
    return response.text();
}

function ChangeQnt(event)
{
    event.preventDefault();

    const form=new FormData();

    const cart=event.currentTarget.querySelector(".cid").value;
    const prezzo=event.currentTarget.querySelector(".pprezzo").value;
    const quantita=event.currentTarget.querySelector(".qnt").value;
    const token=document.querySelector('meta[name="csrf-token"]').content;

    console.log(event.currentTarget);
    console.log(cart);
    console.log(quantita);
    console.log(prezzo);
    console.log(token);

    form.append('cid',cart);
    form.append('pprezzo',prezzo);
    form.append('qnt',quantita);

    fetch("cart/update",{method:'POST',body:form,headers:{"X-CSRF-TOKEN":token}}).then(aggiornaEventi);
}

function Rimuovi(event)
{
    event.preventDefault();

    const id=event.currentTarget.querySelector(".id").value;

    console.log(id);

    fetch("cart/delete/"+id).then(aggiornaEventi);
}

function RimuoviTutto(event)
{
    event.preventDefault();

    fetch("cart/deleteAll").then(aggiornaEventi);
}

function aggiornaEventi()
{
    fetch("cart/item").then(searchResponse).then(ShowItem);
}

function cart_item()
{
    fetch("cart/item").then(searchResponse).then(ShowItem);
}

function Header_Delivery()
{
    fetch("cart/photo").then(searchResponse).then(HeaderOrder);
}


window.onload=function()
{
    cart_item();
    Header_Delivery();
}