function poneFecha(){
  fechaActual = new Date();
  dia = fechaActual.getDate();
  mes = fechaActual.getMonth()+1;
  ano = fechaActual.getFullYear();
  fechaImp = dia + " del " + mes + " de " + ano;
  document.getElementById("fecha").innerHTML = fechaImp;
}

