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
            name    : 'name',
        },
        {
            inp     : form['project_name'],
            name    : 'project_name',
        },
        {
            inp     : form['link'],
            name    : 'link',

        }
    ];

    let answ = {};

    inpArr.forEach((el) => {
        (el.name == "link") ? answ[el.name] = strIframe(el.inp.value, 'width="560" height="315"')
                              :answ[el.name] = el.inp.value;
    });

    sendObj(answ)

});
//---------------------------------------------------------------------------------------------
const strIframe = function deletePartOfString(str, pattern) {

    let newStr = str.replace(pattern,'');
    return newStr;

}
//---------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addVideo?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
                for(let i=0; i<rex.arrInp.length; i++){

                    rex.arrInp[i].value = '';
                }
                getVideos();
            });
}
//---------------------------------------------------------------------------------------------

const videosTable = function createVideoTable(arr){

    let answer = '';

    arr.forEach( el =>{
        answer += `<div class="card card border-info align-self-end" style="width: 18rem;">
           <h5 class="h5">${el[1]}</h5>
           <div class="iframe">${el[3]}</div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Id - <span>${el[0]}</span></li>
            <li class="list-group-item">Проект - <span>${el[2]}</span></li>
            <li class="list-group-item">Добавлено - <span>${el[4]}</span></li>
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

