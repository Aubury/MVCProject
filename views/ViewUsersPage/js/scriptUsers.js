const rex = {
    nameRex    : /^[а-яa-z]{2,50}$/i,
    emailRex   : /^[a-z0-9\._-]+@[a-z0-9\.-]+\.[a-z]{2,10}$/i,
    addressRex : /[a-zа-я0-9]{0,}[\s\,\.\"№\/\\n\\r]{0,}/gi,
    telRex     : /[\d+\s\(\)-\+]/g,
    taxRex     : /[\d+]{10}/,
    projectRex : /^[a-zа-я]{2,}[0-9]{0,}/i,
    amountRex  : /[\d+]{0,}/,
    formAdd    : document.forms['formUsers'],
    formDel    : document.forms['formDelUser'],
    arrInp     : document.forms['formUsers'].querySelectorAll('.form-control'),
    infUsers   : document.querySelector('.tableUsers'),
    printButton: document.querySelector('.print'),
    table      : document.querySelector('#tableUsers'),
    massUsers  : [],
    arrIcons    : [],
    massOriginal: []


};
//---------------------------------------------------------------------------------------------------
const massInp = function massInputsForm(){

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

    return inpArr;
}
//----------------------------------------------------------------------------------------------------
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
//----------------------------------------------------------------------------------------------------
rex.formAdd.addEventListener('submit', function (ev) {

    ev.preventDefault();
    validate(massInp());

});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ){

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addUser?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.formAdd.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
                infUsers();
            }
        })
}
//----------------------------------------------------------------------------------------------------
 rex.formDel.addEventListener('submit', function (ev) {

     ev.preventDefault();

    const form = rex.formDel,
          url = `/reg/delUser?email=${form['email'].value}`;

    fetch(url).then((response)=> {  return response.text();})
            .then((text)=>{rex.formDel.nextElementSibling.innerHTML = text;
                for(let i=0; i<rex.arrInp.length; i++){

                    rex.arrInp[i].value = '';
                    infUsers();
                }
            })

});

//-----------------------------------------------------------------------------------------------------
const getMassindex = function getMassIndexById(ev)
{
    const arr = rex.massUsers;
    if(ev.target.hasAttribute('id')){

        arr.forEach( el =>{
            if(el.email === ev.target.id){
                fillInp(el);
            }

        });
    }
}
//---------------------------------------------------------------------------------------------------
const fillInp = function fillInputsForm(arr){

    const inpArr = massInp();

    for(let i = 0; i < inpArr.length; i++){
        for (key in arr) {
            if(inpArr[i].name === key){
                inpArr[i].inp.value = arr[key];
            }
        }

    }
}

//-----------------------------------------------------------------------------------------------------
const addListtener = function addToArrListener(arr){
    for (let i = 0; i < arr.length; i++ ){

        arr[i].addEventListener('click', getMassindex);
    }
}

//============================Information Of Users=====================================================

const createUsersTable = function createUsersTable(arr){

    rex.massUsers = arr;
    const table = rex.table;

    //   Удаляю всех детей!!!
    while(table.hasChildNodes()){
        table.removeChild(table.firstChild);
    }


    //Формирую строки
    let trs = "<tr><th>Edit</th><th>ФИО</th><th>Контакты</th><th>Проект</th><th>Общая сумма вложений</th><th>Проплатили</th><th>Дата последней оплаты</th></tr>";
    arr.forEach(el=>{
        trs = `${trs}<tr><td class="icons"><i class="material-icons" id="${el.email}">create</i></td>   
                         <td>${el.surname}<br>${el.name}<br>${el.patronymic}<br></td>
                         <td class="tdTextLeft">Тел: ${el.telephon}<br>Email: ${el.email}<br>Адрес: ${el.address}<br>ИНН: ${el.tax_code}<br></td>
                         <td>${el.project_name}<br></td>
                         <td>${el.share_investment}<br></td>
                         <td>${el.invest_amount}<br></td>
                         <td>${el.payment_time}<br></td></tr>`;
    });

    table.innerHTML = trs;

    rex.infUsers.appendChild(table);
    rex.arrIcons.push(document.querySelectorAll(".icons"));
    addListtener(rex.arrIcons[0]);
}

//------------------------------------------------------------------------------------------

const infUsers = function TotalInformationOfUsers() {

    fetch('/inf/users').then( inf => inf.json())
        // .then(arr=>console.log(arr));
        .then(arr => createUsersTable(arr));
}

//------------------------------------------------------------------------------------------
const print = function printTable() {

    const table = document.createElement('table');
    //Формирую строки
    let trs = "<tr><th>ФИО</th><th>Контакты</th><th>Проект</th><th>Общая сумма вложений</th><th>Проплатили</th><th>Дата последней оплаты</th></tr>";

    rex.massUsers.forEach(el=>{
        trs = `${trs}<tr><td>${el.surname}<br>${el.name}<br>${el.patronymic}<br></td></td>
                         <td>Тел: ${el.telephon}<br>Email: ${el.email}<br>Адрес: ${el.address}<br>ИНН: ${el.tax_code}<br></td>
                         <td>${el.project_name}<br></td>
                         <td>${el.share_investment}<br></td>
                         <td>${el.invest_amount}<br></td>
                         <td>${el.payment_time}<br></td></tr>`;
    });

    table.innerHTML = trs;

    let new_h1 = document.createElement('h1');
    new_h1.style.margin = '20px';
    new_h1.style.textAlign = 'center';
    new_h1.innerHTML = "Участники";

    let div = document.createElement('div');
    div.appendChild(new_h1);
    div.appendChild(table);

    let style = "<style>";
    style = style + "table {width: 100%;font: 17px Calibri;}";
    style = style + "table, th, td {border: solid 1px #878787; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "th {background-color: #e2e2e2; min-height: 50px;font-weight: 600;";
    style = style + "</style>";


    let win = window.open('');
    win.document.write('<html><head>');
    win.document.write('<title></title>');
    win.document.write(style);
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(div.outerHTML);
    win.document.write('</body></html>');
    win.print();
    win.close();
}
//------------------------------------------------------------------------------------------

rex.printButton.addEventListener('click', print);
infUsers();
