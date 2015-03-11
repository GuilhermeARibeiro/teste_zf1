<?php
/**
 * Controlador gerenciar categorias
 * Exemplo de MVC
 */
class GerenciarCategoriasController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->page = 'gerenciarCategorias';
    }

    public function indexAction()
    {
        $modelCategoria = new Model_DbTable_Categoria();

        $this->view->categorias = $modelCategoria->buscaTodasCategorias();
    }

    public function cadastrarAction()
    {
        $modelCategoria = new Model_DbTable_Categoria();
        $form = new Form_Categoria();
        $request = $this->getRequest();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {

                // Pegando os valores do formulário
                $data = $form->getValues();

                if ($modelCategoria->insert($data)) {
                    $this->_redirect('/gerenciar-categorias');
                }
            }
        }

        $this->view->form = $form;
    }

    public function alterarAction()
    {
        $modelCategoria = new Model_DbTable_Categoria();
        $form = new Form_Categoria();
        $request = $this->getRequest();

        // Pegando o id do endereço
        $id = (int) $this->_request->getParam('id');

        // busca a categoria
        $categoria = $modelCategoria->fetchRow("pk_categoria = $id")->toArray();

        // populando o form
        $form->populate($categoria);

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {

                // Pegando os valores do formulário
                $data = $form->getValues();

                if ($modelCategoria->update($data, "pk_categoria = $id")) {
                    $this->_redirect('/gerenciar-categorias');
                }
            }
        }

        $this->view->form = $form;
    }

    public function excluirAction()
    {
        // Pegando o id do endereço
        $id = (int) $this->_request->getParam('id');

        // instanciando o model
        $modelCategoria = new Model_DbTable_Categoria();

        if (!$modelCategoria->delete("pk_categoria = $id")) {
            throw new InvalidArgumentException("Houve um erro ao excluir o registro");
        }

        $this->_redirect('/gerenciar-categorias');
    }
}