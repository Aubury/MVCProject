function myFunction() {
    let input, filter, cards, cardContainer, title, i;
    input = document.getElementById("searchProjects");
    filter = input.value.toUpperCase();
    cardContainer = document.querySelector(".tableProjects");
    cards = cardContainer.getElementsByClassName("card");

    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector(".card-title");
        let data = title.innerText;

        if(data.toUpperCase().indexOf(filter) > -1){

            cards[i].style.display = "";

        }else {

            cards[i].style.display = "none";
        }

    }
}
