<?php
class SearchController extends Controller
{
    /**
     * @var string index dir as alias path from <b>application.</b>  , default to <b>runtime.search</b>
     */
    private $_indexFiles = 'runtime.search';
    /**
     * (non-PHPdoc)
     * @see CController::init()
     */
    public function init(){
        Yii::import('application.vendor.*');      
        require_once('Zend/Search/Lucene.php');
        parent::init(); 
    }
 
   public function actionCreate()
    {
       
        $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);

        
      
        $riesgos = Riesgo::model()->findAll();
        $proyectos = Proyecto::model()->findAll();
        $usuarios = Usuario::model()->findAll();
        
         $doc = new Zend_Search_Lucene_Document();
         
        foreach($proyectos as $proyecto){
            
            
//            $doc->addField(Zend_Search_Lucene_Field::Text('id_proyecto',
//                                          CHtml::encode($proyecto->id_proyecto), 'utf-8')
//            );
// 
            $doc->addField(Zend_Search_Lucene_Field::Text('titulo',
                                            CHtml::encode($proyecto->titulo)
                                                , 'utf-8')
            );   
 
            $doc->addField(Zend_Search_Lucene_Field::Text('descripcion',
                                          CHtml::encode($proyecto->descripcion)
                                          , 'utf-8')
            );
 
           $doc->addField(Zend_Search_Lucene_Field::Text('tipo_proyecto',
                                          CHtml::encode($proyecto->tipo_proyecto)
                                          , 'utf-8')
            );
           
            $doc->addField(Zend_Search_Lucene_Field::Text('fecha_i',
                                          CHtml::encode($proyecto->fecha_inicio)
                                          , 'utf-8')
            );
            
             $doc->addField(Zend_Search_Lucene_Field::Text('fecha_f',
                                          CHtml::encode($proyecto->fecha_fin)
                                          , 'utf-8')
            );
            
 
              $index->addDocument($doc);
            
        }
        
      
   
   
        $index->commit();
        
        
        echo 'Lucene index created';
    }
 
    public function actionSearch()
    {
        $this->layout='column2';
         if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) {
            
     
             
             $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
       
            $results = $index->find($term);
            $query = Zend_Search_Lucene_Search_QueryParser::parse($term);       
 
            
            $this->render('search', compact('results', 'term', 'query'));
        }
    }
}