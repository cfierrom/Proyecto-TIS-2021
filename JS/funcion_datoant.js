function mostrardia(){
    document.getElementById('dia').style.display = 'block';
    document.getElementById('semana').style.display = 'none';
    document.getElementById('mes').style.display = 'none';
}

function mostrarsemana(){
    document.getElementById('dia').style.display = 'none';
    document.getElementById('semana').style.display = 'block';
    document.getElementById('mes').style.display = 'none';
}

function mostrarmes(){
    document.getElementById('dia').style.display = 'none';
    document.getElementById('semana').style.display = 'none';
    document.getElementById('mes').style.display = 'block';
}

function mostrargrafico(){
    var x = document.getElementById("graph");
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
// function search(){
//     if(document.getElementById("flexRadioDefault1").checked == false && document.getElementById("flexRadioDefault2").checked == false && document.getElementById("flexRadioDefault3").checked == false){
//         alert("Debe seleccionar alguna opción: 'Día', 'Semana', 'Mes'");
//     }   
// }