function checkbox(i){
    var checkbox = document.querySelector('#troca-foto-' +i);
    var divImg = document.querySelector('#troca-image-'+i);

    if(checkbox.checked) {
      divImg.classList.remove('d-none');
    } else {
      divImg.classList.add('d-none');
    }
}