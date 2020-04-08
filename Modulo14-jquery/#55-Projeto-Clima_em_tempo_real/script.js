$(()=>{

    $('#pesquisa').on('click', function () {
        
        let cidade = $('#cidade').val();
        let now = new Date();
        let rnd = now.getFullYear()+''+now.getMonth()+''+now.getDay()+''+now.getHours();
        // console.log(now.getFullYear());
        // console.log(now.getMonth());
        // console.log(now.getDay());
        // console.log(now.getHours());
        console.log(cidade);

        let tempURL =  `https://query.yahooapis.com/v1/public/yql?
                        format=json&
                        rnd=${rnd}&
                        diagnostics=true&
                        callback=?&q=select * 
                                        from weather.forecast 
                                        where woeid in (select woeid 
                                                        from geo.place(1) 
                                                        where text='${cidade}') and u="c"`;

/*
https://hgbrasil.com/

Formatos disponíveis
json - retorno em JSON, padrão
json-cors - retorno em JSON com headers CORS, chave exposta requerida
php-serialize - serialização do PHP (antigo formato da API)
debug - JSON visual para humanos, apenas para testes, não utilizar em produção
https://api.hgbrasil.com/weather?format=json-cors&key=SUA-CHAVE
*/

        let endPoint = 'https://api.hgbrasil.com/weather';
        let key = '4a36c221';
        let format = 'json-cors';
        
        tempURL = `${endPoint}?format=${format}&key=${key}&city_name=${cidade}`;

        console.log(tempURL);

        $.ajax({
            url: encodeURI(tempURL),
            dataType: 'json',
            type: 'GET',
            beforeSend: function(){
                $('#resultado').html('Carregando...');
            },
            success: function(json){
                console.log(json);
                $('#resultado').html(json.results.temp+'ºC');
            },
            error: function(e){
                $('#resultado').html(e);
            }
        });
    });
});