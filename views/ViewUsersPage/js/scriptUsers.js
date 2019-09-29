let rex = {
    nameRex    : /^[а-яa-z]{2,50}$/i,
    emailRex   : /^[a-z0-9\._-]+@[a-z0-9\.-]+\.[a-z]{2,10}$/i,
    addressRex : /[a-zа-я0-9]{0,}[\s\,\.\"№\/\\n\\r]{0,}/gi,
    telRex     : /[\d+\s\(\)-\+]/g,
    taxRex     : /[\d+]{10}/,
    projectRex : /^[a-zа-я]{2,}[0-9]{0,}/i,
    amountRex  : /[\d+]{0,}/,
    formAdd    : document.forms['formUsers'],
    formDel    : document.forms['formDelUser'],
    arrInp     : document.forms['formUsers'].querySelectorAll('.form-control')

};
//-------------------------------------------------------------------------------------------------------------
function validate(inpArr){

    let allISRight = true, answ = {};

    inpArr.forEach((el) => {
        allISRight = checkInput(el) && allISRight;
        answ[el.name] = el.inp.value;

    });

    if(allISRight === true){
        sendObj(answ);
    }
}
//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
 rex.formDel.addEventListener('submit', function (ev) {

     ev.preventDefault();

    const form = rex.formDel,
          url = `/reg/delUser?email=${form['email'].value}`;

    fetch(url).then((response)=> {  return response.text();})
            .then((text)=>{rex.formDel.nextElementSibling.innerHTML = text;
                for(let i=0; i<rex.arrInp.length; i++){

                    rex.arrInp[i].value = '';
                }
            })

});
//-----------------------------------------------------------------------------------------------------------------
rex.formAdd.addEventListener('submit', function (ev) {

    ev.preventDefault();

    const form = rex.formAdd,
          inpArr = [
        {
            inp     : form['name'],
            info    : form['name'].nextElementSibling,
            reg     : rex.nameRex,
            msgError: '*Ввод только кириллицы или латиницы!',
            name    : 'name',
        },
        {
            inp     : form['patronymic'],
            info    : form['patronymic'].nextElementSibling,
            reg     : rex.nameRex,
            msgError: '*Ввод только кириллицы или латиницы!',
            name    : 'patronymic',
        },
        {
            inp     : form['surname'],
            info    : form['surname'].nextElementSibling,
            reg     : rex.nameRex,
            msgError: '*Ввод только кириллицы или латиницы!',
            name    : 'surname',

        },
        {
            inp     : form['email'],
            info    : form['email'].nextElementSibling,
            reg     : rex.emailRex,
            name    : 'email',

        },
        {
            inp     : form['project_name'],
            info    : form['project_name'].nextElementSibling,
            reg     : rex.projectRex,
            name    : 'project_name',

        },
        {
              inp     : form['share_investment'],
              info    : form['share_investment'].nextElementSibling,
              reg     : rex.amountRex,
              msgError: '*Введите только 10 цифр!',
              name    : 'share_investment',

        },
        {
            inp     : form['address'],
            info    : form['address'].nextElementSibling,
            reg     : rex.addressRex,
            msgError: '*Ввод только кириллицы или латиницы!',
            name    : 'address',

        },
        {
            inp     : form['telephon'],
            info    : form['telephon'].nextElementSibling,
            reg     : rex.telRex,
            msgError: '*Ввод только цифр!',
            name    : 'telephon',

        },
        {
            inp     : form['tax_code'],
            info    : form['tax_code'].nextElementSibling,
            reg     : rex.taxRex,
            msgError: '*Введите только 10 цифр!',
            name    : 'tax_code',

        },



     ];

        validate(inpArr);

});
//-----------------------------------------------------------------------------------------------------
function checkInput(check){
    check.msgError = check.msgError || "Данные введены не корректно";


    if(!check.reg.test(check.inp.value)){
        check.info.innerHTML = check.msgError;
        return false;
    }

    check.info.innerHTML = '';
    return true;
}
//-----------------------------------------------------------------------------------------------------
function sendObj(answ){

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addUser?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.formAdd.nextElementSibling.innerHTML = text;
                     for(let i=0; i<rex.arrInp.length; i++){

                         rex.arrInp[i].value = '';
                       }
             })
}