export default function fnExportada(texto){

    console.log("Modulo exportado com sucesso!");

    function fnInterna(){

        console.log(texto);
    }

    fnInterna();
}