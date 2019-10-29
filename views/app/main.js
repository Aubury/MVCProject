const objMain = {
    logo : document.querySelector('.logo'),
    exit : document.querySelector('#exit'),
    nav  : document.querySelectorAll('li'),
    form : document.forms,
    arr  : []

}
//--------------------------------------------------------------------------------
const displayNav = function displayNavigationBar(){
    let nav = objMain.nav,
        len = nav.length;

    if(getCookie('table')==='adm'){
        for (let i = 6; i < len; i++){
            nav[i].style.display = 'none';
            document.title = "Админ панель";
        }
    }
}
//-------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", displayNav);
//--------------------------------------------------------------------------------
objMain.exit.addEventListener('click', function () {

    const fD = new FormData();
          fD.append('id', getCookie('user_id'));
          fD.append('table', getCookie('table'));


    fetch('/log/exit',{
        method: "POST",
        body: fD
    }).then( text => text.json())
        .then( data => {
            setCookie('user_id','',0);
            setCookie('uPd','',0);
            setCookie('table','',0);
            setCookie('SameSite','None',365);
            window.location.href = `${data[0]}`;
        })
})
//--------------------------------------------------------------------------------
function setCookie(cname, cvalue, exMins) {
    var d = new Date();
    d.setTime(d.getTime() + (exMins*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
//--------------------------------------------------------------------------------
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
//--------------title-------------------------------------------------------
const  title = function TitleInput(ev){
    lostFocus();
    let target = ev.target,
        title = target.parentElement.lastElementChild;

    if(title != null && title.classList.contains('title')){

        let coords = target.getBoundingClientRect();
        title.style.width = coords.width;

        title.classList.remove('none');

        let top =  0 - (title.offsetHeight + 10);
        title.style.top = top + 'px';

    }else{

        return;
    }
}
//--------------------------------------------------------------------------------------------------
const lostFocus = function InputBlur() {

    // const form = objMain.form;
    //       arr = form.elements;
    for (let i = 0; i < objMain.arr.length; i++) {
        if(objMain.arr[i].parentElement.lastElementChild != null && objMain.arr[i].parentElement.lastElementChild.classList.contains('title')){
            objMain.arr[i].parentElement.lastElementChild.classList.add('none');
        }
    }
}

//---------------------------------------------------------------------------------------------------
const inpFocus = function addListenerInput(){

    let form = objMain.form;

    for (let i = 0; i < form.length; i++){
        for (let j = 0; j < form[i].length; j++){
           objMain.arr.push(form[i][j]);
        }
    }
          // arr = form.elements;
    for (let i = 0; i < objMain.arr.length; i++){
        objMain.arr[i].addEventListener('focus', title);
        objMain.arr[i].addEventListener('blur', lostFocus);
    }
}

//---------------------------------------------------------------------------------------------------
inpFocus();
