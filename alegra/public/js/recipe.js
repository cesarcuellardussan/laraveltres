function recipe(element) {
    $("#list-ingredients").empty();
    let id = $(element).attr("data-food-id");
    let name = $(element).attr("data-food-name");
    fetch('/api/foods/'+ id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        showRecipe(name, data);
    })
    .catch(error => {
        console.error(error);
    });
}


function showRecipe(name, ingredients) {
    $("#title-food").text(name);
    $.each(ingredients, function (index, value) {
        $("#list-ingredients").append('<li><img src="' + value["image"] + '" alt="' + value["name"] + '" style="height: 40px;"></img>&nbsp;&nbsp;<span>' + value["name"] + '</span> <strong>X' + value["quantity"] + '</strong></li><br>');
    });
    $('#recipe-detail').modal('show');
}
