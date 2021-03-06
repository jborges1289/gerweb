<?php
/* @var $this UsuarioController */
/* @var $model Usuario */


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
         $this->pageTitle=Yii::app()->name . ' - Crear Admin de Riesgos';
         $this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear Admin de Riesgos',
);
 $this->menu=array(
       array(
        'label' => 'Proyectos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Crear Proyecto', 'url'=>array('proyecto/create')),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/index')),
 
            )
        ), 

     array(
        'label' => 'Usuarios',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('admin')),
	array('label'=>'Listar Admin de Riesgos', 'url'=>array('index')),  
       )),
            
             array(
        'label' => 'Riesgos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
))
        
);
     
         echo '<h1>Crear Admin de Riesgos</h1>';
         
     }else if($userRol->rol_id=='2'){
         
         $this->pageTitle=Yii::app()->name . ' - Crear Integrante de Riesgos';
         $this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear Integrante de Riesgos',
);

         
        $this->menu=array(
	
               array(
        'label' => 'Riesgos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
	array('label'=>'Crear Riesgo', 'url'=>array('riesgo/create')),
        array('label'=>'Frecuencia de Riesgos', 'url'=>array('riesgo/frecuencia')),
        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('riesgo/lineaCorte')),
        array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
    
        )),
                   
          array(
        'label' => 'Usuarios',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
//        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('index')),
))
                   
);
         
         echo '<h1>Crear Integrante de Riesgos</h1>';
         
     }else if($userRol->rol_id=='3'){
         
         //no tiene menu este usuario
         
     }

?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>