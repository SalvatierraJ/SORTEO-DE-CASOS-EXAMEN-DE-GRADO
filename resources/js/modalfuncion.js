var modal = document.getElementById("myModal");
var addBtn = document.getElementById("myBtn"); // Botón para añadir nuevo jurado
var span = document.getElementsByClassName("close")[0];
var modalTitle = document.getElementById("modalTitle");
var saveBtn = document.getElementById("saveBtn");
var form = document.getElementById("juradoForm");

// Botón para abrir el modal en modo "añadir nuevo jurado"
addBtn.onclick = function() {
  modal.style.display = "block";
  modalTitle.textContent = "Nuevo Jurado";  // Cambia el título del modal
  saveBtn.textContent = "Aceptar";  // Cambia el texto del botón
  form.reset();  // Limpia el formulario
}

// Lógica para editar un jurado
var editButtons = document.getElementsByClassName("edit-icon");

Array.from(editButtons).forEach(function(editBtn, index) {
  editBtn.onclick = function() {
    modal.style.display = "block";
    modalTitle.textContent = "Editar Jurado";  // Cambia el título del modal
    saveBtn.textContent = "Guardar Cambios";  // Cambia el texto del botón
    
    // Rellenar el formulario con los datos del jurado seleccionado
    // Aquí puedes obtener los datos del jurado que se va a editar
    var juradoRow = this.closest("tr");  // Fila del jurado seleccionado
    var cells = juradoRow.getElementsByTagName("td");
    
    // Asignar los valores a los campos del formulario
    document.getElementById("registro").value = cells[0].textContent;
    document.getElementById("nombre").value = cells[2].textContent.split(" ")[0];
    document.getElementById("apellido").value = cells[2].textContent.split(" ").slice(1).join(" ");
    document.getElementById("titulo").value = cells[1].textContent;
    document.getElementById("telefono").value = cells[3].textContent;
  }
});

// Cerrar el modal
span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
