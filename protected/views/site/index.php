<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido a la aplicación <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div>
<p>La gestión de riesgos es importante debido a que ayuda a evitar desastres, retrabajo <br>
    y sobre-trabajo, pero aún mas importante, porque estimula la generación de <br>
    situaciones del tipo ganar-ganar. <br></p>
<p>
Una adecuada Gestión de Riesgos permite el óptimo aprovechamiento de recursos
y <br>provoca, como consecuencia, el aumento de ganancias y la disminución de pérdidas.<br>
La ausencia de una apropiada Gestión de Riesgos conlleva a la imposibilidad de
lograr<br> el control efectivo de un proyecto, derivando esto en la imposibilidad de
realizar <br>una correcta gestión. En consecuencia, la Gestión de Riesgos debe ser
enfatizada y <br>considerada como una actividad clave en todo tipo de proyectos,
particularmente en <br>proyectos de desarrollo de software.</p>
</div>

<div class='logo'>
    <?php
   echo CHtml::image(Yii::app()->theme->baseUrl.'/img/logo_riesgo.png'); 
    ?>
</div>
<br>
<div class="row buttons">
<?php echo CHtml::link('Presiona aquí', array('site/login'),array('style'=>'color: orange;','style' => 'margin-left: 175px','class'=>'btn btn-info')); ?>
</div>

