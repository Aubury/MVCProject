let rex = {
    form : document.forms['formProject'],
    arrInp : document.forms['formProject'].querySelectorAll('.form-control'),
    table  : document.querySelector('.tableProjects'),
    arrIcons    : [],
    massOriginal: []
};
//---------------------------------------------------------------------------------------
const massInp = function massInputsForm(){

    let form = rex.form;
    const inpArr = [
        {
            inp     : form['name'],
            name    : 'name',
        },
        {
            inp     : form['budget'],
            name    : 'budget',
        },
        {
            inp     : form['photo_1'],
            name    : 'photo_1',
        },
        {
            inp     : form['photo_2'],
            name    : 'photo_2',
        },
        {
            inp     : form['photo_3'],
            name    : 'photo_3',
        },
        {
            inp     : form['photo_4'],
            name    : 'photo_4',
        },
        {
            inp     : form['photo_5'],
            name    : 'photo_5',
        },
        {
            inp     : form['video_1'],
            name    : 'video_1',
        },{
            inp     : form['video_2'],
            name    : 'video_2',
        },
        {
            inp     : form['text_1'],
            name    : 'text_1',
        },
        {
            inp     : form['text_2'],
            name    : 'text_2',
        },
        {
            inp     : form['published'],
            name    : 'published',
        }
    ];
    return inpArr;
}
//---------------------------------------------------------------------------------------
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    const form = rex.form,
        inpArr = massInp();

    const fD = new FormData(),
         url = '/reg/addProject';

    inpArr.forEach((el) => { (el.inp.name === 'published')?
        fD.append([el.name],el.inp.checked.value): fD.append([el.name],el.inp.value);});


    fetch(url, {
        method: "POST",
        body: fD
    }).then(response=>  response.text())
        .then(text=>{rex.form.nextElementSibling.innerHTML = text;
            // for(let i=0; i<rex.arrInp.length; i++){
            //
            //     rex.arrInp[i].value = '';
            // }
            // getProgects();
            setTimeout(()=>{
                // rex.form.nextElementSibling.innerHTML = '';
                window.location.reload();
            }, 3000);
        });
}
);
//----------------------------------------------------------------------------------------
const getProgects = function getMassProjects(){

    fetch('/inf/project').then( data => data.json())
        .then(arr => {
            projectCard(arr[1]);
            rex.massOriginal.push(arr[0]);
        });
}
//------------------------------------------------------------------------------------------
const projectCard = function createProjectCart(arr){



    let answ = '',
        infPublishNo = `<div class="alert alert-warning flex-grow-1" role="alert">
                         Не опубликовано!
                        </div>`,
        infPublishYes = `<div class="alert alert-success flex-grow-1" role="alert">
                         Oпубликовано!
                        </div>`;
    arr.forEach( el => {
        let publish = el.published;

            answ += `
                  <div class="card text-center border-warning">
                  ${(publish == '1') ? infPublishYes : infPublishNo}
                      <div class="card-header row justify-content-around">
                        <div title="Редактировать проект" class="icons flex-shrink-1 rightBorder p-2">
                         <i class="material-icons" id="${el.name}">create</i>
                        </div>
                      
                        <div class="p-2 flex-grow-1">Бюджет: <span class="italic">${el.budget}</span></div>
                        <div class="p-2 flex-grow-1">Собрали: <span class="italic">${el.raiser_money}</span></div>
                          <div class="p-2 flex-grow-1">Участников: <span class="italic">${el.users}</span></div>
                      </div>
                      <div class="container p-2">
                      
                                 <div class="row">
                               
                                   <div class="col colHeight">
                                       <div class="mainImg"><img src="${el.photo_1}" alt=""></div>
                                       <p class="card-text p-2 text-left">${el.text_2}</p>
                                   </div>
                           
                                   <div class="col wrapper colHeight ">
                                       <div class="col align-items-start">
                                         <h2 class="card-title">Проект \"${el.name}\"</h2>
                                         <p class="card-text p-2 text-left">${el.text_1}</p>
                                       </div>
                                 
                                    
                                      <div class="row">
                                        <div class="sizeImg"><img class="padImg " src="${el.photo_2}" alt=""></div> 
                                        <div class="sizeImg"> <img class="padImg" src="${el.photo_3}" alt=""></div>
                                        <div class="sizeImg"><img class="padImg" src="${el.photo_4}" alt=""></div>
                                        <div class="sizeImg"><img class="padImg" src="${el.photo_5}" alt=""></div>
                                      </div>
                                      
                                   </div>
                               </div>   
                          
                           <div class="row justify-content-around height"> 
                            <p class="w-50 padImg">${el.video_1}</p>
                            <p class="w-50 padImg">${el.video_2}</p>
                           </div>
                      </div>
                </div>`;
    });

    rex.table.innerHTML = answ;
    rex.arrIcons.push(document.querySelectorAll(".icons"));
    addListtener(rex.arrIcons[0]);
}
//--------------------------------------------------------------------------------------------------
const getMassindex = function getMassIndexById(ev)
{
    const arr = rex.massOriginal[0];
    if(ev.target.hasAttribute('id')){

        arr.forEach( el =>{
            if(el.name === ev.target.id){
               fillInp(el);
            }

        });
    }
}
//---------------------------------------------------------------------------------------------------
const addListtener = function addToArrListener(arr){
    for (let i = 0; i < arr.length; i++ ){

        arr[i].addEventListener('click', getMassindex);
    }
}
//---------------------------------------------------------------------------------------------------
const fillInp = function fillInputsForm(arr){

    const inpArr = massInp(),
         len = arr.length;


    for(let i = 0; i < inpArr.length; i++){
        for (key in arr) {
            if(inpArr[i].name === key){
                inpArr[i].inp.value = arr[key];
            }
        }

    }
}

getProgects();