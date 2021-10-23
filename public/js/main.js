function confirmDelete(url){ 
    if (confirm("Deseja realmente deletar este registro?")){ 
         window.location = url; 
    } 
   }
   
  function verificarEmail(){ 
      $.ajax({ 
               url:site_url+"usuarios/verificar_email", 
               data:{"email":$("#verificarEmail").val(), 
                    "id":$("#id").val()}, 
               dataType:'json', 
               success:function(res){ 
                if (res.usuario != null){ 
                    $("#emailMsg").html("Este e-mail está cadastrado para:" +res.usuario.nome);  } else 
               if (res.valido){ 
                    $("#emailMsg").html("O email digitado é válido"); 
               } else { 
                    $("#emailMsg").html("O email digitado é inválido"); 
               } 
          } 
      }) 
}

$(document).ready(function() {

     function limpa_formulário_cep() {
         // Limpa valores do formulário de cep.
         $("#bairro").val("");
         $("#cidade").val("");
         $("#uf").val("");
         $("#ibge").val("");
     }
     
     //Quando o campo cep perde o foco.
     $("#cep").blur(function() {

         //Nova variável "cep" somente com dígitos.
         var cep = $(this).val().replace(/\D/g, '');

         //Verifica se campo cep possui valor informado.
         if (cep != "") {

             //Expressão regular para validar o CEP.
             var validacep = /^[0-9]{8}$/;

             //Valida o formato do CEP.
             if(validacep.test(cep)) {

                 //Preenche os campos com "..." enquanto consulta webservice.
                
                 $("#bairro").val("...");
                 $("#cidade").val("...");
                 $("#uf").val("...");
                 $("#ibge").val("...");

                 //Consulta o webservice viacep.com.br/
                 $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                     if (!("erro" in dados)) {
                         //Atualiza os campos com os valores da consulta.
                         $("#logradouro").val(dados.logradouro);
                         $("#bairro").val(dados.bairro);
                         $("#cidade").val(dados.localidade);
                         $("#uf").val(dados.uf);
                         $("#ibge").val(dados.ibge);
                     } //end if.
                     else {
                         //CEP pesquisado não foi encontrado.
                         limpa_formulário_cep();
                         alert("CEP não encontrado.");
                     }
                 });
             } //end if.
             else {
                 //cep é inválido.
                 limpa_formulário_cep();
                 alert("Formato de CEP inválido.");
             }
         } //end if.
         else {
             //cep sem valor, limpa formulário.
             limpa_formulário_cep();
         }
     });
 });


       

   $(function(){ 
     $('.telefone').mask('(00) 00000-0000'); 
     $("#verificarEmail").keyup(verificarEmail); 
     $("#cep").mask("99.999-999");  /// a mascara do cep
})

 