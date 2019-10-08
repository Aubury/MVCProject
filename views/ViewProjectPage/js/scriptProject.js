let rex = {
    form : document.forms['formProject'],
    arrInp : document.forms['formProject'].querySelectorAll('.form-control'),
    table  : document.querySelector('.tableProjects')

};

//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    // let answ = [];

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


    const fD = new FormData(),
         url = '/reg/addProject';

    inpArr.forEach((el) => { (el.inp.name === 'published')?
        fD.append([el.name],el.inp.checked.value): fD.append([el.name],el.inp.value);});


    fetch(url, {
        method: "POST",
        body: fD
    }).then(response=>  response.text())
        .then(text=>{rex.form.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
            }
            getProgects();
        });
}
);
//---------------------------------------------------------------------------------------------------
const getProgects = function getMassProjects(){

    fetch('/inf/project').then( data => data.json())
        // .then(arr => console.log(arr));
        .then(arr => projectCard(arr[1]));
}
//----------------------------------------------------------------------------------------------------
const projectCard = function createProjectCart(arr){

    let answ = '';
    arr.forEach( el => {
        answ += `
                  <div class="card text-center border-warning">
                      <div class="card-header row justify-content-around">
                        <p>Бюджет: <span class="italic">${el.budget}</span></p>
                        <p>Собрали: <span class="italic">${el.raiser_money}</span></p>
                      </div>
                      <div class="card-body">
                      <h5 class="card-title">Проект \"${el.name}\"</h5>
                      <div class="row justify-content-around">
                           <div class="col-sm-6 justify-content-between">
                               <div class="mainImg"><img class="w-100" src="${el.photo_1}" alt=""></div>
                               <p class="card-text">${el.text_1}</p>
                            </div>
                           <div class="col-sm-6 justify-content-between">
                              <p class="card-text">${el.text_2}</p>
                              <div class="row justify-content-around">
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

}
//--------------------------------------------------------------------------------------------------
getProgects();