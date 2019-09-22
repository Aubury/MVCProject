const obj = {
    form : document.forms['logIn']
};
//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
obj.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.form;
    const inpArr = [
        {
            inp     : form['email'],
            name    : 'email',

        },
        {
            inp     : form['password'],
            name    : 'password',

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

    const url = '/log/login',
        fD = new FormData();

    fD.append('email', answ['email']);
    fD.append('password', answ['password']);


    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.json())
        .then(text => console.log('Request successful', text))
        .catch(error => console.log('Request failed', error))
        .then(data => window.location.href = `http://${data[0]}`);

}
