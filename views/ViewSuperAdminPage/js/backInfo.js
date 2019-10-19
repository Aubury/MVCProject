const objInf = {
    allCompl : document.querySelector("#allComplaints"),
    allAnsw  : document.querySelector("#answeredComplaints"),
    newCompl : document.querySelector("#newComplaints"),
    container: document.querySelector(".tableReports"),
    form : document.forms['formAnswer']
}
//-----------------------------------------------------------------------------
const massInp = function ArrInputs(){

    let form = objInf.form;
    const inpArr = [
        {
            inp     : form['id'],
            name    : 'id',
        },
        {
            inp     : form['email'],
            name    : 'email',
        },
        {
            inp     : form['text'],
            name    : 'text',
        }
    ];
   return inpArr;
}

//-----------------------------------------------------------------------------

objInf.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    const inpArr = massInp();

    let fD = new FormData(),
        url = '/reg/addAnswer';

    inpArr.forEach(el => fD.append([el.name],el.inp.value));

    fetch(url, {
        method: "POST",
        body: fD
    }).then(e => e.text())
        .then(data =>{
            objInf.form.nextElementSibling.innerHTML = data;
            inpArr.forEach( el => el.inp.value = '');
            fillUpcontainer();
            setTimeout(()=> {objInf.form.nextElementSibling.innerHTML = '';}, 10000);

        });
});
//-------------------------------------------------------------------------------------------------------

const getNumCompl = function getTotalNumberComplaints(){

    fetch(`/inf/compl`).then(d=> d.text())
                            .then(d=> objInf.allCompl.innerHTML = d);
}

const getNumAnsw = function getTotalNumberAnswers(){

    fetch(`/inf/answ`).then(d => d.text())
                           .then(d => objInf.allAnsw.innerHTML = d);
}

const getNumNewCompl = function getTotalNumberNewComplains() {

    fetch(`/inf/newCompl`).then( d => d.text())
                               .then( d => objInf.newCompl.innerHTML = d);

}
const fillUpcontainer = function fillInComplainerContainer(){

   fetch(`/inf/compAnsw`).then( d => d.json())
                               .then( d => templateContainer(d));
}

const templateContainer = function createTemplateContainer(arr){

    let len = arr['complains'].length,
        info = objInf.container; //.tableReports

    //Удаляю всех детей!!!
    while(info.hasChildNodes()){
          info.removeChild(info.firstChild);
    }


    for(let k = 0; k < len; k++){
        const mainDiv = createAndClass('div', 'card', 'border-warning', 'mb-3'), //основной контейнер
        containerHeaderComp = createAndClass('div', 'card-header'),
        secondDivCompl = createAndClass('div', 'row'),
        containerCompl = createAndClass('div', 'card-body', 'compl');//text

        createComplHeaders(secondDivCompl,arr['complains'][k]);

        containerCompl.innerHTML = arr['complains'][k].pop();
        containerHeaderComp.appendChild(secondDivCompl);
        mainDiv.appendChild(containerHeaderComp);
         mainDiv.appendChild(containerCompl);

        let containerHeaderAnsw = document.createElement('div'),
        secondDivAnsw = document.createElement('div'),
        containerAnsw = document.createElement('div');//text

        containerHeaderAnsw.classList.add('card-header');
        secondDivAnsw.classList.add('row');
        containerAnsw.classList.add('card-body'); //text
        containerAnsw.classList.add('compl'); //text

        createAnswHeaders(secondDivAnsw, arr['answers'][k]);


        containerAnsw.innerHTML = arr['answers'][k].pop();

        containerHeaderAnsw.appendChild(secondDivAnsw);
        mainDiv.appendChild(containerHeaderAnsw);
        mainDiv.appendChild(containerAnsw);
       

        info.appendChild(mainDiv);
    }
}
//--------------------------------------------------------------------------------
function createAndClass(name = 'div', ...classes){
    const el = document.createElement(name);
    el.classList.add(...classes);
    return el;
}
//-----------------------------------------------------------------------------------
function createComplHeaders(parent, arr) {
    let newArr = arr.slice(0, -1);

    for (let i = 0; i < newArr.length; i++){

        let div = null;
        (i === newArr.length-1) ? div = createAndClass('div', 'col'): div = createAndClass('div', 'col', 'item');
        div.innerHTML = newArr[i];
        parent.appendChild(div);
    }

}
//-------------------------------------------------------------------------------------
function createAnswHeaders(parent, arr) {
var newArr = arr.slice(0, -1);
newArr.forEach( el => {
    const  div = createAndClass('div', 'col');
    div.innerHTML = el;
    parent.appendChild(div);

});
}
//-----------------------------------------------------------------------------------
getNumCompl();
setInterval(getNumCompl, 50000);

getNumAnsw();
setInterval(getNumAnsw, 50000);

fillUpcontainer();

getNumNewCompl();
setInterval(getNumNewCompl, 50000);


