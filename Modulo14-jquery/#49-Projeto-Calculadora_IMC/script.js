$(() => {

    $('#btn-imc').on('click', function(){

        let altura  = $('#altura').val().replace(',', '.');
        let peso    = $('#peso').val().replace(',', '.');

        let imc = peso / Math.pow(altura, 2);

        let traducao;

        if(imc < 16){
            
            traducao = "baixo peso muito grave";

        } else if (imc >= 16 && imc < 16.99){

            traducao = "baixo peso grave";

        } else if (imc >= 17 && imc < 18.49) {

            traducao = "Baixo peso";

        } else if (imc >= 18.5 && imc < 24.99){

            traducao = "Peso normal";

        } else if (imc >= 25 && imc < 29.99){

            traducao = "Sobre peso";
        } else if (imc >= 30 && imc < 34.99){

            traducao = "Obesidade grau I";
        }

        $('#resultado').html(`Seu IMC é: ${imc} kg/m e seu status é: ${traducao}`);
    });
});