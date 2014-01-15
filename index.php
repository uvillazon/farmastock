<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="logo.jpg" alt="Insertar logotipo aquí" name="Insert_logo" width="180" height="90" id="Insert_logo" style="background: #C6D580; display:block;" /></a> 
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">Indice</a></li>
      <li><a href="#">Almacen</a></li>
      <li><a href="#">Productos</a></li>
      <li><a href="#">Ventas</a></li>
      <li><a href="#">Pedido</a></li>
    </ul>
    <p> Los vínculos anteriores muestran una estructura de navegación básica que emplea una lista no ordenada con estilo de CSS. Utilícela como punto de partida y modifique las propiedades para lograr el aspecto deseado. Si necesita menús desplegables, créelos empleando un menú de Spry, un widget de menú de Adobe Exchange u otras soluciones de javascript o CSS.</p>
    <p>Si desea que la navegación se sitúe a lo largo de la parte superior, simplemente mueva ul.nav a la parte superior de la página y vuelva a crear el estilo.</p>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <h1>Instrucciones</h1>
    <p>Tenga en cuenta que la CSS para estos diseños cuenta con numerosos comentarios. Si realiza la mayor parte de su trabajo en la vista Diseño, eche un vistazo al código para obtener sugerencias sobre cómo trabajar con la CSS para diseños fijos. Puede quitar estos comentarios antes de lanzar el sitio. Para obtener más información sobre las técnicas usadas en estos diseños CSS, lea este artículo en el Centro de desarrolladores de Adobe: <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
    <h2>Método de borrado</h2>
    <p>Dado que todas las columnas son flotantes, este diseño usa una declaración clear:both en la regla .footer. Esta técnica de borrado fuerza a .container a conocer dónde terminan las columnas con el fin de mostrar cualquier borde o color de fondo que coloque en .container. Si su diseño exige la eliminación de .footer de .container, deberá usar un método de borrado diferente. El más fiable consiste en añadir una &lt;br class=&quot;clearfloat&quot; /&gt; o &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; tras la última columna flotante (pero antes de que se cierre .container). Esto proporcionará el mismo efecto de borrado.</p>
    <h3>Sustitución de logotipo</h3>
    <p>Se ha utilizado un marcador de posición de imagen en el .header de este diseño, en el que lo más probable es que desee colocar un logotipo. Se recomienda quitar el marcador de posición y reemplazarlo por su propio logotipo vinculado. </p>
    <p> Tenga en cuenta que si utiliza el inspector de propiedades para navegar hasta la imagen de su logotipo empleando el campo Origen (en lugar de quitar y reemplazar el marcador de posición), deberá quitar el fondo en línea y mostrar las propiedades. Estos estilos en línea sólo se utilizan para hacer que el marcador de posición del logotipo aparezca en los navegadores para fines de demostración. </p>
    <p>Para quitar los estilos en línea, asegúrese de que el panel Estilos CSS está configurado como Actual. Seleccione la imagen y, en la sección Propiedades del panel Estilos CSS, haga clic con el botón derecho del ratón y elimine las propiedades de visualización y de fondo. (Por supuesto que siempre podrá ir directamente al código y eliminar allí los estilos en línea de la imagen o el marcador de posición.)</p>
    <h4>Fondos</h4>
    <p>Por naturaleza, el color de fondo de cualquier div sólo se muestra a lo largo del contenido. Esto significa que si está usando un color de fondo o un borde para crear el aspecto de una columna lateral, éste no se extenderá hasta el pie de página, sino que se detendrá donde termine el contenido. Si la div de .content siempre va a incluir más contenido, puede colocar un borde en la div de .content para separarla de la columna.</p>
    <!-- end .content --></div>
  <div class="footer">
    <p>2014 &copy; Farmastock &reg;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
  