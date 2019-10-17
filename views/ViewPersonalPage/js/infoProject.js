let obj = {
    tabsContainer : document.querySelector('list__projects'),
    projectContainer : document.querySelector('right__main__content')
}
//----------------------------------------------------------------------------
const getProgects = function getMassProjects(){

    fetch('/inf/project').then( data => data.json())
        .then(arr => creatProject(arr[1]));
}
//--------------------------------------------------------------------------
const creatProject = function creatProject(arr) {
    arr.forEach( el => { let p = creatTab(el.name),
                            div = projectCard(el);
                        obj.tabsContainer.appendChild(p);
                        obj.projectContainer.appendChild(div);
    });
}
//----------------------------------------------------------------------------
const creatTab = function createTabs(name) {

    let p = document.createElement('p');
    p.classList.add('tab');
    p.setAttribute('data-for', `project__${name}`);
    p.innerHTML = `Проект ${name}`;
    return p;
}
//-----------------------------------------------------------------------------
const projectCard = function createProjectCart(arr){

    let answ = '',
        div  = document.querySelector('div');
        div.classList.add(`project__${arr.name}`, 'none', 'list');
        answ += `<h2>${arr.name}</h2>
                    <div class="logo_pay">
                    <figure class="logo">
                        <img src="${arr.photo_1}" alt=" ">
                        <figcaption class="none">Логотип проекта</figcaption>
                    </figure>
                    <aside class="pay">
                        <p>Бюджет проекта ${arr.budget}</p>
                        <p>Мой вклад $$$</p>
                    </aside>
                    </div>
                    <article class="article">${arr.text_1}</article>
                    <div class="pay_score">
                    <aside>
                        <p>Номера счетов</p>
                        <p>**************</p>
                        <p>***************</p>
                    </aside>
                    <article>${arr.text_2}</article>
                </div>`;
        div.innerHTML = answ;

    return div;
}
//-----------------------------------------------------------------------------
getProgects();