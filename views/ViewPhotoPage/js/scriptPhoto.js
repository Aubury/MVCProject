let rex = {
    form : document.forms['formPhoto'],
    arrInp : document.forms['formPhoto'].querySelectorAll('.inpText'),
    table  : document.querySelector('.tablePhoto')
};
//--------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

      const url = '/reg/addPhoto',
            fD  = new FormData(),
            fileField = document.querySelector('input[type="file"]');

      fD.append('file', fileField.files[0]);

    fetch(url,{
        method: "POST",
        body: fD
    }).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
                for(let i=0; i<rex.arrInp.length; i++){

                    rex.arrInp[i].value = '';
                }
            });
})
//---------------------------------------------------------------------------------------------

