const obj = {
    infoBlock : document.querySelector('.infoTable')
};
//--------------------------------------------------------------------------------------------
const getInf = function getInfoLogs() {

    fetch('/inf/Logs').then(d => d.json())
        // .then(d=> console.log(d));
        .then( d => creatTable(d));
}
//----------------------------------------------------------------------------------------------
const creatTable = function creatActionTable(arr){

    const table = document.createElement('table');
          table.classList.add('table', 'table-hover');

    //   Удаляю всех детей!!!
    while(table.hasChildNodes()){
        table.removeChild(table.firstChild);
    }


    //Формирую строки
    let trs = "<tr><th>Администратор</th><th>Действие</th><th>Дата</th></tr>";
    arr.forEach(el=>{
        trs = `${trs}<tr><td>${el[0]}</td><td>${el[1]}</td><td>${el[2]}</td></tr>`;
    });

    table.innerHTML = trs;

    obj.infoBlock.appendChild(table);
}

//-----------------------------------------------------------------------------------------------

getInf();
setInterval(getInf, 1000000);