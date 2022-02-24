var CiclosList = {
	'Ciclo Formativo Grado Medio' :  ['Técnico en Aceites de Oliva y Vinos', 'Técnico en Actividades Comerciales', 'Técnico en Actividades Ecuestres', 'Técnico en Aprovechamiento y Conservación del Medio Natural', 'Técnico en Atención a Personas en Situación de Dependencia', 'Técnico en Calzado y Complementos de Moda', 'Técnico en Carpintería y Mueble'],
    'Ciclo Formativo Grado Superior' :  ['Técnico Superior Artista Fallero y Construcción de Escenografías', 'Técnico Superior de Artes Plásticas y Diseño en Animación', 'Técnico Superior en Acondicionamiento Físico', 'Técnico Superior en Acuicultura']
};

el_parent_ciclos = document.getElementById("parent_select_ciclos");
el_child_ciclos = document.getElementById("child_select_ciclos");

for (key in CiclosList) {
	el_parent_ciclos.innerHTML = el_parent_ciclos.innerHTML + '<option>'+ key +'</option>';
}

el_parent_ciclos.addEventListener('change', function populate_child(e){
	el_child_ciclos.innerHTML = '';
	itm = e.target.value;
	if(itm in CiclosList){
			for (i = 0; i < CiclosList[itm].length; i++) {
				el_child_ciclos.innerHTML = el_child_ciclos.innerHTML + '<option>'+ CiclosList[itm][i] +'</option>';
			}
	}
});









