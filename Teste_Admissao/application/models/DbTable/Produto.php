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
					->from('tb_produto', array('pk_produto','nome_produto'))
					->where("pk_produto = '{$id}'");

		return $this->_db->fetchAll($sql);
	}
}