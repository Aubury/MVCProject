function myFunction() {
    let input, filter, cards, cardContainer, title, i, flag;
    input = document.getElementById("searchComplaints");
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById("tableComplaints");
    cards = cardContainer.getElementsByClassName("card");
    flag = false;
    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelectorAll(".item");
        for (let j = 0; j < title.length; j++){

            let data = title[j].innerText;
            if(data.toUpperCase().indexOf(filter) > -1){
                flag = true;
                break;

            }
        }
        if (flag) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }

    }
}
