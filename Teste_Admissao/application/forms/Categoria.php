<?php
/**
 * Form para o cadastro de categorias.
 *
 */
class Form_Categoria extends Zend_Form
{
    public function init()
    {

        $this->setMethod('post');

        /*
         * CAMPO NOME OU RAZÃO SOCIAL
        */
        $descCategoria = $this->createElement('Text', 'desc_categoria', array('disableLoadDefaultDecorators' => true));
        $descCategoria->addFilters(array('StringTrim', 'StripTags'))
        ->addValidator('NotEmpty', true, array('messages' => 'O campo Descrição deve ser preenchido.'))
        ->setAttribs(array('placeholder' => 'Digite o nome da categoria', 'style' => 'width: 200px;'))
        ->setRequired(true)
        ->setLabel('Descrição:')
        ->setDecorators(array('ViewHelper'));

        // Adicionando os elementos
        $this->addElements(array($descCategoria));
    }
}