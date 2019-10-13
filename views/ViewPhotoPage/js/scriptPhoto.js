let rex = {
    form   : document.forms['formPhoto'],
    delForm:document.forms['formDelPhoto'],
    arrInp : document.forms['formPhoto'].querySelectorAll('.inpText'),
    table  : document.querySelector('.tablePhoto')
};

//---------------------------------------------------------------------------------------------
const photoTable = function createPhotoTable(arr) {

    let answer = '';

    arr.forEach(el => {
        answer += `<div class="card align-self-end" style="width: 18rem;">
           <div class="list-group-item item">Проект - <span>${el.project_name}</span></div>
           <h5 class="h5 list-group-item">${el.name}</h5>
          <div class="iframe"><img class="card-img-top" src="${el.direction}${el.name}" alt="Card image cap"></div> 
          <ul class="list-group list-group-flush">
            <li class="list-group-item item">Id - <span>${el.id}</span></li>
            <li class="list-group-item">Размер - <span>${el.size}</span></li>
            <li class="list-group-item">Ширина_Высота - <span>${el.width_height}</span></li>
          </ul>
        </div>`;

    });


    rex.table.innerHTML = answer;

}
//----------------------------------------------------------------------------------------
const getPhotos = function getPhotos(){

    fetch('/inf/photos').then( inf => inf.json())
        // .then((arr => console.log(arr)));
        .then( arr => photoTable(arr));
}
//----------------------------------------------------------------------------------------

//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    const url = '/reg/addPhoto',
        fD  = new FormData(),
        fileField = document.querySelector('input[type="file"]');
    fD.append('project_name', rex.form['project'].value);
    fD.append('file', fileField.files[0]);

    fetch(url,{
        method: "POST",
        body: fD
    }).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
            getPhotos();
            setTimeout(()=> {
                rex.form.nextElementSibling.innerHTML = '';
                fileField.value ='';}, 10000);

        });
})
//--------------------------------------------------------------------------------------------
rex.delForm.addEventListener('submit', function (ev) {

    ev.preventDefault();

    const url = '/reg/delPhoto',
        fD  = new FormData(),
        id = rex.delForm['id'].value;

    fD.append('id', id);

    fetch(url,{
        method: "POST",
        body: fD
    }).then((response)=> {  return response.text();})
        .then((text)=>{rex.delForm.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.delForm.children.length; i++){

                rex.delForm.children[i].value = '';
            }
            getPhotos();
            setTimeout(()=> rex.delForm.nextElementSibling.innerHTML = '', 10000);

        });

})
getPhotos();

