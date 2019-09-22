let rex = {
    form : document.forms['formAdmin'],
    buttonValue : '',
    arrInp : document.forms['formAdmin'].querySelectorAll('.inpText'),
};
//-------------------------------------------------------------------------------------------------------------
function validate(inpArr){

    let answ = {};

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });

    sendObj(answ);

};
//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();
    rex.buttonValue = ev.target.value;

    let form = rex.form;
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

    validate(inpArr);

});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addAdmin?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
            }
        });
}