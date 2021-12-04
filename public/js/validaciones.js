
function validarDias(){
    let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaFinal = document.getElementById("FechaFinal").value;

}


function parseDate(value) {
    var parts = value.match(/(\d+)/g);
    // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
    return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
}

function myFunction(diasHabiles){

    //alert(diasHabiles);
   /* let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaFinal = document.getElementById("FechaFin").value;

    let fechaDate = new Date(fechaFinal);
    let fechaDate2 = new Date(fechaInicio);


    var result = (fechaDate.getTime() - fechaDate2.getTime()) / (1000 * 60 * 60 * 24);


return result-contador;*/

    var startDate = parseDate(document.getElementById("FechaInicio").value);
    var endDate =  parseDate(document.getElementById("FechaFin").value);
    // Validate input
    if (endDate < startDate)
        return 0;

    // Calculate days between dates
    var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
    startDate.setHours(0,0,0,1);  // Start just after midnight
    endDate.setHours(23,59,59,999);  // End just before midnight
    var diff = endDate - startDate;  // Milliseconds between datetime objects
    var days = Math.ceil(diff / millisecondsPerDay);

    // Subtract two weekend days for every week in between
    var weeks = Math.floor(days / 7);
    days = days - (weeks * 2);

    // Handle special cases
    var startDay = startDate.getDay();
    var endDay = endDate.getDay();

    // Remove weekend not previously removed.
    if (startDay - endDay > 1)
        days = days - 2;

    // Remove start day if span starts on Sunday but ends before Saturday
    if (startDay == 0 && endDay != 6)
        days = days - 1

    // Remove end day if span ends on Saturday but starts after Sunday
    if (endDay == 6 && startDay != 0)
        days = days - 1

    console.log(days);
    var restante = days - diasHabiles;

    return days;


}

function myFunction2(diasHabiles){

    //alert(diasHabiles);
   /* let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaFinal = document.getElementById("FechaFin").value;

    let fechaDate = new Date(fechaFinal);
    let fechaDate2 = new Date(fechaInicio);


    var result = (fechaDate.getTime() - fechaDate2.getTime()) / (1000 * 60 * 60 * 24);


return result-contador;*/

    var startDate = parseDate(document.getElementById("FechaInicio2").value);
    var endDate =  parseDate(document.getElementById("FechaFin2").value);
    // Validate input
    if (endDate < startDate)
        return 0;

    // Calculate days between dates
    var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
    startDate.setHours(0,0,0,1);  // Start just after midnight
    endDate.setHours(23,59,59,999);  // End just before midnight
    var diff = endDate - startDate;  // Milliseconds between datetime objects
    var days = Math.ceil(diff / millisecondsPerDay);

    // Subtract two weekend days for every week in between
    var weeks = Math.floor(days / 7);
    days = days - (weeks * 2);

    // Handle special cases
    var startDay = startDate.getDay();
    var endDay = endDate.getDay();

    // Remove weekend not previously removed.
    if (startDay - endDay > 1)
        days = days - 2;

    // Remove start day if span starts on Sunday but ends before Saturday
    if (startDay == 0 && endDay != 6)
        days = days - 1

    // Remove end day if span ends on Saturday but starts after Sunday
    if (endDay == 6 && startDay != 0)
        days = days - 1

    console.log(days);
    var restante = days - diasHabiles;

    return days;


}


function esconderBoton(){
    document.getElementById('periodo22').hidden=false;
    document.getElementById('formulario22').hidden=false;
    document.getElementById('peri').style.display="none";
    document.getElementById('formularioActual').style.display="none";
    document.getElementById('registroh2').style.display="none";
    document.getElementById('pDias').style.display="none";
  

  
 }

 function esconderBoton2(){
    document.getElementById('periodo22').style.display="none";
    document.getElementById('formulario22').style.display="none";
  
 }



function diasPasados(){
    let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaDate2 = new Date(fechaInicio);

    let comienza = new Date('2021-12-15');
    let termina = new Date('2022-01-31');
    //fechaDate2.setDate(10);

    if(fechaDate2 >= comienza && fechaDate2 <= termina){
        alert("Fecha correcta para registrar");
    }
    else if(fechaDate2 > termina){
        alert("Ingresaste una fecha posterior al registro. Este comienza el 15 de diciembre del 2021 hasta el 31 de enero del 2022");
    }
    else {
        alert("Ingresaste una fecha pasada. El registro comienza el 15 de diciembre del 2021 hasta el 31 de enero del 2022");
    }
}

function diasPasados2(fechaIngreso){
    let fechaInicio = document.getElementById("FechaInicio2").value;
    let fechaDate2 = moment(fechaInicio);

    var parts =fechaIngreso.split('/');
// Please pay attention to the month (parts[1]); JavaScript counts months from 0:
// January - 0, February - 1, etc.
    var ingreso = new Date(parts[2], parts[1] - 1, parts[0]); 
    ingreso.setFullYear(2022);

    var tope = new Date('2022-12-31');
    // console.log(typeof fech);
    // console.log(fech);
    // console.log(fechaDate2);
    //fechaDate2.setDate(10);

    if(fechaDate2 >= ingreso && fechaDate2 <= tope){
        alert("Fecha correcta para registrar");
    }
    else if(fechaDate2 > tope){
        alert("Ingresaste una fecha posterior al registro. Este comienza a partir de tu fecha de ingreso cambiando el año por el del actual periodo ( " + fechaIngreso + " ) hasta el 31 de diciembre del 2022");
    }
    else {
        alert("Ingresaste una fecha pasada. El registro comienza a partir de tu fecha de ingreso cambiando el año por el del actual periodo ( " + fechaIngreso +  " ) hasta el 31 de diciembre del 2022");
    }
}

function emailJs1(){
        (function () {
            emailjs.init("user_9jJ4JByGdiHwXSvI6L0ZH");
        })();
        var templateParams = {
        RPE: document.getElementById("RPE").value,
        Nombre: document.getElementById("Nombre").value,
            diasHabiles: document.getElementById("diasHabiles").value,
            descripcion: document.getElementById("Descripcion").value,
        FechaInicio: document.getElementById("FechaInicio").value,
        FechaFin: document.getElementById("FechaFin").value,
        //to_email: 'cristobalalejandrobtds@gmail.com'
    };

        emailjs.send('gmail', 'template_w6i21tp', templateParams)
        .then(function (response) {
        console.log('SUCCESS!', response.status, response.text);
        alert("Se ha enviado el mensaje exitosamente") //le agrege este alert nomas para saber que si se envio
    }, function (error) {
        console.log('FAILED...', error);
        alert("Hubo un error al mandar el mensaje") //
    });
}


/*function handler(e){


      var  msDay = 60*60*24*1000;
    let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaFinal = document.getElementById("FechaFinal").value;

    let cambioAux1 = Date.parse(fechaInicio);
    let cambioAux2 = Date.parse(fechaFinal);

    console.log(cambioAux2);

    //let days = (Math.floor((cambioAux2 - cambioAux1) / msDay) + ' full days between');



}*/
