let obj = {
    form : document.forms['formAnswer']
};

//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
obj.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.form;
    const inpArr = [
        {
            inp     : form['id'],
            name    : 'id',
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

    inpArr.forEach((el) => { answ[el.name] = el.inp.value;});

    sendObj(answ);

});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    let fD = new FormData(),
        url = '/reg/addAnswer';

    fD.append('id', answ['id']);
    fD.append('email', answ['email']);
    fD.append('text', answ['text']);


    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(data =>{
            obj.form.nextElementSibling.innerHTML = data;
            setTimeout(()=> {obj.form.nextElementSibling.innerHTML = '';}, 10000);

        });
}