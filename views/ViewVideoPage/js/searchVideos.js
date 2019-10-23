function myFunction() {
    let input, filter, cards, cardContainer, title, i, flag, rex;
    input = document.getElementById("searchVideos");
    filter = input.value.toUpperCase();
    cardContainer = document.querySelector(".tableVideos");
    cards = cardContainer.getElementsByClassName("card");
    flag = false;

    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelectorAll(".list-group-item");
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
