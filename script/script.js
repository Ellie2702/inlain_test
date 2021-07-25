let searchResultSetDisplay = document.getElementById("resultSet");

let searchField = document.getElementById("searchField");
let searchBtn = document.getElementById("search");


searchField.addEventListener('input', function(event) {
    if (searchField.value.length < 3) searchBtn.setAttribute('disabled', true);
    else searchBtn.removeAttribute('disabled');
});

searchBtn.onclick = async function() {
    const result = await fetch("../php/searchComments.php?query=" + searchField.value).then(result => result.json());

    searchResultSetDisplay.innerHTML = '';

    for (let i = 0; i < result.length; i++) {
        let row = result[i];
        let div = document.createElement('div');
        div.className = 'post';

        let newBody = row.body.replaceAll(
            searchField.value,
            `<span style='color: red;'>${searchField.value}</span>`
        );
        div.innerHTML = 
            `<div class="post">
                <div class="title">
                    ${row.title}
                </div>
                <div class="body">
                    ${newBody}
                </div>
            </div>`;

        searchResultSetDisplay.append(div);
    }
};