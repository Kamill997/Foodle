function pick(json)
{
    console.log(json);
    const photo=document.querySelector(".pick");
    
    for(result of json)
    {
      if(result.Nome=="Gif-Delivery")
      {
        photo.style.backgroundImage='url('+result.Img+')';
      }
      if(result.Nome=="Food")
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

function photo()
{
    fetch("login/photo").then(searchResponse).then(pick);
}

window.onload=function()
{
    photo();
}
