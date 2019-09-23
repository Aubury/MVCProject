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
        body: fD,
        mode: 'no-cors', // no-cors, cors, *same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
    })
        .then(e => e.json())
       // .then(data => console.log(data));
      // .then(text => console.log('Request successful', text))
       // .catch(error => console.log('Request failed', error));
         .then(data => {
             //set cookie with data[1]
             setCookie('user_id', data[1][1], 1);
             setCookie('uPd', data[1][0], 1);
             setCookie('table', data[1][2], 1);
             window.location.href = `http://${data[0]}`;
             
         });

}

//---
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  const expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
