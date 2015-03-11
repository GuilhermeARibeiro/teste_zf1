<?php

class Form_Produto extends Zend_Form
{
    public function init()
    {

        $this->setMethod('post');

        $descProduto = $this->createElement('Text', 'desc_produto', array('disableLoadDefaultDecorators' => true));
        $vlrPreco = $this->createElement('Text', 'vlr_preco', array('disableLoadDefaultDecorators' => true));
        $promocao_produto = $this->createElement('Select', 'promocao_produto',array('label'=>'ComboBox (select)','multiOptions'=>array('1'=>'Ativo','0'=>'Inativo')));
        $porcentagem_produto = $this->createElement('Text', 'porcentagem_produto', array('disableLoadDefaultDecorators' => true));
        
        $dta_inc_preco = $this->createElement('Text', 'dta_inc_preco', array('disableLoadDefaultDecorators' => true));
        $dta_validade_preco = $this->createElement('Text', 'dta_validade_preco', array('disableLoadDefaultDecorators' => true));

        $categoria = new Model_DbTable_Categoria();
        $result    = $categoria->buscaTodasCategorias();
        $fk_categoria = $this->createElement('Select', 'fk_categoria');

        foreach($result as $item) {
            
            $fk_categoria->addMultiOptions(array($item['pk_categoria']=>$item['desc_categoria']));

        }

        $dta_inc_preco->setRequired(false)
        ->setAttribs(array('placeholder' => 'Ex: 2015-02-02', 'style' => 'width: 200px;'))
        ->setLabel('Data Inicial:')
        ->setDecorators(array('ViewHelper'));


        $dta_validade_preco->setRequired(false)
        ->setAttribs(array('placeholder' => 'Ex: 2015-02-02', 'style' => 'width: 200px;'))
        ->setLabel('Data Final:')
        ->setDecorators(array('ViewHelper'));


        $descProduto->addFilters(array('StringTrim', 'StripTags'))
        ->addValidator('NotEmpty', true, array('messages' => 'O campo Descrição deve ser preenchido.'))
        ->setAttribs(array('placeholder' => 'Digite o nome do Produto', 'style' => 'width: 200px;'))
        ->setRequired(true)
        ->setLabel('Descrição:')
        ->setDecorators(array('ViewHelper'));

        $vlrPreco->addFilters(array('StringTrim', 'StripTags'))
        ->addValidator('NotEmpty', true, array('messages' => 'O campo Preco deve ser preenchido.'))
        ->setAttribs(array('placeholder' => 'Digite o preco do Produto', 'style' => 'width: 200px;'))
        ->setRequired(true)
        ->setLabel('Preço:')
        ->setDecorators(array('ViewHelper'));

        $porcentagem_produto->addFilters(array('StringTrim', 'StripTags'))
        ->setAttribs(array('placeholder' => 'Porcentagem de Desconto', 'style' => 'width: 200px;'))
        ->setRequired(true)
        ->setLabel('Porcentagem:')
        ->setDecorators(array('ViewHelper'));

        $promocao_produto->setRequired(true)
        ->setAttribs(array('style' => 'width: 200px;'))
        ->setLabel('Promocao:')
        ->setDecorators(array('ViewHelper'));

        $fk_categoria->setRequired(true)
        ->setAttribs(array('style' => 'width: 200px;'))
        ->setLabel('Categoria:')
        ->setDecorators(array('ViewHelper'));

        $this->addElements(array($dta_inc_preco));
        $this->addElements(array($dta_validade_preco));
        $this->addElements(array($descProduto));
        $this->addElements(array($vlrPreco));
        $this->addElements(array($promocao_produto));
        $this->addElements(array($porcentagem_produto));
        $this->addElements(array($fk_categoria));
    }
}