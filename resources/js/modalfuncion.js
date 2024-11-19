// Modal para añadir nuevo jurado
var addModal = document.getElementById("addModal");
var addBtn = document.getElementById("addBtn"); // Botón para añadir nuevo jurado
var addSpan = document.querySelector("#addModal .close");
var addSaveBtn = document.getElementById("saveBtn");
var addForm = document.getElementById("juradoForm");

// Botón para abrir el modal en modo "añadir nuevo jurado"
addBtn.onclick = function() {
  addModal.style.display = "block";
  addSaveBtn.textContent = "Aceptar";  // Cambia el texto del botón
  addForm.reset();  // Limpia el formulario
};

// Cerrar el modal de añadir nuevo jurado
addSpan.onclick = function() {
  addModal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == addModal) {
    addModal.style.display = "none";
  }
};

// Modal para editar jurado
var editModal = document.getElementById("editModal");
var editButtons = document.getElementsByClassName("edit-icon");
var editSpan = document.querySelector("#editModal .close");
var editSaveBtn = document.getElementById("editSaveBtn");
var editForm = document.getElementById("editJuradoForm");

async function openEditModal(url) {
  try {
      
      const response = await fetch(url, {
          method: 'GET',
          headers: {
              'Content-Type': 'application/json',
          },
      });

      if (!response.ok) {
          throw new Error('Error al obtener los datos del tribunal');
      }

      const data = await response.json();

     
      document.getElementById('editRegistro').value = data.registro || '';
      document.getElementById('editNombre').value = data.nombre || '';
      document.getElementById('editApellido').value = data.apellido || '';
      document.getElementById('editTelefono').value = data.telefono || '';
      document.getElementById('editCorreo').value = data.correo || '';
      document.getElementById('editEstado').value = data.estado || '';
      document.getElementById('id_tribunal').value=data.id_tribunal||'';

      
      const modal = document.getElementById('editModal');
      modal.style.display = 'block';

      
      document.querySelector('.close').onclick = () => {
          modal.style.display = 'none';
      };

     
      window.onclick = (event) => {
          if (event.target === modal) {
              modal.style.display = 'none';
          }
      };

  } catch (error) {
      console.error('Error:', error.message);
      alert('Hubo un problema al cargar los datos del jurado.');
  }
}


document.querySelectorAll('.edit-button').forEach(button => {
  button.addEventListener('click', function () {
      const url = this.dataset.url;
      openEditModal(url);
  });
});


// Cerrar el modal de editar jurado
editSpan.onclick = function() {
  editModal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
};
