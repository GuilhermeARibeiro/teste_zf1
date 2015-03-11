<?php
/**
 * Model da tabela Categoria.
 *
 * @author Jaime Marcelo Valasek <http://zf2.com.br> <zf2@zf2.com.br>
 */
class Model_DbTable_Categoria extends Zend_Db_Table_Abstract
{
	/**
	 * Nome da tabela na base de dados
	 *
	 * @var string
	 * @access protected
	 * @override
	 */
	protected $_name 	= 'tb_categoria';

	/**
	 * Nome da chave primária da tabela.
	 *
	 * @var string
	 * @access protected
	 * @override
	 */
	protected $_primary = 'pk_categoria';

	// ---------------------------------------------------------------------

	public function buscaTodasCategorias(){

		$sql = $this->_db->select()
					->from('tb_categoria', array('pk_categoria','desc_categoria'));

		return $this->_db->fetchAll($sql);
	}

}