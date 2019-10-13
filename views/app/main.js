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
    }).then( text => text.text());

    setCookie('user_id','',0);
    setCookie('uPd','',0);
    setCookie('table','',0);
    window.location.reload();


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
//
// objLogo.logo.addEventListener('click', function () {
//
//
//     window.location.href = 'http://vinash.netxi.in';
// });
