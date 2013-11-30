<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Acerca De';
$this->breadcrumbs=array(
	'Acerca De',
);
?>
<h1>Acerca De</h1>


    
    <div>
        <p>
            GERWEB fue desarrollado para las asignaturas de Ingeniería Web y Aplicaciones Web  <br>  con Arquitectura con MVC (Framework Yii) 
            en la Facultad de Matemáticas de la  <br>  Universidad Autonoma de Yucatán.
        </p>
        
        <p>El propósito de este proyecto es presentar una herramienta de software que permita la <br> gestión de riesgos en proyectos de desarrollo  de Sistemas Informáticos.
            De esta forma <br> se puede administrar de manera proactiva cada acontecimiento presentado durante <br>el análisis, diseño, codificación, prueba y mantenimiento del software, y además es <br> 
            posible disponer de suficiente material para generar planes alternativos de contingencia.
    </div>
<br><br><br>
    <div class='logo'>
    <?php
   echo CHtml::image(Yii::app()->theme->baseUrl.'/img/logo_riesgo.png'); 
    ?>
</div>



