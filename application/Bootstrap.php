<?php
/**
 * Application bootstrap
 *
 * @uses    Zend_Application_Bootstrap_Bootstrap
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Bootstrap autoloader for application resources
     *
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath'  => dirname(__FILE__),
        ));
        return $autoloader;
    }

   protected function _initView()
   {
		// Initialize view
        $view = new Zend_View();
        $view->setEncoding('ISO-8859-1');
        $view->doctype('XHTML1_TRANSITIONAL');

		$view->cssPath = $this->getStylesDir();
		$view->jsPath = $this->getScriptsDir();
		$view->imagePath = $this->getImagesDir();
		$view->skinPath = $this->getSkinDir();
		$view->fileVersion = $this->getFileVersion();

		// Add it to the ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer'
        );
        $viewRenderer->setView($view);

        // Return it, so that it can be stored by the bootstrap
        return $view;
	}

    public function getDb()
    {
    	$resource = $this->getPluginResource('db');
    	return $resource->getDbAdapter();
    }

	/**
	 * Retorna uma versão única para usar nos arquivos de JS e CSS
	 */
	public function getFileVersion() {
		return MD5($this->getBaseDir()->version);
	}

    public function getRootDir()
	{
		return realpath(dirname( dirname(__FILE__) ));
	}

    /**
     * Retorna a base dos arquivos, caminho absoluto
     * @param string Chave do arquivo config.ini para obter os arquivos do sistema
     * @return Zend_Config
     */
	public function getBaseDir($type='filesystem')
    {
        return (object) $this->getOption($type);
    }

    /**
     * Retorna o diretório da pasta SKIN, caminho relativo
     */
    public function getSkinDir()
    {
    	return $this->getBaseDir()->skin;
    }

    /**
     * Retorna o diretório do JS, caminho relativo
     * @return string
     */
    public function getScriptsDir()
    {
    	return $this->getSkinDir() . $this->getBaseDir()->scripts;
    }

    /**
     * Retorna o diretório do CSS, caminho relativo
     * @return string
     */
    public function getStylesDir()
    {
    	return $this->getSkinDir() . $this->getBaseDir()->styles;
    }

    /**
     * Retorna o diretório de imagem, caminho relativo
     * @return string
     */
    public function getImagesDir()
    {
    	return $this->getSkinDir() . $this->getBaseDir()->images;
    }

    public function getVar()
    {
    	return (object) $this->getBaseDir()->var;
    }

    /**
     * Retorna o diretório VAR, caminho absoluto
     * @return string
     */
    public function getVarDir()
    {
    	if ($this->getVar()->dir)
    		return $this->getRootDir() . $this->getVar()->dir;

    	return '';
    }

    /**
     * Retorna o diretório de configuração, caminho absoluto
     * @return string
     */
    public function getConfigDir()
    {
    	if ($this->getBaseDir()->etc)
    		return $this->getRootDir() . $this->getBaseDir()->etc;

    	return "";
    }

    /**
     * Retorna o diretório de cache, caminho absoluto
     * @return string
     */
    public function getCacheDir()
    {
    	if ($this->getVar()->cache)
    		return $this->getVarDir() . $this->getVar()->cache;

    	return '';
    }

    /**
     * Retorna o diretório de armazenamento das Sessões, caminho absoluto
     * @return string
     */
    public function getSessionDir()
    {
    	if ($this->getVar()->session)
    		return $this->getVarDir() . $this->getVar()->session;

    	return '';
    }

	/**
	 * Retorna o diretório de LOG, caminho absoluto
	 * @return string
	 */
	public function getLogDir()
    {
    	if ($this->getVar()->log)
    		return $this->getVarDir() . $this->getVar()->log;

    	return '';
    }

    /**
     * Retorna o diretório temporário, caminho absoluto
     * @return string
     */
	public function getTmpDir()
    {
    	if ($this->getVar()->tmp)
    		return $this->getVarDir() . $this->getVar()->tmp;

    	return '';
    }

    /**
     * log facility (??)
     *
     * @param string $message
     * @param integer $level
     * 	EMERG   = 0;  // Emergency: system is unusable
     * 	ALERT   = 1;  // Alert: action must be taken immediately
     * 	CRIT    = 2;  // Critical: critical conditions
     * 	ERR     = 3;  // Error: error conditions
     * 	WARN    = 4;  // Warning: warning conditions
     *  NOTICE  = 5;  // Notice: normal but significant condition
     * 	INFO    = 6;  // Informational: informational messages
     * 	DEBUG   = 7;  // Debug: debug messages
     *
     * @param string $file
     * @param void
     */
    public function log($message, $level=null, $file='')
    {
        static $loggers = array();

        $level = is_null($level) ? Zend_Log::DEBUG : $level;

        $file = empty($file) ? 'system.log' : $file;

        try {

            if ( !isset($loggers[$file]) ) {
            	$logDir = $this->getLogDir() . DIRECTORY_SEPARATOR;
                $logFile = $logDir . $file;

				if ( !is_dir($logDir) ) {
                    mkdir($logDir, 0777);
                }

                if ( !file_exists($logFile) ) {
                    file_put_contents($logFile,'');
                    chmod($logFile, 0777);
                }

                $format = '%timestamp% %priorityName% (%priority%): %message%' . PHP_EOL;
                $formatter = new Zend_Log_Formatter_Simple($format);
                $writer = new Zend_Log_Writer_Stream($logFile);
                $writer->setFormatter($formatter);
                $loggers[$file] = new Zend_Log($writer);
            }

            if (is_array($message) || is_object($message)) {
                $message = print_r($message, true);
            }

            $loggers[$file]->log($message, $level);
        } catch (Exception $e) {}
    }

    /**
     * Faz o log do Exception, arquivo gerado exception.log
     * Verificar a pasta LOG
     *
     * @param Exception $e
     * @return void
     */
    public function logException(Exception $e)
    {
    	$this->log("\n" . $e->__toString(), Zend_Log::ERR, 'exception_' . date('d-m-Y') . '.log');
    }
}
