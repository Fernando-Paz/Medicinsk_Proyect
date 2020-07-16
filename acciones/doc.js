let rec;
    if (!("webkitSpeechRecognition" in window)) {
    	alert("disculpas, no puedes usar la API");
    } else {
    	rec = new webkitSpeechRecognition();
    	rec.lang = "es";
    	rec.continuous = true;
    	rec.interim = true;
    	rec.addEventListener("result",iniciar);
    }
function iniciar(event){
	for (let i = event.resultIndex; i < event.results.length; i++){
         document.getElementById('texto').innerHTML = event.results[i][0].transcript;
	}
}

function darle(){
	rec.start();
}

function pararle(){
	rec.stop();
}

function separar(){
	var cadena,cadenamin;
	var index,indexanterior;
	var palabrabuscada;
	var nombre,edad,diagnostico,temperatura,peso,alergias, fecha, talla, cita;
	nombre = "";
	edad = "";
	diagnostico = "";
	temperatura ="";
	peso="";
	alergias="";
	fecha="";
	talla="";
	cita="";
	var x;
	cadena = document.getElementById('texto').innerHTML;
	cadenamin= cadena.toLocaleLowerCase();
	//Formato con el que se trabajara sera de la siguiente manera Nombre paciente, edad, fecha, cita, alergias, peso, talla, temperatura 
	//y en si ya la receta, lo que se hara es que se sepraran los campos a continuación para posteriormente crear la receta en pdf 
	index = cadenamin.indexOf("edad");
	for(x=0;x<index;x++){
		if(x==0){
			nombre = nombre + cadena[x].toUpperCase();
		}
		else{
			nombre = nombre + cadena[x];
		}
	}
	//alert(""+nombre)
	indexanterior = index;
	index = cadenamin.indexOf("fecha");
	for(x=indexanterior;x<index;x++){
		if(x==0){
			edad = edad + cadena[x].toUpperCase();
		}
		else{
			edad = edad + cadena[x];
		}
	}
	//alert(""+edad)
	indexanterior = index;
	index = cadenamin.indexOf("cita");
	for(x=indexanterior;x<index;x++){
		if(x==0){
			fecha = fecha + cadena[x].toUpperCase();
		}
		else{
			fecha = fecha + cadena[x];
		}
	}
	//alert(""+fecha)
	indexanterior = index;
	index = cadenamin.indexOf("alergias");
	for(x=indexanterior;x<index;x++){
		if(x==0){
			cita = cita + cadena[x].toUpperCase();
		}
		else{
			cita = cita + cadena[x];
		}
	}
	//alert(""+cita)
	indexanterior = index;
	index = cadenamin.indexOf("peso");
	for(x=indexanterior;x<index;x++){
		if(x==0){
			alergias = alergias + cadena[x].toUpperCase();
		}
		else{
			alergias = alergias + cadena[x];
		}
	}
	//alert(""+alergias)
	indexanterior = index;
	index = cadenamin.indexOf("talla");
	for(x=indexanterior;x<index;x++){
		if(x==0){
			peso = peso + cadena[x].toUpperCase();
		}
		else{
			peso = peso + cadena[x];
		}
	}
	//alert(""+peso)
	indexanterior = index;
	index = cadenamin.indexOf("temperatura");
	for(x=indexanterior;x<index;x++){
		if(x==0){
			talla = talla + cadena[x].toUpperCase();
		}
		else{
			talla = talla + cadena[x];
		}
	}
	//alert(""+talla)
	indexanterior = index;
	index = cadenamin.indexOf("diagnóstico");
	for(x=indexanterior;x<index;x++){
		if(x==0){
			temperatura = temperatura + cadena[x].toUpperCase();
		}
		else{
			temperatura = temperatura + cadena[x];
		}
	}
	//alert(""+temperatura)
	indexanterior = index;
	index = cadenamin.length;
	for(x=indexanterior;x<index;x++){
		if(x==0){
			diagnostico = diagnostico + cadena[x].toUpperCase();
		}
		else{
			diagnostico = diagnostico + cadena[x];
		}
	}
	crearPDF(nombre,edad,fecha,cita,alergias,peso,talla,temperatura,diagnostico);
}

function crearPDF(name,age,date,dateci,allergies,weight,size,temperature,diagnost){
	var nombre,edad,diagnostico,temperatura,peso,alergias, fecha, talla, cita;
	nombre = ""; edad = ""; diagnostico = ""; temperatura =""; peso=""; alergias=""; fecha=""; talla="";cita="";
	nombre = name;	edad = age; fecha = date; cita = dateci; alergias = allergies; peso = weight; talla = size; temperatura = temperature;
	//diagnostico = diagnost;
	//url de la foto, es necesario para usarse con jsPDF
	var imgData = 'data:image/jpeg;base64,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';
	var doc = new jsPDF()
	doc.addImage(imgData, 'JPEG', 15, 15, 60, 40)
	doc.setLineWidth(2);
	//linea que separa el titulo
	doc.line(15, 70, 200, 70);
	//rectangulo donde se pondra la receta
	doc.line(15, 120, 200, 120);
	doc.line(15, 270, 200, 270);
	doc.line(15, 120, 15, 270);
	doc.line(200, 120, 200, 270);
	doc.setFontSize(12)
	var x=15,y=75;
	doc.text(x,y-8,""+fecha);
	doc.text(x+100,y-8,""+cita);
	doc.text(x,y,""+nombre);
	doc.text(x+120,y,""+edad);
	doc.text(x+120,y+10,""+peso);
	doc.text(x+120,y+20,""+talla);
	doc.text(x+120,y+30,""+temperatura);
	doc.setFontSize(11)
	//92 caracteres por fila oki 
	var z;
	for(pos=0; pos<diagnost.length;pos++){
		z = pos % 80;
		if(z==0){
			diagnostico = diagnostico + "\n\n";
		}
		diagnostico = diagnostico + diagnost[pos];
	}
	doc.text(x+5,y+50,""+diagnostico);
	doc.text(x+5,260,"Nombre y firma del Médico");
	doc.text(x+5,265,"Nombre del medico desde la BD");
	doc.text(x+120,260,"Cédula profesional:");
	doc.text(x+120,265,"Cédula desde la BD");
	var string = doc.output('datauristring');
	$('iframe').attr('src', string);
}
