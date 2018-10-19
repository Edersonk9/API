// MODAL LOGOUT
$('#logoutModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('RENOMEAR ARQUIVO ' + recipient)
  //console.log(recipient);
  //modal.find('.modal-footer input').val(recipient)
})
// MODAL LOGOUT
// CONSULTA CEP
$(document).ready( function() {
  /* Executa a requisição quando o campo CEP perder o foco */
  $('#cep').blur(function(){
    /* Configura a requisição AJAX */
    $.ajax({
      url : '/consulta_cep', /* URL que será chamada */
      type : 'POST', /* Tipo da requisição */
      data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
      headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      dataType: 'json', /* Tipo de transmissão */
      success: function(data){
        if(data.sucesso == 1){
          $('#logradouro').val(data.rua);
          $('#bairro').val(data.bairro);
          $('#cidade').val(data.cidade);
          $('#uf').val(data.estado);
          $('#numero').focus();
        }
      }
    });
    return false;
  })
});
// CONSULTA CEP

  $('#div_list').hide('fast');

$('#btn_list').click(function () {
  $('#div_list').show('fast');
});

$(document).ready(function() {
  var max_fields = 10; //maximum input boxes allowed
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e) { //on add input button click
    e.preventDefault();
    var length = wrapper.find("input:text").length;

    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div><input type="text" name="Texto' + (length+1) + '" /><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
    //Fazendo com que cada uma escreva seu name
    wrapper.find("input:text").each(function() {
      $(this).val($(this).attr('name'))
    });
  });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })

});
