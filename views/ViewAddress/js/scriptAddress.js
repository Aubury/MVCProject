let obj = {
    formAddress : document.forms['formAddress'],
    formTeleph  : document.forms['formTelephones'],
    formLink    : document.forms['formLinkMap']
};
//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
obj.formAddress.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.formAddress,
       inp = form.address.value;

    let fD = new FormData,
        url = '/reg/addAddress';


    fD.append('address', inp);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(text =>{
            form.address.value = '';
            form.nextElementSibling.innerHTML = text;
            setTimeout(()=> {form.nextElementSibling.innerHTML = '';}, 5000);
        });

});
//-------------------------------------------------------------------------------------
obj.formTeleph.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.formTeleph,
      inp = form.telephones.value;

    let fD = new FormData,
        url = '/reg/addAddress';


    fD.append('telephones', inp);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(text =>{
            form.telephones.value = '';
            form.nextElementSibling.innerHTML = text;
            setTimeout(()=> {form.nextElementSibling.innerHTML = '';}, 5000);

        });

});
//--------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
const strIframe = function deletePartOfString(str, pattern) {

    let newStr = str.replace(pattern,'');
    return newStr;

}
//--------------------------------------------------------------------------------------
obj.formLink.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.formLink,
        inp = strIframe(form.link.value, 'width="600" height="450"');

    let fD = new FormData,
        url = '/reg/addAddress';


    fD.append('link', inp);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(text => {
            form.link.value = '';
            form.nextElementSibling.innerHTML = text;
            setTimeout(()=> {form.nextElementSibling.innerHTML = '';}, 5000);
        });

});
