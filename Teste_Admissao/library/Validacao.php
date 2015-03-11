<?php

class Validacao
{
	 /* Valida endereços de e-mail
	 *
	 * @param string $email
	 */
	function validaEmail($email)
	{
		return (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.
					 '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.
					 '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email));
	}
}

?>