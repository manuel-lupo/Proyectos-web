const FORM = document.querySelector('#limite');

FORM.addEventListener('submit' , function(e){
    e.preventDefault();
    data = new FormData(FORM);
    url = `tabla/${data.get('lmite')}`;
    window.location.href = url;
    })