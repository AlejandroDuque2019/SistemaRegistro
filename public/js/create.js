$(document).ready(function(){

$("#btnRegistro").click(function(){
  //var fechaFinalCargaTran = $(this).val();
  //alert('llega');
  $.get("/index.php/registroAsistencia/",function(data)
      {
        var contador = 0
          for (var i in data){
            contador = contador +1;
          }
          //alert(contador);
          if (contador == 4)
          {
            alert('Ya ha iniciado fecha de actividad el dia de hoy');
            return false;
          }
      });
});
});