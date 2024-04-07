
// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- PRODUCT RELATED FUNCTIONS

// canviem de categoria, (es crida al menu_principal)
async function canviCategoria(){
  var tagcategories = document.getElementById("categories");
  var resposta=await fetch("../index.php?ACCTION=get_productes_filtrats_categoria&categoria="+tagcategories.value);
  var respostaTxt = await resposta.text();
  document.getElementById("grid_productes").innerHTML = respostaTxt;
}

// mostrem un producte quan aquest és clicat (es crida al menú_principal) 
async function mostrarProducte(producte_ID){
  var resposta=await fetch("../index.php?ACCTION=Go_to_menu_productes&PRODUCTE_ID="+producte_ID);
  var respostaTxt = await resposta.text();
  document.getElementById("body").innerHTML = respostaTxt;  
}

// afegim un producte al carro (es crida al menú_producte) 
async function addToCart(producte_ID){
  // buscquem l'element selector d'unitats
  var selector_unitats_input = document.getElementById("selector_unitats_input");
  
  // afegir producte a cart
  var resposta = await fetch("../index.php?ACCTION=afegir_a_carro&id_producte="+producte_ID+"&quantitat="+selector_unitats_input.value);
  var respostaTxt = await resposta.text();
  
  // recarreguem la pàgina
  location.reload();    
}

// al cridar aquesta funció s'augmenta tant com s'indiqui el valor d'un selsector d'unitats, semrè dins del rang [0, max] 
// (es crida al menú_producte i al menu_carro) 
function afegirUnitats(afegit, max)
{
  var val = document.getElementById("selector_unitats_input").value;
  if (!isNaN(val)){
    var sum = parseInt(val) + afegit;
    if(sum < 1)
      document.getElementById("selector_unitats_input").value = "1";
    else if (sum > parseInt(max))
      document.getElementById("selector_unitats_input").value = max;
    else
      document.getElementById("selector_unitats_input").value = sum;
  }
}

// comprova que les unitats d'un selector d'unitats estiguin dins d'un rang correcte [0, max] 
// (es crida al menú_producte i al menu_carro) 
function unitatsInRange(max) {
  var val = document.getElementById("selector_unitats_input").value;
  if (!isNaN(val)){
    val = parseInt(val);
    if(val < 1)
      document.getElementById("selector_unitats_input").value = "1";
    else if (val > parseInt(max))
      document.getElementById("selector_unitats_input").value = max;
    else
      document.getElementById("selector_unitats_input").value = val;
  }
}

// afegir unitats des del carro (s'acutalitza la BD automàticament)
async function afegirUnitatsDesDeCarro(afegit, max, producte_ID){
  // seleccionem els elements del HTML que necessitem
  var selector_unitats_input = document.getElementById("selector_"+producte_ID+"");
  var preuTotalItem = document.getElementById(producte_ID);
  var subtotalCarro = document.getElementById("Subtotal_carro_preu");
  var preuResumCarro = document.getElementById("preu_resum_carro");

  // calculem algunes variables més ultil desprès
  const preuAnterior = parseStringToFloat(preuTotalItem.innerHTML);
  var val = selector_unitats_input.value;
  // mirem que el text sigui nu numero i no un tipus diferent
  if (!isNaN(val)){
    // comprovem que els valors estiguin dins dels rangs determinats i editem el selector_unitats_input
    var sum = parseInt(val) + afegit;
    if(sum < 1){
      selector_unitats_input.value = "1";
      sum = 1;
    }
    else if (sum > parseInt(max)){
       selector_unitats_input.value = max;
       sum = max;
    }
    else
      selector_unitats_input.value = sum;
    
    var resposta = await fetch("../index.php?ACCTION=modificar_quantitat_item&id_producte="+producte_ID+"&quantitat="+sum);
    var respostaTxt = await resposta.text();
    preuTotalItem.innerHTML=respostaTxt;
    subtotalCarro.innerHTML = formatFloatToString(parseStringToFloat(subtotalCarro.innerHTML)+(parseStringToFloat(respostaTxt)-preuAnterior));
    preuResumCarro.innerHTML = subtotalCarro.innerHTML;
      
  }
}





// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- CARRO I COMPRA RELATED FUCTIONS
async function afegirCompraCarroBD()
{ 
  await fetch("../index.php?ACCTION=afegir_compra_BD&is_carro=S");
  window.location.href = "https://tdiw-g7.deic-docencia.uab.cat/index.php?ACCTION=Go_to_menu_compra_realitzada";
}

// eliminar element del carro
async function borrar_item_carro(id_item)
{
  var resposta = await fetch("../index.php?ACCTION=borrar_item_carro&id_item="+id_item);
  var respostaTxt = await resposta.text();
  location.reload();
}

async function borrar_items_carro()
{
  //alert(mail);
  await fetch("../index.php?ACCTION=borrar_items_carro");
  location.reload();
}

// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- USER RELATED FUNCTIONS

async function confirmaRegistre()
{
  alert("Registrant estudiant");
  var tagUser = document.getElementById("nom");
  var res = await fetch("../index.php?ACCTION=Go_to_usuari_registrat");
  var resTxT = await res.text();  
  document.getElementById("formID").innerHTML = resTxT;
}


// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- SESSION RELATED FUNCTIONS
async function destroySession(){
  await fetch("../index.php?ACCTION=unset_session"); 
  location.reload(); // segurament  calgui canviar o afegir coses
}



// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- ELEMENT DISPLAYS
function displayNoneElement(element_id){
  var element = document.getElementById(element_id);
  element.style.display = "none";
    
    
}
function displayBlockElement(element_id){
  var element = document.getElementById(element_id);
  element.style.display = "block";
}


// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- FUNCIONS CAPÇALERA
async function cercarNomsProductes(){
  // busquem els elements que calen
  var element_buscador_text = document.getElementById("buscador_text");
  var element_buscador_llista_productes = document.getElementById("buscador_llista_productes");

  // busquem els productes que continguin les lletres que busquem
  if(element_buscador_text.value == "") 
  {
    // no s'ha introduit res
    element_buscador_llista_productes.innerHTML = "";
    element_buscador_llista_productes.style.display = "none";
  }else{
    var res = await fetch("../index.php?ACCTION=get_productes_filtrats_nom&LLETRES_PRODUCTE="+element_buscador_text.value);
    var res_txt = await res.text();  
    
    // mostrem els productes
    if(res_txt.replace(/\s/g, "") == ""){
      element_buscador_llista_productes.innerHTML = "";
      element_buscador_llista_productes.style.display = "none";
    }
    else{
      element_buscador_llista_productes.innerHTML = res_txt;
      element_buscador_llista_productes.style.display = "flex";
    }
  }
}


// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- OTHER FUNCTIONS
async function canviarColorDiv(item){
  item.style.backgroundColor = 'gray';
}

function parseStringToFloat(value) {
  const cleanedValue = value.trim().replace(/ €$/, '');
  const floatValue = parseFloat(cleanedValue);

  return isNaN(floatValue) ? null : floatValue;
}

function formatFloatToString(value) {
  const floatValue = Number(value);

  if (!isNaN(floatValue)) {
      // arrodonim els decimals i afegim "€" al final
      const roundedValue = floatValue.toFixed(2);
      const formattedString = roundedValue + " €";

      return formattedString;
  } else {
      return null; 
  }
}

function emptyFunc() {}

//-+-+-+-+-+-+-+-+-+-+-++--+-+-+-+-+-+-+-++--++--+-+-+-+--+-+-++--+-+--+-+-+-+-+-+-+-+-+-+-+-+-+-+-+--+-+-+-+- FUNCTIONS RELATED TO SEARCH
async function cerca(esdeveniment){
  if(esdeveniment.keyCode==13){
    var input = document.getElementById('buscador_form').value;
    var InputNorm = input.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
    var Inputchar = InputNorm.charAt(0).toUpperCase() + input.slice(1);
    const serverResponse = await fetch(`/../_controller/cercador.php?input=${inputNorm}`);
    if(serverResponse.ok){
      const dataTxt = await serverResponse.text();
      document.body.innerHTML = dataTxt; 
    }
  }
}