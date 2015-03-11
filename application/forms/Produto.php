<?php

class Form_Produto extends Zend_Form
{
    public function init()
    {

        $this->setMethod('post');

        $descProduto = $this->createElement('Text', 'desc_produto', array('disableLoadDefaultDecorators' => true));
        $vlrPreco = $this->createElement('Text', 'vlr_preco', array('disableLoadDefaultDecorators' => true));

        $descProduto->addFilters(array('StringTrim', 'StripTags'))
        ->addValidator('NotEmpty', true, array('messages' => 'O campo Descri��o deve ser preenchido.'))
        ->setAttribs(array('placeholder' => 'Digite o nome do Produto', 'style' => 'width: 200px;'))
        ->setRequired(true)
        ->setLabel('Descri��o:')
        ->setDecorators(array('ViewHelper'));

        $vlrPreco->addFilters(array('StringTrim', 'StripTags'))
        ->addValidator('NotEmpty', true, array('messages' => 'O campo Preco deve ser preenchido.'))
        ->setAttribs(array('placeholder' => 'Digite o preco do Produto', 'style' => 'width: 200px;'))
        ->setRequired(true)
        ->setLabel('Pre�o:')
        ->setDecorators(array('ViewHelper'));


        $this->addElements(array($descProduto));
        $this->addElements(array($vlrPreco));
    }
}