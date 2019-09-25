const objInf = {
    allCompl : document.querySelector("#allComplaints"),
    allAnsw  : document.querySelector("#answeredComplaints"),
    newCompl : document.querySelector("#newComplaints"),
    report   : document.querySelector(".templateCompAnsw"),
    container: document.querySelector(".tableReports")


}

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

    for(let k = 0; k < len; k++){

        let mainDiv  = document.createElement('div'); //основной контейнер
            mainDiv.classList.add('card');
            mainDiv.classList.add('border-warning');
            mainDiv.classList.add('mb-3');

                let containerHeaderComp = document.createElement('div'),
                    secondDivCompl = document.createElement('div'),
                    containerCompl = document.createElement('div');//text

                    containerHeaderComp.classList.add('card-header');
                    secondDivCompl.classList.add('row');
                    containerCompl.classList.add('card-body'); //text

                    for(let j = 0; j < 4; j++){

                        let div = document.createElement('div');
                        div.classList.add('col');
                        div.innerHTML = arr['complains'][k][j];
                        secondDivCompl.appendChild(div);
                    }
                    containerCompl.innerHTML = arr['complains'][k][4];
                    mainDiv.appendChild(secondDivCompl);
                    mainDiv.appendChild(containerCompl);

                let containerHeaderAnsw = document.createElement('div'),
                    secondDivAnsw = document.createElement('div'),
                    containerAnsw = document.createElement('div');//text

                    containerHeaderAnsw.classList.add('card-header');
                    secondDivAnsw.classList.add('row');
                    containerAnsw.classList.add('card-body'); //text

                    for(let j = 0; j < 3; j++){

                        let div = document.createElement('div');
                        div.classList.add('col');

                        div.innerHTML = arr['answers'][k][j];
                        secondDivAnsw.appendChild(div);
                    }

                    containerAnsw.innerHTML = arr['answers'][k][3];
                    mainDiv.appendChild(secondDivAnsw);
                    mainDiv.appendChild(containerAnsw);

                info.appendChild(mainDiv);
            }
}

getNumCompl();
setInterval(getNumCompl, 50000);

getNumAnsw();
setInterval(getNumAnsw, 50000);

fillUpcontainer();

