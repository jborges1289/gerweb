<?php
$this->pageTitle=Yii::app()->name . ' - Resultados de la busqueda';
$this->breadcrumbs=array(
    'Resultados de la busqueda',
);
?>


 
<h3>Resultados de la busqueda para: "<?php echo CHtml::encode($term); 



?>"</h3>
<?php 


if (!empty($results)): ?>
<?php 

    
$pages = new CPagination(count($results));

$currentPage = Yii::app()->getRequest()->getQuery('page', 1);
$pages->pageSize = 1 ;

 for($i = $currentPage * $pages->pageSize - $pages->pageSize, $end = $currentPage * $pages->pageSize; $i<$end;$i++):
?>                  
                  <h5>Proyectos</h5>

                    <p>Título: <?php echo $query->highlightMatches(CHtml::encode($results[$i]->titulo)); ?></p>
                    <p>Tipo proyecto: <?php echo $query->highlightMatches(CHtml::encode($results[$i]->tipo_proyecto)); ?></p>
                    <p>Descripcion: <?php echo $query->highlightMatches(CHtml::encode($results[$i]->descripcion)); ?></p>
                    <p>Fecha inicio: <?php echo $query->highlightMatches(CHtml::encode($results[$i]->fecha_i)); ?></p>
                    <p>Fecha fin: <?php echo $query->highlightMatches(CHtml::encode($results[$i]->fecha_f)); ?></p>
                
                    <br>
                    <br>
                    
                   
                <?php endfor; ?>

 <?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) 
     
 ?>
                    <br><br>                 
                    <?php
                    
                    echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
                    
                    ?>
                    
            <?php else: ?>
                <p class="error">No hay resultados que coincidan con los términos de búsqueda</p>
            
                <br><br>
                    <?php
                    
                    echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
                    
                    ?>
                    
                    <?php endif; ?>