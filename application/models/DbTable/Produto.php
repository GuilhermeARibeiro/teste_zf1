<?php
/**
 * Model da tabela Produto.
 *
 * @author Jaime Marcelo Valasek <http://zf2.com.br> <zf2@zf2.com.br>
 */
class Model_DbTable_Produto extends Zend_Db_Table_Abstract
{
	/**
	 * Nome da tabela na base de dados
	 *
	 * @var string
	 * @access protected
	 * @override
	 */
	protected $_name 	= 'tb_produtos';

	/**
	 * Nome da chave primária da tabela.
	 *
	 * @var string
	 * @access protected
	 * @override
	 */
	protected $_primary = 'produto_id';

	// ---------------------------------------------------------------------


	public function findProduto($id)
	{
		$sql = $this->_db->select()
					->from(array('pdt'=>'tb_produto' ), array('pk_produto','desc_produto','promocao_produto','porcentagem_produto'))
					->join(array('prc' => 'tb_preco'),'pdt.pk_produto = prc.fk_produto')
					->group(array('prc.fk_produto','pdt.pk_produto'))
					->where("pdt.pk_produto = '{$id}'");

		return $this->_db->fetchRow($sql);
	}

	public function listarProdutos()
	{
		$sql = $this->_db->select()
					->from(array('pdt'=>'tb_produto' ), array('pk_produto','desc_produto','promocao_produto','porcentagem_produto'))
					->join(array('prc' => 'tb_preco'),'pdt.pk_produto = prc.fk_produto')
					->group(array('prc.fk_produto','pdt.pk_produto'));

		return $this->_db->fetchAll($sql);
	}

	public function cadastrarProdutos($post)
	{

		$sql1 = $this->_db->insert('tb_produto', array('desc_produto' =>$post['desc_produto'], 'fk_categoria' =>$post['fk_categoria'], 'status_produto' =>$post['status_produto'], 'promocao_produto'=>$post['promocao_produto'], 'porcentagem_produto'=>$post['porcentagem_produto'] ));
		$stmt1 =  $this->_db->prepare($sql1);
		$rowsAdded=$stmt1->rowCount();
		$lastId=$this->_db->lastInsertId();

		$sql2 = $this->_db->insert('tb_preco', array("vlr_preco" =>$post['vlr_preco'], "dta_inc_preco" =>$post['dta_inc_preco'], 'dta_validade_preco'=>$post['dta_validade_preco'], 'dta_vigente_preco'=>$post['dta_vigente_preco'], "fk_produto" =>$lastId));
		$stmt2 =  $this->_db->prepare($sql2	);
		return true;
	}

	public function atualizarProdutos($id, $conteudo)
	{

		$sql1 = $this->_db->update('tb_produto', array("desc_produto"=>$conteudo['desc_produto'],"promocao_produto"=>$conteudo['promocao_produto'],"porcentagem_produto"=>$conteudo['porcentagem_produto'], "fk_categoria"=>$conteudo['fk_categoria']), "pk_produto ='{$id}'");
		$this->_db->prepare($sql1);

		$sql2 = $this->_db->update('tb_preco', array("vlr_preco"=>$conteudo['vlr_preco']), "fk_produto ='{$id}'");
		$this->_db->prepare($sql2);

		return true;
	}

	public function excluirProdutos($id)
	{
		$sql = $this->_db->delete('tb_produto', $id);
		return $this->_db->prepare($sql);

	}

	public function excluirPrecos($id)
	{
		$sql = $this->_db->delete('tb_preco', "fk_produto = '{$id}'");
		return $this->_db->prepare($sql);

	}

	public function buscaProdutoPreco() 
	{

		$sql = $this->_db->select()
					->from(array('pdt'=>'tb_produto' ), array('desc_produto'))
					->join(array('prc' => 'tb_preco'),'pdt.pk_produto = prc.fk_produto')
					->join(array('c' => 'tb_categoria'), 'c.pk_categoria = pdt.fk_categoria')
					->group(array('c.pk_categoria'));

		return $this->_db->fetchAll($sql);

	}

	public function buscaProdutoByCategoria($id)
	{

		$sql = $this->_db->select()
					->from(array('pdt'=>'tb_produto' ), array('desc_produto','porcentagem_produto'))
					->joinleft(array('prc' => 'tb_preco'),'pdt.pk_produto = prc.fk_produto')
					->where(" pdt.fk_categoria = '{$id}'");

		return $this->_db->fetchAll($sql);
	}

	public function buscaFiltro($post, $id){

		$dta_ini = $post['dta_inc_preco'];
		$dta_fim = $post['dta_validade_preco'];

		if(empty($dta_ini) && empty($dta_fim)) {

			$sql = $this->_db->select()
					->from(array('pdt'=>'tb_produto' ), array('desc_produto','porcentagem_produto'))
					->joinleft(array('prc' => 'tb_preco'),'pdt.pk_produto = prc.fk_produto')
					->where(" pdt.fk_categoria = '{$id}'");

			return $this->_db->fetchAll($sql);

		}


		$sql = $this->_db->select()
					->from(array('pdt'=>'tb_produto' ), array('desc_produto','porcentagem_produto'))
					->join(array('prc' => 'tb_preco'),'pdt.pk_produto = prc.fk_produto')
					->where(" prc.dta_validade_preco between '{$dta_ini}' and '{$dta_fim}' and  pdt.fk_categoria = '{$id}'");

		return $this->_db->fetchAll($sql);

	}

}