const dom = {
    lists : document.querySelectorAll('.list'),
    tabs : document.querySelectorAll('.tab'),
    hide : 'none'
}

dom.tabs.forEach(tab => tab.addEventListener('click', e => {
    deleteActione();
    dom.lists.forEach(list => {
        //Скрываю все вкладки
        list.classList.add(dom.hide);
        tab.classList.add('active');

        if(list.classList.contains(e.target.dataset.for)){
            list.classList.remove(dom.hide);
        }
    });
}));
//---------------------------------------------------------------------------
const deleteActione = function classAction() {
    dom.tabs.forEach( el => el.classList.remove('active'));
}