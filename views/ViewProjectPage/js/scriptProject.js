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
            name    : 'name',
        },
        {
            inp     : form['budget'],
            name    : 'budget',
        }
    ];

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });

    sendObj(answ);


});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    const fD = new FormData(),
         url = '/reg/addProject';

    fD.append('name', answ['name']);
    fD.append('budget', answ['budget']);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(response=>  response.text())
        .then(text=>{rex.form.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
            }
        });
}