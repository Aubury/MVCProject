const objMain = {
    logo : document.querySelector('.logo'),
    exit : document.querySelector('#exit'),
    nav  : document.querySelectorAll('li')
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
          fD.append('id_admin', getCookie('user_id'));

    fetch('/log/exit',{
        method: "POST",
        body: fD
    }).then( text => text.json())
        .then( data => {
            setCookie('user_id','',0);
            setCookie('uPd','',0);
            setCookie('table','',0);
            window.location.href = `http://${data[0]}`;
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
        title = target.nextElementSibling;

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

    for (let i = 0; i < obj.arrInp.length; i++) {
        if(obj.arrInp[i].nextElementSibling != null){
            obj.arrInp[i].nextElementSibling.classList.add('none');
        }
    }
}

//---------------------------------------------------------------------------------------------------
const inpFocus = function addListenerInput(){

    for (let i = 0; i < obj.arrInp.length; i++){
        obj.arrInp[i].addEventListener('focus', title);
        obj.arrInp[i].addEventListener('blur', lostFocus);
    }
}

//---------------------------------------------------------------------------------------------------
inpFocus();
