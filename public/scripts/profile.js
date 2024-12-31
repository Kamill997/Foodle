function profile(json)
{
    console.log(json);
    const footer=document.querySelector("#Chiusura");
    
    for(result of json)
    {
      if(result.Nome=="Footer")
      {
        footer.style.backgroundImage='url('+result.Img+')';
      }
      if(result.Nome=="BackProfile")
      {
        document.body.style.backgroundImage='url('+result.Img+')';
      }
    }
}

function update(json)
{
    console.log(json)
    const label=document.querySelector("#appendi");
    label.innerHTML='';
    
    for(result of json)
    {
      const img=document.createElement('img');
      img.src="storage/"+result.Pic;
      label.appendChild(img);
    }
}

function change(json)
{
  console.log(json);
  const old_pass=document.getElementById("old_pass");
  const new_pass=document.getElementById("new_pass");
  const repeat_pass=document.getElementById("repeat_pass");
  const error=document.querySelector(".Informazioni .errore-msg");
  const success=document.querySelector(".Informazioni .successo-msg");
  
    if(old_pass!='' && new_pass!='' && repeat_pass!='')
    {
      old_pass.value='';
      new_pass.value='';
      repeat_pass.value='';
      if(json.message=="Password cambiata con successo")
      {
        success.classList.remove("hidden");
        const span=document.createElement("span");
        span.textContent=json.message;
        success.appendChild(span);
        setTimeout(function()
        {
          (success).classList.add("hidden")
          success.innerHTML='';
        },2000);

      }
      else
      {
        error.classList.remove("hidden");
        const span=document.createElement("span");
        span.textContent=json.message;
        error.appendChild(span);
        setTimeout(function()
        {
          (error).classList.add("hidden")
          error.innerHTML='';
        },2000);

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
    fetch("profile/photo").then(searchResponse).then(profile);
}

function upload(event)
{
  event.preventDefault();
  const file=document.getElementById("upload").files[0];
  const size=file.size/1024/1024;
  const estensioni = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  const fileExten=document.getElementById("upload").value;

  const token=document.querySelector('meta[name="csrf-token"]').content;
  const error=document.querySelector(".profilo .errore-msg");

  const form=new FormData();

  form.append('Upload',file);

  if(estensioni.exec(fileExten))
  {
    if(size<=5)
    {
      fetch("profile/upload",{method:"POST",body:form,headers:{"X-CSRF-TOKEN":token}}).then(searchResponse).then(aggiornaEventi)
    }
    else
    {
      error.classList.remove("hidden");
      const span=document.createElement("span");
      span.textContent="FILE TROPPO GRANDE.\nSELEZIONA UNA FOTO CHE PESI MENO DI 5MB";
      error.appendChild(span);
      setTimeout(function()
      {
        (error).classList.add("hidden")
        error.innerHTML='';
      },4000);
    }
  }
    else
    {
      error.classList.remove("hidden");
      const span=document.createElement("span");
      span.textContent="FORMATO FILE NON ACCETTATO\n"+file.name;
      error.appendChild(span);
      setTimeout(function()
      {
        (error).classList.add("hidden")
        error.innerHTML='';
      },4000);
    }
}

function reset(event)
{
  event.preventDefault();

  const old_pass=document.getElementById("old_pass").value;
  const new_pass=document.getElementById("new_pass").value;
  const repeat_pass=document.getElementById("repeat_pass").value;
  const token=document.querySelector('meta[name="csrf-token"]').content;
  const form=new FormData();

  console.log(old_pass);

  form.append('old_pass',old_pass);
  form.append('new_pass',new_pass);
  form.append('repeat_pass',repeat_pass);

  fetch("profile/reset",{method:"POST",body:form,headers:{"X-CSRF-TOKEN":token}}).then(searchResponse).then(change)
}

function aggiornaEventi()
{
  fetch("profile/user").then(searchResponse).then(update);
}


document.getElementById("reset").addEventListener("submit",reset);
document.getElementById("upload").addEventListener("change",upload);

window.onload=function()
{
    pick();
}
