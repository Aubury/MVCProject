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



// obj.form.addEventListener('submit', function (ev) {
//
//     ev.preventDefault();
//
//     let form = obj.form;
//     const inpArr = [
//         {
//             inp     : form['address'],
//             name    : 'address'
//         },
//         {
//             inp     : form['telephones'],
//             name    : 'telephones'
//         },
//         {
//             inp     : form['link'],
//             name    : 'link'
//
//         }
//     ];
//
//     let answ = {};
//
//     inpArr.forEach((el) => {
//         answ[el.name] = el.inp.value;
//
//     });
//
//     sendObj(answ);
// });
//
// //-----------------------------------------------------------------------------------------------------
// function sendObj(answ) {
//
//     let fD = new FormData,
//         url = '/reg/addAddress';
//
//
//     fD.append('address', answ['address']);
//     fD.append('telephones', answ['telephones']);
//     fD.append('link', answ['link']);
//
//
//
//     fetch(url, {
//         method: "POST",
//         body: fD
//     }).then(e => e.text())
//     .then(text => obj.form.nextElementSibling.innerHTML = text);
// }