let rex = {
    form : document.forms['formProject'],
    arrInp : document.forms['formProject'].querySelectorAll('.form-control'),
};

//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let answ = {};

    let form = rex.form;
    const inpArr = [
        {
            inp     : form['name'],
            info    : form['name'].nextElementSibling,
            name    : 'name',
        },
        {
            inp     : form['budget'],
            info    : form['budget'].nextElementSibling,
            name    : 'budget',
        },
        {
            inp     : form['raiser_money'],
            info    : form['raiser_money'].nextElementSibling,
            name    : 'raiser_money',

        }
    ];

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });

    sendObj(answ);


});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addProject?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
            }
        });
}