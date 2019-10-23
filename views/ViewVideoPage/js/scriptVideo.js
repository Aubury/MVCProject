let rex = {
    form   : document.forms['formVideo'],
    formDel: document.forms['formDelVideo'],
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
        (el.name === "link") ? answ[el.name] = strIframe(el.inp.value, 'width="560" height="315"')
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

const videosTable = function createVideoTable(arr){

    let answer = '';

    arr.forEach( el =>{
        answer += `<div class="card align-self-end" style="width: 18rem;">
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
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
            setTimeout(()=> rex.form.nextElementSibling.innerHTML = '', 10000);

        });
}
//---------------------------------------------------------------------------------------------
rex.formDel.addEventListener('submit', function (ev) {

    ev.preventDefault();

    const url = '/reg/delVideo',
         fD = new FormData();

    fD.append('id',rex.formDel['id'].value);

    fetch(url,{
        method: "POST",
        body: fD
    }).then((response)=> {  return response.text();})
        .then((text)=>{rex.formDel.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
            }
            getVideos();
            setTimeout(()=> rex.formDel.nextElementSibling.innerHTML = '', 10000);

        });

})
//-------------------------------------------------------------------------------------------
<<<<<<< HEAD
=======
>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
=======
>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage
getVideos();

