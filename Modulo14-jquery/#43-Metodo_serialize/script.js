$(() => {

     $('#form').on('submit', function (eventoSubmit) {

          eventoSubmit.preventDefault();

          let texto = $(this).serialize();
          console.log(texto);
     });
});