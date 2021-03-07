<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
      });
</script>

<script>
          $(document).ready(function () {
          $('#sub_category_name').on('change', function () {
          let id_carrera = $(this).val();
          $('#sub_category').empty();
          $('#sub_category').append(`<option value="0" disabled selected>Buscando...</option>`);
          $.ajax({
          type: 'GET',
          url: 'GetSubCatAgainstMainCatEdit/' + id_carrera,
          success: function (response) {
          var response = JSON.parse(response);
          //console.log(response);   
          $('#sub_category').empty();
          $('#sub_category').append(`<option value="0" disabled selected>Selecciona una oferta</option>`);
          response.forEach(element => {
              $('#sub_category').append(`<option value="${element['id_ofe_ext']}">${element['nombre_extesion']}</option>`);
              });
            }
        });
    });
});
</script>