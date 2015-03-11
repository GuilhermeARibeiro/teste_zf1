<?php
/**
 * Controlador Index
 * Exemplo de MVC
 *
 */
class IndexController extends Zend_Controller_Action
{

	/**
	 * Ação index
	 */
	public function indexAction()
	{
	    $this->view->page = 'produtos';
	}


	public function searchAction()
	{
		// desabilitando o layout
		$this->_helper->layout->disableLayout();

		// desabilitando a renderização automática
		$this->_helper->viewRenderer->setNoRender(true);

	}

	public function listarAction()
	{
	    $this->view->page = 'produtos';
	}

	public function menuLateralAction()
	{
		$modelCategorias = new Model_DbTable_Categoria();

		$this->view->categorias = $modelCategorias->buscaTodasCategorias();
	}

	public function instrucoesAction()
	{
	    $this->view->page = 'instrucoes';
	}

	public function navigationAction()
	{

	}

}