 <script type="text/javascript">
 function cambiar () {
document.getElementById('imgavatar').src=document.getElementById('avatar').value;
}
 
 function activar1 () {
 sexo = document.getElementById('sexo');
 sexo2 = document.getElementById('sexox');
    img1 = document.getElementById('img1');
   
  if (sexo.style.display == "none") {
   sexo.style.display = "block";
   sexo2.style.display = "none";
     img1.style.display = "none";
    } else {
   sexo.style.display = "none";
   sexo2.style.display = "block";
    }
	
	 
  
}
 function activar2() {
  
 pais = document.getElementById('paises');
  pais2 = document.getElementById('paisx'); 
 img2 = document.getElementById('img2');
  
	 if (pais.style.display == "none") {
   pais.style.display = "block";
   pais2.style.display = "none";
     img2.style.display = "none";
 
    } else {
   pais.style.display = "none";
   pais2.style.display = "block";
    }
 
}
 function activar3 () { 
 estado = document.getElementById('estados');
  estado2 = document.getElementById('estadox'); 
 
  
	 if (estado.style.display == "none") {
   estado.style.display = "block";
   estado2.style.display = "none";
 
    } else {
   estado.style.display = "none";
   estado2.style.display = "block";
    }
  
}
 function inicio () {
 sexo = document.getElementById('sexo');
 pais = document.getElementById('paises');
 estado = document.getElementById('estados');
  sexo.style.display = "none";
  estado.style.display = "none";
  pais.style.display = "none";
}
 
 </script>