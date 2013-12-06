<?php
 
Yii::import('zii.widgets.CPortlet');
 
class SearchBlock extends CPortlet
{
    public $title='Buscador';
 
    protected function renderContent()
    {
           echo CHtml::beginForm(array('search/search'), 'get', array('style'=> 'inline')) .
        CHtml::textField('q', '', array('placeholder'=> 'buscar...','style'=>'width:140px;')) .
        CHtml::submitButton('Buscar',array('style'=>'width:100px;', 'class'=>'buscar')) .
        CHtml::endForm('');
    }
}

?>