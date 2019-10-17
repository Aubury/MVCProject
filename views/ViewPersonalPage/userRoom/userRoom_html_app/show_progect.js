const dom = {
    lists : document.querySelectorAll('.list'),
    tabs : document.querySelectorAll('.tab'),
    hide : 'none'
}

dom.tabs.forEach(tab => tab.addEventListener('click', e => {
    dom.lists.forEach(list => {
        //Скрываю все вкладки
        list.classList.add(dom.hide);

        if(list.classList.contains(e.target.dataset.for)){
            list.classList.remove(dom.hide);
        }
    });
}));