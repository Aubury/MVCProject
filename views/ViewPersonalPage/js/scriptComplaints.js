let rex = {
    form : document.forms['formComplaints'],
    arrInp : document.forms['formComplaints'].querySelectorAll('.inpText'),
};

//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = rex.form;
    const inpArr = [
        {
            inp     : form['user'],
            name    : 'user',
        },
        {
            inp     : form['email'],
            name    : 'email',
        },
        {
            inp     : form['text'],
            name    : 'text',
        }
    ];

    let answ = {};

    inpArr.forEach((el) => { answ[el.name] = el.inp.value; });

    sendObj(answ);

});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addComplaints?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
            // for(let i=0; i<rex.arrInp.length; i++){
            //
            //     rex.arrInp[i].value = '';
            // }
        });
}