<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->pageTitle=Yii::app()->name . ' - Frecuencia por Categoria';
$this->breadcrumbs=array(
	'Riesgos'=>'',
	'Frecuencia por Categoria',
);

$usuario = Yii::app()->user->id;


     $users = Usuario::model()->find(array(
            'select' => 'id_usuario',
            'condition' => 'usuario=:usuario',
            'params' => array(':usuario' => $usuario),
                )
        );
    
        
   $usuario_rol_id = $users->id_usuario;
   
    $userRol = UsuarioRol::model()->find(array(
        'condition' => 'usuario_id=:usuario_id',
        'params' => array(':usuario_id' => $usuario_rol_id),
            )
    );

if($userRol->rol_id== '1'){
         
         
         
     }else if($userRol->rol_id=='2'){
       
         $this->menu=array(
   array(
        'label' => 'Riesgos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(      
//        array('label'=>'Crear Riesgo', 'url'=>array('create')),
        array('label'=>'Listar Riesgos', 'url'=>array('index')),
        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('lineaCorte')),
       )),
             array(
        'label' => 'Usuarios',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('usuario/admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('usuario/index')),
	))
);
         
     }else if($userRol->rol_id=='3'){
//          $this->menu=array(  array('label'=>'Listar Riesgo', 'url'=>array('index')
             
//                 ));
         
     }

?>

<h1>Frecuencia de Riesgos por Categor&iacute;a</h1>

<?php
$flashChart = Yii::createComponent('application.extensions.openflashchart.EOFC2');

$flashChart->begin('Categoria');
$flashChart->setTitle('Frecuencia por Categoría','{color:747474;font-size:15px;padding-bottom:20px;}');
 
$data['1']['Riesgo']['categoria'] = 'Proyecto';
$data['1']['Riesgo']['cantidad'] = $proyecto;
$data['2']['Riesgo']['categoria'] = 'Negocio';
$data['2']['Riesgo']['cantidad'] = $negocio;
$data['3']['Riesgo']['categoria'] = 'Técnico';
$data['3']['Riesgo']['cantidad'] = $tecnico;
 
$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Riesgo.cantidad');
$flashChart->setLabelsPath('default.{n}.Riesgo.categoria');
 
$flashChart->setLegend('x','Categoría de Riesgo');
$flashChart->setLegend('y','Frecuencia', '{color:747474;font-size:12px;}');
 
$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,100,5)));
 
$flashChart->renderData();
$flashChart->render(400,350);
?>