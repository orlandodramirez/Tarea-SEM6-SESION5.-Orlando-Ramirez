function forceKeyPressUppercase(e) {
    var charInput = e.keyCode;
    if (charInput >= 97 && charInput <= 122) { // Check for lowercase letters
        if (!e.ctrlKey && !e.metaKey && !e.altKey) { // Ensure no modifier key is pressed
            var newChar = charInput - 32; // Convert to uppercase
            var start = e.target.selectionStart;
            var end = e.target.selectionEnd;

            e.target.value = 
                e.target.value.substring(0, start) +
                String.fromCharCode(newChar) +
                e.target.value.substring(end);

            e.target.setSelectionRange(start + 1, start + 1); // Move cursor forward
            e.preventDefault();
        }
    }
}

function borrar(id) {
    Swal.fire({
        title: 'Borrar registro?',
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#27BDBB',
        cancelButtonColor: '#E86F54',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: "php/bajaarticulo.php",
                data: 'id=' + id,
                beforeSend: function (objeto) {
                    $('#resultados').html("Cargando...");
                },
                success: function (data) {
                    window.location.href = "listaarticulos.php"; // Redirect after success
                }
            });
        }
    });
}
