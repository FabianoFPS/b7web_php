$(() => {

    $('#senha').on('keyup', function(){

        let senhaDigitada = $(this).val();
        let forca_ = 0;

        if (senhaDigitada.length > 6) {
            
            //console.log('linha 10')
            forca_ = 25;
        }

        

        let arrReg = [  new RegExp (/[a-z]/i), 
                        new RegExp (/[0-9]/i), 
                        new RegExp (/[^0-9a-z]/i)];

        arrReg.map(function(r){

            if(r.test(senhaDigitada)){
                forca_ += 25;
            }
        });

        // let reg = new RegExp (/[a-z]/i);
        // if (reg.test(senhaDigitada)) {
            
        //     forca_ += 25;
        // }

        // reg = new RegExp (/[0-9]/i);

        // if (reg.test(senhaDigitada)) {
            
        //     forca_ += 25;
        // }

        // reg = new RegExp (/[^0-9a-z]/i);

        // if (reg.test(senhaDigitada)) {
            
        //     forca_ += 25;
        // }
        $('#valor-forca').html(forca_);
    });
});