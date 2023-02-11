function createOrders(quantity){
    fetch('/api/orders', {
        method: 'POST',
        body: JSON.stringify({quantity:quantity}),
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
        Swal.fire(data.title,data.text,data.icon);
    })
    .catch(error => {
        console.error(error);
    });
    $('#MassOrder').modal('hide');
}

function createMassive() {
    let quantity = document.getElementById("quantity").value;
    document.getElementById("quantity").value = 2;
    if (parseInt(quantity) > 100) {
        Swal.fire("Lo sentimos!", "El màximo de ordenes permitida es de 100", "error");
        return;
    }else if(parseInt(quantity) < 2){
        Swal.fire("Lo sentimos!", "El minimo de ordenes permitida es de 2", "error");
        return;
    }
    createOrders(parseInt(quantity));
    $('#MassOrder').modal('hide');
}

function incrementValue(){
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 100){
      value++;
      document.getElementById('quantity').value = value;
    }
}
function decrementValue(){
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 2){
      value--;
      document.getElementById('quantity').value = value;
    }
}
