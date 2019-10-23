const obj = {
    form  : document.forms['logIn'],
    users : document.querySelector('#users'),
    map        : document.querySelector('.map'),
    address    : document.querySelector('.address'),
    phone      : document.querySelector('.phone'),

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
         .then(data => {
             if(data.length == 2){
                 //set cookie with data[1]
                 setCookie('user_id', data[1][1], 1);
                 setCookie('uPd', data[1][0], 1);
                 setCookie('table', data[1][2], 1);
                 window.location.href = `${data[0]}`;
             }else {

                 obj.form.nextElementSibling.innerHTML = data;
             }


             
         });

}

//----------------------------------------------------------------------------

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  const expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
//-----------------------------------------------------------------------------
const getUsers = function getAmountUsers() {

    fetch('/inf/amtUsers',{
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, cors, *same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json',
            // 'Content-Type': 'application/x-www-form-urlencoded',
        }
    }).then( data => data.json())
        .then( data => obj.users.innerHTML = data);
}
//----------------------------------------------------------------------------
const splitStr = function StringToMass(str) {

    let comma = ',';
    let mass = str.split(comma);
    return mass;
}
//---------------------------------------------------------------------------
const fillFooter = function FillFooter(arr){
    let map = arr.link,
        phone = splitStr(arr.phone),
        address = splitStr(arr.address);

    obj.map.innerHTML = map;

    phone.forEach(el=> {
        let p = document.createElement('p');
        p.innerHTML = el.trim();
        obj.phone.appendChild(p);
    });

    address.forEach(el=> {
        let p =document.createElement('p');
        p.innerHTML = el.trim();
        obj.address.appendChild(p);
    })


}

//-----------------------------------------------------------------------------
const getAddress = function getAddress(){

    fetch('/inf/contacts',{
        method:'POST',
        credentials: 'same-origin', // include, *same-origin, omit
        header:('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure')
    }).then( mass => mass.json())
        .then(mass => fillFooter(mass));
    // .then(mass => console.log(mass));
}
//-----------------------------------------------------------------------------

getAddress();
getUsers();
