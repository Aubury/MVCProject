let rex = {
    form : document.forms['formProject'],
    arrInp : document.forms['formProject'].querySelectorAll('.form-control')

};

//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let answ = {};

    let form = rex.form;
    const inpArr = [
        {
            inp     : form['name'],
            name    : 'name',
        },
        {
            inp     : form['budget'],
            name    : 'budget',
        }
    ];

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });

    sendObj(answ);


});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    const fD = new FormData(),
         url = '/reg/addProject';

    fD.append('name', answ['name']);
    fD.append('budget', answ['budget']);

    fetch(url, {
        method: "POST",
        body: fD
    }).then(response=>  response.text())
        .then(text=>{rex.form.nextElementSibling.innerHTML = text;
            for(let i=0; i<rex.arrInp.length; i++){

                rex.arrInp[i].value = '';
            }
        });
}

//----------------------------------------------------------------------------------------------------
const projectCard = function createProjectCart(arr){

    let answ = '';
    answ += ` <div class="progect">
                <h2 class="none">progects</h2>
                <div class="progect__left__content">
                    <div class="galery">
                        <img src="/views/img/car.jpg" alt="">
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus voluptatum laborum doloremque ratione. Consectetur hic, consequuntur veniam odit est temporibus tempora praesentium quae, ratione quo totam mollitia eos possimus expedita. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi officia omnis dolore corporis molestiae placeat recusandae numquam, itaque quos asperiores minima rem, autem ullam, quis fugiat mollitia quasi maiores ipsam!
                    </p>
                </div>
                <div class="progect__right__content">
                    <h2 id="progects">Первый проект</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, fugiat, praesentium ipsam odio quo ut inventore ratione dolor eius officiis nihil optio debitis quae velit voluptatibus esse, in nemo necessitatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro quidem dolorum sit aperiam dolore expedita ab ea fugiat laudantium aut explicabo a deserunt, nesciunt ut animi iure. Nobis, voluptates impedit!
                    </p>
                    <div class="galery">
                        <img src="/views/img/car.jpg" alt="">
                        <img src="/views/img/car.jpg" alt="">
                        <img src="/views/img/car.jpg" alt="">
                        <img src="/views/img/car.jpg" alt="">
                    </div>
                </div>
                <div class="video">
                        <img src="/views/img/video.jpg" alt="">
                        <img src="/views/img/video.jpg" alt="">
                    </div>
            </div>`;
}
// //--------------------------------------------------------------------------------------------------
//
// const addOptions = function addOptions(arr) {
//
//     const select = rex.select;
//     arr.forEach( el => {
//
//         let option = document.createElement("option");
//             option.value = el.name;
//             select.appendChild(option);
//     })
// }
// //--------------------------------------------------------------------------------------------------
// const getNamesProjects = function getNamesProjects() {
//
//     const url = '/inf/nameProjects';
//
//     fetch(url).then(response => response.json())
//               .then(arr => addOptions(arr));
// }
// //--------------------------------------------------------------------------------------------------
// getNamesProjects();
// setInterval(getNamesProjects,50000);
