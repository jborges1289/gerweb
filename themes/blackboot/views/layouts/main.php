<?php
Yii::app()->clientscript
// use it when you need it!

  ->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
  ->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
  ->registerCoreScript( 'jquery' )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="language" content="en" />
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Le styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
        
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl.'/img/logo_riesgo.png'?>" type="imagen/png"/>
    </head>



    <body>

        <?php
        ?>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                   
                    
                    <a class="brand" href="#"><?php echo Yii::app()->name ?></a>
                    <div class="nav-collapse">
<?php

if (!Yii::app()->user->isGuest) {

    $id_usuario = Yii::app()->user->id; // admin

     $users = Usuario::model()->find(array(
            'select' => 'id_usuario',
            'condition' => 'usuario=:usuario',
            'params' => array(':usuario' => $id_usuario),
                )
        );
    
        
   $usuario_rol = $users->id_usuario;
   
    $userRol = UsuarioRol::model()->find(array(
        'condition' => 'usuario_id=:usuario_id',
        'params' => array(':usuario_id' => $usuario_rol),
            )
    );


    if ($userRol->rol_id == '1') {

        $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'nav'),
            'activeCssClass' => 'active',
            'items' => array(
                array('label' => 'Inicio', 'url' => array('/proyecto/admin'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Acerca De', 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Contacto', 'url' => array('/site/contact'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
            ),
        ));
    } else if ($userRol->rol_id === '2') {

        $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'nav'),
            'activeCssClass' => 'active',
            'items' => array(
                array('label' => 'Inicio', 'url' => array('/riesgo/admin'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Acerca De', 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Contacto', 'url' => array('/site/contact'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
            ),
        ));
    } else if ($userRol->rol_id === '3') {

        $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'nav'),
            'activeCssClass' => 'active',
            'items' => array(
                array('label' => 'Inicio', 'url' => array('/riesgo/index'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Acerca De', 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Contacto', 'url' => array('/site/contact'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
            ),
        ));
    } else {

        $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'nav'),
            'activeCssClass' => 'active',
            'items' => array(
                array('label' => 'Inicio', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Acerca De', 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Contacto', 'url' => array('/site/contact'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
            ),
        ));
    }
} else {

    $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'nav'),
        'activeCssClass' => 'active',
        'items' => array(
            array('label' => 'Inicio', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Acerca De', 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Contacto', 'url' => array('/site/contact'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
        ),
    ));
}
?>






                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="cont">
            <div class="container-fluid">
                        <?php if (isset($this->breadcrumbs)): ?>
                            <?php
                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => false,
                                'tagName' => 'ul',
                                'separator' => '',
                                'activeLinkTemplate' => '<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
                                'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
                                'htmlOptions' => array('class' => 'breadcrumb')
                            ));
                            ?>
                    <!-- breadcrumbs -->
<?php endif ?>

<?php echo $content ?>


            </div><!--/.fluid-container-->
        </div>

        <div class="extra">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        
                      <?php 
                   
                  if (!Yii::app()->user->isGuest) { 
                      
                      if ($userRol->rol_id == '1'){
                          
                          echo '<h4><a href="index.php?r=proyecto/admin">Inicio</a></h4>';
                          
                      }else if($userRol->rol_id == '2'){
                          
                           echo '<h4><a href="index.php?r=riesgo/admin">Inicio</a></h4>';
                          
                      }else if($userRol->rol_id == '3'){
                          
                           echo '<h4><a href="index.php?r=riesgo/index">Inicio</a></h4>';
                          
                  }
                  
                      }else{
                          
                           echo '<h4><a href="index.php?r=site/login">Inicio</a></h4>';
                          
                      } ?>  
                        
                        
                        <ul>
<!--                            <li><a href="#">Subheading 1.1</a></li>
                            <li><a href="#">Subheading 1.2</a></li>
                            <li><a href="#">Subheading 1.3</a></li>
                            <li><a href="#">Subheading 1.4</a></li>-->
                        </ul>
                    </div> <!-- /span3 -->

                    <div class="col-md-3">
                        
                        
                               <?php 
                   
                  if (!Yii::app()->user->isGuest) { 
                      
                      if ($userRol->rol_id == '1'){
                          
                          echo '<h4><a href="index.php?r=site/logout">Salir (' . Yii::app()->user->name . ')</a></h4>';
                          
                      }else if($userRol->rol_id == '2'){
                          
                           echo '<h4><a href="index.php?r=site/logout">Salir (' . Yii::app()->user->name . ')</a></h4>';
                          
                      }else if($userRol->rol_id == '3'){
                          
                          echo '<h4><a href="index.php?r=site/logout">Salir (' . Yii::app()->user->name . ')</a></h4>';
                          
                  }
                  
                      }else{
                          
                           echo '<h4><a href="index.php?r=site/page&view=about">Acerca De</a></h4>';
                          
                      } ?>  
                        
                     
                        
                        <ul>
<!--                            <li><a href="#">Subheading 2.1</a></li>
                            <li><a href="#">Subheading 2.2</a></li>
                            <li><a href="#">Subheading 2.3</a></li>
                            <li><a href="#">Subheading 2.4</a></li>-->
                        </ul>
                    </div> <!-- /span3 -->

                    <div class="col-md-3">
                       
                        
                               <?php 
                   
                  if (!Yii::app()->user->isGuest) { 
                      
                      if ($userRol->rol_id == '1'){
                          
//                          echo '<h4><a href="index.php?r=site/logout">Salir (' . Yii::app()->user->name . ')</a></h4>';
                          
                      }else if($userRol->rol_id == '2'){
                          
//                           echo '<h4><a href="index.php?r=site/logout">Salir (' . Yii::app()->user->name . ')</a></h4>';
                          
                      }else if($userRol->rol_id == '3'){
                          
//                           echo '<h4><a href="index.php?r=riesgo/index">Inicio</a></h4>';
                          
                  }
                  
                      }else{
                          
                           echo '<h4><a href="index.php?r=site/contact">Contacto</a></h4>';
                          
                      } ?>  
                        
                        
                        
                        
<!--                        <ul>
                            <li><a href="#">Subheading 3.1</a></li>
                            <li><a href="#">Subheading 3.2</a></li>
                            <li><a href="#">Subheading 3.3</a></li>
                            <li><a href="#">Subheading 3.4</a></li>
                        </ul>-->
                    </div>  

<!--                    <div class="col-md-3">
                        <h4>Heading 4</h4>
                        <ul>
                            <li><a href="#">Subheading 4.1</a></li>
                            <li><a href="#">Subheading 4.2</a></li>
                            <li><a href="#">Subheading 4.3</a></li>
                            <li><a href="#">Subheading 4.4</a></li>
                        </ul>
                    </div>  /span3 -->
                </div> <!-- /row -->
            </div> <!-- /container -->
        </div>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div id="footer-copyright" class="col-md-6">
                        Acerca de | Contacto | Términos y condiciones
                    </div> <!-- /span6 -->
                    <div id="footer-terms" class="col-md-6">
                       <!-- © 2012-13 Black Bootstrap. <a href="http://nachi.me.pn" target="_blank">Nachi</a>.-->
                    </div> <!-- /.span6 -->
                </div> <!-- /row -->
            </div> <!-- /container -->
        </div>
    </body>
</html>
