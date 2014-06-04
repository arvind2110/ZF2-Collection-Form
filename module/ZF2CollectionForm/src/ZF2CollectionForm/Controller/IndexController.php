<?php
namespace ZF2CollectionForm\Controller;

use Zend\View\Model\ViewModel;
use MyLib\Controller\AppController;
use ZF2CollectionForm\Form\Content;
use ZF2CollectionForm\Entity\Entity1;

class IndexController extends AppController
{

    /**
     * Render ZF2 collection form
     *
     * @author Arvind Singh
     *         (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $this->_getHelper('HeadScript', $this->getServiceLocator())
            ->appendFile('/js/modules/zf2-collection-form/zf2-collection-form.js');
        
        $form = new Content();
        $entity1 = new Entity1();
        $form->bind($entity1);
        
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $form->setData($data);
            
            if ($form->isValid()) {
                $data = $form->getData();
                $data = $this->_formatContent($data);
                
                print "<pre>";
                print_r($data);
                exit;
            }
        }
        
        /*
         * // In case to populate the fields, the data shuld be in the below format $content = array( 'Entity1' => array( 'elementName1' => 'arvind.singh@osscube.com', 'elements2' => array( '0' => array( 'elementName2' => 'Arvind', 'elements3' => array( '0' => array( 'elementName3' => 'Singh' ), '1' => array( 'elementName3' => 'Singh' ) ) ) ) ) ); $form->setData($content);
         */
        return new ViewModel(array(
            'form' => $form
        ));
    }

    /**
     * Format content
     *
     * @author Arvind Singh
     * @param
     *            Object Array $data // Object array
     * @return array
     */
    private function _formatContent($data)
    {
        $formatedData = array(
            'Entity1' => array(
                'elementName1' => '',
                'elements2' => array()
            )
        );
        
        $formatedData['Entity1']['elementName1'] = $data->getElementName1();
        $elements2 = $data->getElements2();
        
        foreach ($elements2 as $key => $element2) {
            
            $temp = array(
                'elementName2' => $element2->getElementName2(),
                'elements3' => array()
            );
            
            $elements3 = $element2->getElements3();
            foreach ($elements3 as $key1 => $element3) {
                $temp['elements3'][$key1] = array(
                    'elementName3' => $element3->getElementName3()
                );
            }
            
            $formatedData['Entity1']['elements2'][$key] = $temp;
        }
        
        return $formatedData;
    }
}