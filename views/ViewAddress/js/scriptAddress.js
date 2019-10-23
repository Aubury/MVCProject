let obj = {
    formAddress : document.forms['formAddress'],
    formTeleph  : document.forms['formTelephones'],
    formLink    : document.forms['formLinkMap']
};
//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
obj.formAddress.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.formAddress;
    const inp = form.address.value;

    let fD = new FormData,
        url = '/reg/addAddress';


    fD.append('address', inp);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(text => form.nextElementSibling.innerHTML = text);

});
//-------------------------------------------------------------------------------------
obj.formTeleph.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.formTeleph;
    const inp = form.telephones.value;

    let fD = new FormData,
        url = '/reg/addAddress';


    fD.append('telephones', inp);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(text => form.nextElementSibling.innerHTML = text);

});
//--------------------------------------------------------------------------------------
obj.formLink.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.formLink;
    const inp = form.link.value;

    let fD = new FormData,
        url = '/reg/addAddress';


    fD.append('link', inp);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(text => form.nextElementSibling.innerHTML = text);

});
