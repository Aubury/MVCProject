let rex = {
    form : document.forms['formVideo'],
    count : 0,
    arrInp : document.forms['formVideo'].querySelectorAll('.inpText'),
};
//-------------------------------------------------------------------------------------------------------------
function validate(inpArr){

    let answ = {};

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });

        sendObj(answ);

};
//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
rex.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = rex.form;
    const inpArr = [
        {
            inp     : form['name'],
            info    : form['name'].nextElementSibling,
            name    : 'name',
        },
        {
            inp     : form['project_name'],
            info    : form['project_name'].nextElementSibling,
            name    : 'project_name',
        },
        {
            inp     : form['link'],
            info    : form['link'].nextElementSibling,
            name    : 'link',

        }
    ];

    validate(inpArr);

});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addVideo?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{rex.form.nextElementSibling.innerHTML = text;
                for(let i=0; i<rex.arrInp.length; i++){

                    rex.arrInp[i].value = '';
                }
            });
}