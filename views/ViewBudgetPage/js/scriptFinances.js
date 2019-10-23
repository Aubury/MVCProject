let obj = {
    select : document.querySelector('#inputState'),
    form   : document.forms['formAddPay'],
    arrInp : document.querySelectorAll(".form-control"),
    table  : document.querySelector('.tableFinances')
};

//--------------------------------------------------------------------------------------------------

const addOptions = function addOptions(arr) {

    const select = obj.select;

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
//--------------------------------------------------------------------------------------------------
const getNamesProjects = function getNamesProjects() {

    const url = '/inf/nameProjects';

    fetch(url).then(response => response.json())
        .then(arr => addOptions(arr));
}
//--------------------------------------------------------------------------------------------------

obj.form.addEventListener('submit', function (ev) {

    ev.preventDefault();
    const url = '/reg/AddMoney',
          fD  = new FormData(),
          form = obj.form;

    fD.append('project_name', form['project_name'].value);
    fD.append('email_user', form['email_user'].value);
    fD.append('amount', replcomma(form['amount'].value));
    fD.append('timeDate', form['timeDate'].value);

    fetch(url,{
        method: "POST",
        body: fD
    }).then( respons => respons.text())
        .then( text => {
            form.nextElementSibling.innerHTML = text;
            for(let i=1; i<obj.arrInp.length; i++){

                obj.arrInp[i].value = '';
            };
<<<<<<< HEAD

            getTotalInf();
            setTimeout(()=> {form.nextElementSibling.innerHTML = '';}, 10000);

<<<<<<< HEAD
=======
            getNamesProjects();
>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
        })
});
//-------------------------------------------------------------------------------------------------
const replcomma = function comma(data) {
<<<<<<< HEAD

    let newData = '';

<<<<<<< HEAD
=======

    let newData = '';

>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
    (data.indexOf(",") !== -1) ? newData = data.replace(',','.') : newData = data;

    return newData;

}
//--------------------------------------------------------------------------------------------------
const getTotalInf = function getTotalInformation(){

    fetch('/inf/budget').then( data => data.json())
        .then( arr => buildTable(arr));
}
//--------------------------------------------------------------------------------------------------
const buildTable = function table(arr) {

    const table = obj.table;
    //   Удаляю всех детей!!!
    while (table.hasChildNodes()) {
        table.removeChild(table.firstChild);
    }

    let trs = "<tr><th>Время платежа</th><th>Плательщик</th><th>Сумма платежа</th><th>Проект</th></tr>";
    arr.forEach(el => {
        trs = `${trs}<tr><td>${el[0]}</td><td>${el[1]}</td><td>${el[2]}</td><td>${el[3]}</td></tr>`;
    });

    table.innerHTML = trs;
}
 //--------------------------------------------------------------------------------------------------
getTotalInf();
<<<<<<< HEAD
=======


>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
getNamesProjects();
setInterval(getNamesProjects,500000);