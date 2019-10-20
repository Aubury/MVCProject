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
    formProject: document.forms['formAddToProject'],
    arrInp     : document.forms['formUsers'].querySelectorAll('.inpText'),
    infUsers   : document.querySelector('.tableUsers'),
    printButton: document.querySelector('.print'),
    table      : document.querySelector('#tableUsers'),
    select : document.querySelector('#inputState'),
    massUsers  : [],
    massOriginal: [],
    arrIcDel: [],
    arrIcEd : []


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
            // {
            //     inp     : form['project_name'],
            //     info    : form['project_name'].nextElementSibling,
            //     reg     : rex.projectRex,
            //     name    : 'project_name',
            //
            // },
            // {
            //     inp     : form['share_investment'],
            //     info    : form['share_investment'].nextElementSibling,
            //     reg     : rex.amountRex,
            //     msgError: '*Введите только 10 цифр!',
            //     name    : 'share_investment',
            //
            // },
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
                setTimeout(()=> {rex.formAdd.nextElementSibling.innerHTML = '';}, 1000);
            }
        })
}
//----------------------------------------------------------------------------------------------------
const delUser = function DeleteUser(ev){

     let  data = '';
     if(ev.target.hasAttribute('id'))
     {
         data = ev.target.id.slice(ev.target.id.indexOf('_')+1);
     }


     const url = '/reg/delUser',
           fD = new FormData();

     fD.append('email', data);

    fetch(url,{
        method: "POST",
        body: fD
    }).then(data=>  data.text())
            .then(text=> window.location.reload())

}

