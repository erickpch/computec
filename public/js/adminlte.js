    //Cerrar el modal
    $(document).ready(function() {
        // Capturar clic en el botón de cierre
        $('#closeModalCreate').click(function() {
          // Ocultar el modal al que pertenece el botón de cierre
          $(this).closest('.modal').modal('hide');
        });
      });

      $(document).ready(function() {
        // Capturar clic en el botón de cierre
        $('#closeModalEdit').click(function() {
          // Ocultar el modal al que pertenece el botón de cierre
          $(this).closest('.modal').modal('hide');
        });
      });

      $(document).ready(function() {
        // Capturar clic en el botón de cierre
        $('#closeModalDelete').click(function() {
          // Ocultar el modal al que pertenece el botón de cierre
          $(this).closest('.modal').modal('hide');
        });
      });

      document.addEventListener("DOMContentLoaded", function() {
        // Obtiene el botón de cerrar por su ID
        var closeModalBtn = document.getElementById('closeModalDeleteDown');
        closeModalBtn.addEventListener('click', function() {
          var modal = document.getElementById('EliminarModal');
          $(modal).modal('hide');
          
        });
      });

      document.addEventListener("DOMContentLoaded", function() {
        // Obtiene el botón de cerrar por su ID
        var closeModalBtn = document.getElementById('closeModalCreateDown');
        closeModalBtn.addEventListener('click', function() {
          var modal = document.getElementById('crearModal');
          $(modal).modal('hide');
          
        });
      });

      document.addEventListener("DOMContentLoaded", function() {
        // Obtiene el botón de cerrar por su ID
        var closeModalBtn = document.getElementById('closeModalUpdateDown');
        closeModalBtn.addEventListener('click', function() {
          var modal = document.getElementById('editarModal');
          $(modal).modal('hide');
          
        });
      });
    