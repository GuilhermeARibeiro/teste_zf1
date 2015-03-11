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

		$modelProduto = new Model_DbTable_Produto();
		$form = new Form_Produto();
		$this->view->form = $form;
	    $this->view->page = $modelProduto->buscaProdutoPreco();
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
		$id = $this->_request->getParam('id');

		$modelProduto = new Model_DbTable_Produto();

		$form = new Form_Produto();
		$this->view->form = $form;

	    $this->view->page = $modelProduto->buscaProdutoByCategoria($id);
	}

	public function buscaFiltroAction()
	{

		$modelProduto = new Model_DbTable_Produto();
		$form = new Form_Produto();
		$id = $this->_request->getParam('id');
		$request = $this->getRequest();
		
		if ($request->isPost()) {

			if ($modelProduto->buscaFiltro($_POST, $id )) {
				$this->view->page = $modelProduto->buscaFiltro($_POST, $id );
			}

		}

		$this->view->form = $form;
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