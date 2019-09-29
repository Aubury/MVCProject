let rex = {
    formAdd : document.forms['formAddAdmins'],
    formDel : document.forms['formDelAdmin'],
    arrInp  : document.forms['formAddAdmins'].querySelectorAll('.form-control')
};

//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.formAdd.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = rex.formAdd;
    const inpArr = [
        {
            inp     : form['name'],
            name    : 'name',
        },
        {
            inp     : form['patronymic'],
            name    : 'patronymic',
        },
        {
            inp     : form['surname'],
            name    : 'surname',

        },
        {
            inp     : form['email'],
            name    : 'email',

        },
    ];

    let answ = {};

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });

    sendObj(answ);
});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addAdmin?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.formAdd.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
            }
        });
}
//------------------------------------------------------------------------------------------------------
rex.formDel.addEventListener('submit', function (ev) {

    ev.preventDefault();


    const url = '/reg/delAdmin',
          fD = new FormData(),
        form = rex.formDel;

    fD.append('email',form['email'].value);

    fetch(url,{
        method: "POST",
        body: fD
    }).then( response => response.text())
        .then( text => {
            rex.formDel.nextElementSibling.innerHTML = text;
            form['email'].value = '';
        });

})