//-----------------------------------------------------------------------------------------------------
const getMassindex = function getMassIndexById(ev)
{
    const arr = rex.massUsers;
    let data = '';
    if(ev.target.hasAttribute('id')){

        data = ev.target.id.slice(ev.target.id.indexOf('_')+1);
        arr.forEach( el =>{
            if(el.email === data){
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
const addListtenerDel = function addToArrListenerDel(arr){
    for (let i = 0; i < arr.length; i++ ){

        arr[i].addEventListener('click', delUser);
    }
}
//----------------------------------------------------------------------------------------------------
const addListtenerEd = function addToArrListenerEd(arr){
    for (let i = 0; i < arr.length; i++ ){

        arr[i].addEventListener('click', getMassindex);
    }
}
//============================Information Of Users=====================================================

const createUsersTable = function createUsersTable(arr){

    rex.massUsers = arr;
    const table = rex.table;
    let project_name = 'Не участвует в проекте',
        share_investment = 'Не участвует в проекте',
        invest_amount = 'Не участвует в проекте',
        payment_time = 'Не участвует в проекте';

    //   Удаляю всех детей!!!
    while(table.hasChildNodes()){
        table.removeChild(table.firstChild);
    }
    //Формирую строки
    let trs = "<tr><th>Delete</th><th>Edit</th><th>ФИО</th><th>Контакты</th><th>Проект</th><th>Общая сумма вложений</th><th>Проплатили</th><th>Дата последней оплаты</th></tr>";
    arr.forEach(el=>{
        if(el.project.length > 0) {

            el['project'].forEach(item => {
                trs = `${trs}<tr><td class="iconsDel"><i class="material-icons" id="del_${el.email}">delete</i></td>   
                         <td class="iconsEd"><i class="material-icons" id="ed_${el.email}">create</i></td>   
                         <td>${el.surname}<br>${el.name}<br>${el.patronymic}<br></td>
                         <td class="tdTextLeft">Тел: ${el.telephon}<br>Email: ${el.email}<br>Адрес: ${el.address}<br>ИНН: ${el.tax_code}<br></td>
                         <td>${item.project_name}<br></td>
                         <td>${item.share_investment}<br></td>
                         <td>${item.invest_amount}<br></td>
                         <td>${item.payment_time}<br></td></tr>`;

            })
        }else {

            trs = `${trs}<tr><td class="iconsDel"><i class="material-icons" id="del_${el.email}">delete</i></td>   
                         <td class="iconsEd"><i class="material-icons" id="ed_${el.email}">create</i></td>   
                         <td>${el.surname}<br>${el.name}<br>${el.patronymic}<br></td>
                         <td class="tdTextLeft">Тел: ${el.telephon}<br>Email: ${el.email}<br>Адрес: ${el.address}<br>ИНН: ${el.tax_code}<br></td>
                         <td>${project_name}<br></td>
                         <td>${share_investment}<br></td>
                         <td>${invest_amount}<br></td>
                         <td>${payment_time}<br></td></tr>`;

        }
    });

    table.innerHTML = trs;

    rex.infUsers.appendChild(table);
    rex.arrIcDel.push(document.querySelectorAll(".iconsDel"));
    rex.arrIcEd.push(document.querySelectorAll(".iconsEd"));
    addListtenerDel(rex.arrIcDel[0]);
    addListtenerEd(rex.arrIcEd[0]);
}
//-------------------------------------------------------------------------------------------------
const replcomma = function comma(data) {

    let newData = '';

    (data.indexOf(",") !== -1) ? newData = data.replace(',','.') : newData = data;

    return newData;

}
//----------------------------------------------------------------------------------------
rex.formProject.addEventListener('submit',function (ev) {

    ev.preventDefault();
    const url = '/reg/addUsPrj',
        form = rex.formProject,
        fD = new FormData();
    fD.append('email',form['email'].value);
    fD.append('project_name', form['project_name'].value);
    fD.append('share_investment', replcomma(form['share_investment'].value));

    fetch(url,{
        method : "POST",
        body : fD
    }).then(el=>el.text())
        .then(text=>{
            form.nextElementSibling.innerHTML = text;
            setTimeout(()=> {
                for(let i =0; i < form.elements.length-1; i++ ){
                    form.elements[i].value = '';
                }
                  form.nextElementSibling.innerHTML = '';
            }, 5000);
        })

})
//-----------------------------------------------------------------------------------
const addOptions = function addOptions(arr) {

    const select = rex.select;

    while(select.hasChildNodes()){
        select.removeChild(select.firstChild);
    }
    let op = new Option('Выберите проект');
    select.append(op);
    arr.forEach( el => {

        let option = new Option(el.name, el.name);
        select.append(option);
    })
}
//------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------
const getNamesProjects = function getNamesProjects() {

    const url = '/inf/nameProjects';

    fetch(url).then(response => response.json())
        .then(arr => addOptions(arr));
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
    let project_name = 'Не участвует в проекте',
        share_investment = 'Не участвует в проекте',
        invest_amount = 'Не участвует в проекте',
        payment_time = 'Не участвует в проекте';
    //Формирую строки
    let trs = "<tr><th>ФИО</th><th>Контакты</th><th>Проект</th><th>Общая сумма вложений</th><th>Проплатили</th><th>Дата последней оплаты</th></tr>";

    // rex.massUsers.forEach(el=>{
    rex.massUsers.forEach(el=>{
        if(el.project.length > 0) {
            el['project'].forEach(item => {
                trs = `${trs}<tr><td>${el.surname}<br>${el.name}<br>${el.patronymic}<br></td></td>
                         <td>Тел: ${el.telephon}<br>Email: ${el.email}<br>Адрес: ${el.address}<br>ИНН: ${el.tax_code}<br></td>
                          <td>${item.project_name}<br></td>
                         <td>${item.share_investment}<br></td>
                         <td>${item.invest_amount}<br></td>
                         <td>${item.payment_time}<br></td></tr>`;
            })
        }else{
            trs = `${trs}<tr><td>${el.surname}<br>${el.name}<br>${el.patronymic}<br></td></td>
                         <td>Тел: ${el.telephon}<br>Email: ${el.email}<br>Адрес: ${el.address}<br>ИНН: ${el.tax_code}<br></td>
                          <td>${project_name}<br></td>
                         <td>${share_investment}<br></td>
                         <td>${invest_amount}<br></td>
                         <td>${payment_time}<br></td></tr>`;
        }

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
getNamesProjects();