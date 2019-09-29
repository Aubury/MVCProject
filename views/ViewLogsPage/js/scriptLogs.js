const obj = {
    infoBlock : document.querySelector('.infoTable')
};
const addToTable = function(arr){

    const table = document.createElement('table');
          table.classList.add('table', 'table-hover');

    //   Удаляю всех детей!!!
    while(table.hasChildNodes()){
        table.removeChild(list.firstChild);
    }


    //Формирую строки
    let trs = "<tr><th>Администратор</th><th>Действие</th><th>Дата</th></tr>";
    arr.forEach(el=>{
        trs = `${trs}<tr><td>${el.id}</td><td>${el.text}</td><td>${el.date}</td></tr>`;
    });

    table.innerHTML = trs;

    obj.infoBlock.appendChild(table);
}
const getInf = function getInfoLogs() {

    fetch('/inf/Logs').then(respons => respons.json() )
                           .then( data => addToTable(data));
}

getInf();
setInterval(getInf, 100000);