let rex = {
    form : document.forms['formVideo'],
    arrInp : document.forms['formVideo'].querySelectorAll('.inpText'),
    table  : document.querySelector('.tableVideos')
};
//--------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = rex.form;
    const inpArr = [
        {
            inp     : form['name'],
            info    : form['name'].nextElementSibling,
            name    : 'name',
        },
        {
            inp     : form['project_name'],
            info    : form['project_name'].nextElementSibling,
            name    : 'project_name',
        },
        {
            inp     : form['link'],
            info    : form['link'].nextElementSibling,
            name    : 'link',

        }
    ];

    sendObj(inpArr)

});

//---------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addVideo?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
                for(let i=0; i<rex.arrInp.length; i++){

                    rex.arrInp[i].value = '';
                }
            });
}
//---------------------------------------------------------------------------------------------

const videosTable = function createVideoTable(arr){

    let answer = '';

    arr.forEach( el =>{
        answer += `<div class="card align-self-end" style="width: 18rem;">
           <h5 class="h5">${el[1]}</h5>
           <div class="iframe">${el[3]}</div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><span>Id</span> - ${el[0]}</li>
            <li class="list-group-item"><span>Проект</span> - ${el[2]}</li>
            <li class="list-group-item"><span>Добавлено</span> - ${el[4]}</li>
          </ul>
        </div>`;

    });


    rex.table.innerHTML = answer;

}
//---------------------------------------------------------------------------------------------
const getVideos = function getVideos(){

    fetch('/inf/videos').then( inf => inf.json())
        .then( arr => videosTable(arr));
}
getVideos();
