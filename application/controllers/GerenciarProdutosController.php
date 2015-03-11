<?php

class GerenciarProdutosController extends Zend_Controller_Action
{
	public function init()
	{
		$this->view->page = 'gerenciarProdutos';
	}

	public function indexAction()
	{

		$modelProduto = new Model_DbTable_Produto();

		$this->view->produtos = $modelProduto->listarProdutos();
	}

	public function cadastrarAction()
	{

		$modelProduto = new Model_DbTable_Produto();
		$form = new Form_Produto();
		$request = $this->getRequest();

		if ($request->isPost()) {
			if ($form->isValid($request->getPost())) {

				$data = $form->getValues();
				$data['fk_categoria'] = 1;
				$data['status_produto'] = 1;

				if ($modelProduto->cadastrarProdutos($data)) {
					$this->_redirect('/gerenciar-produtos');
				}
			}
		}

		$this->view->form = $form;
	}

	public function alterarAction()
	{

		$modelProduto = new Model_DbTable_Produto();
        $form = new Form_Produto();
        $request = $this->getRequest();

        $id = $this->_request->getParam('id');
		$id_preco = $this->_request->getParam('id_preco');

        $produto = $modelProduto->findProduto($id);

        $form->populate($produto);

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {

                $data = $form->getValues();

                if ($modelProduto->atualizarProdutos($id,$data)) {
                    $this->_redirect('/gerenciar-produtos');
                }
            }
        }

        $this->view->form = $form;
	}

	public function excluirAction()
	{

		$id = (int) $this->_request->getParam('id');

		$modelProduto = new Model_DbTable_Produto();

		if (!$modelProduto->excluirPrecos($id) && !$modelProduto->excluirProdutos("pk_produto = $id")) {
			throw new InvalidArgumentException("Houve um erro ao excluir o registro");
		}

		$this->_redirect('/gerenciar-produtos');
	}
}