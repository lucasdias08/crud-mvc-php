  window.addEventListener('resize', () => {
    sizeScreen();
  });
    
  window.onload = sizeScreen;

  function sizeScreen(){

    var largura = window.innerWidth;
    var windows = document.querySelectorAll(".windows");
    var item = document.querySelectorAll(".item");
    var btn = document.querySelectorAll(".btn-outline-light");

    if (largura < 1000) {
      windows.forEach((w) => {
        // para o display geral do container a cada dois anúncios
        w.classList.add("mt-5");
      });

      item.forEach((i) => {
        // para os container que estão com o anúncio
        i.classList.remove("w-50");
        i.classList.add("w-100");
        i.classList.remove("m-5");
        i.classList.add("mx-auto");
      });

      btn.forEach((b) => {
        //organização do nav
        b.classList.add("ml-5");
      });

    }

    if (largura >= 1000) {
      windows.forEach((w) => {
        // para o display geral do container a cada dois anúncios
        
      });

      item.forEach((i) => {
        // para os container que estão com o anúncio
        i.classList.add("w-50");
        i.classList.remove("w-100");
        i.classList.add("m-5");
        i.classList.remove("mx-auto");
      });
    
      btn.forEach((b) => {
        //organização do nav
        b.classList.remove("ml-5");
      });
    }
  }

  function efeitoTexto(elemento){
    const arr = elemento.innerHTML.split('');
    elemento.innerHTML = ' ';
    arr.forEach( (letra, i) => {   

      setTimeout( () => {
        elemento.innerHTML += letra;
      }, 75 * i)

    });
  }
  const titulo = document.querySelector('#titulo-anuncio');
  const txt = document.querySelector('#texto-titulo');

  efeitoTexto(titulo);
  efeitoTexto(txt);

  
