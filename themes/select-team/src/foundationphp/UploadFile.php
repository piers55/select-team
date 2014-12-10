<?php
namespace foundationphp;

class UploadFile
{
	protected $destination;
	protected $messages = array();
	protected $errorMessages = array();
	protected $maxSize = 512000;
	protected $permittedTypes = array(
			'image/jpeg',
			'image/pjpeg',
			'image/gif',
			'image/png',
			'image/webp', 
			'application/pdf'
	);
	protected $newName;
	protected $fileName;
	protected $typeCheckingOn = true;
	protected $notTrusted = array('bin', 'cgi', 'exe', 'js', 'pl', 'php', 'py', 'sh');
	protected $suffix = '.upload';
	protected $renameDuplicates;
	
	public function __construct($uploadFolder)
	{
		if (!is_dir($uploadFolder) || !is_writable($uploadFolder)) {
			throw new \Exception("$uploadFolder must be a valid, writable folder.");
		}
		if ($uploadFolder[strlen($uploadFolder)-1] != '/') {
			$uploadFolder .= '/';
		}
		$this->destination = $uploadFolder;
	}
	
	public function setMaxSize($bytes)
	{
		$serverMax = self::convertToBytes(ini_get('upload_max_filesize'));
		if ($bytes > $serverMax) {
			throw new \Exception('Maximum size cannot exceed server limit for individual files: ' .
	self::convertFromBytes($serverMax));
		}
		if (is_numeric($bytes) && $bytes > 0) {
			$this->maxSize = $bytes;
		}
	}
	
	public static function convertToBytes($val)
	{
		$val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		if (in_array($last, array('g', 'm', 'k'))){
			switch ($last) {
				case 'g':
					$val *= 1024;
				case 'm':
					$val *= 1024;
				case 'k':
					$val *= 1024;
			}
		}
		return $val;
	}
	
	public static function convertFromBytes($bytes)
	{
		$bytes /= 1024;
		if ($bytes > 1024) {
			return number_format($bytes/1024, 1) . ' MB';
		} else {
			return number_format($bytes, 1) . ' KB';
		}
	}
	
	public function allowAllTypes($suffix = null)
	{
		$this->typeCheckingOn = false;
		if (!is_null($suffix)) {
			if (strpos($suffix, '.') === 0 || $suffix == '') {
				$this->suffix = $suffix;
			} else {
				$this->suffix = ".$suffix";
			}
		}
	}
	
	public function upload($renameDuplicates = true)
	{
		$this->renameDuplicates = $renameDuplicates;
		$uploaded = current($_FILES);
		if (is_array($uploaded['name'])) {

			foreach ($uploaded['name'] as $key => $value) {
				$currentFile['name'] = $uploaded['name'][$key];
				$this->fileName = $currentFile['name'] ;
				$currentFile['type'] = $uploaded['type'][$key];
				$currentFile['tmp_name'] = $uploaded['tmp_name'][$key];
				$currentFile['error'] = $uploaded['error'][$key];
				$currentFile['size'] = $uploaded['size'][$key];
				
				if ($this->checkFile($currentFile)) {
					$this->moveFile($currentFile);
				}
			}
		} else {
			if ($this->checkFile($uploaded)) {
				$this->moveFile($uploaded);
			}
		}
	}
	
	public function getMessages()
	{
		return $this->messages;
	}

	public function getErrorMessages()
	{
		return $this->errorMessages;
	}
	
	protected function checkFile($file)
	{
		if ($file['error'] != 0) {
			$this->getErrorMessage($file);
			return false;
		}
		if (!$this->checkSize($file)) {
			return false;
		}
		if ($this->typeCheckingOn) {
		    if (!$this->checkType($file)) {
			    return false;
			}
		}
		$this->checkName($file);
		return true;
	}
	
	protected function getErrorMessage($file)
	{
		switch($file['error']) {
			case 1:
			case 2:
				$this->errorMessages[] = $file['name'] . ' es demasiado grande: (max: ' . 
				self::convertFromBytes($this->maxSize) . ') ';
				break;
			case 3:
				$this->errorMessages[] = $file['name'] . ' se subió parcialmente.';
				break;
			case 4:
				$this->errorMessages[] = 'No se mandó el archivo.';
				break;
			default:
				$this->errorMessages[] = 'Lo sentimos, hubo un problema al subir el archivo ' . $file['name'];
				break;
		}
	}
	
	protected function checkSize($file)
	{
		if ($file['size'] == 0) {
			$this->messages[] = $file['name'] . ' está vacío.';
			return false;
		} elseif ($file['size'] > $this->maxSize) {
			$this->messages[] = $file['name'] . ' excede el tamaño máximo para un archivo ('
					. self::convertFromBytes($this->maxSize) . ').';
			return false;
		} else {
			return true;
		}
	}
	
	protected function checkType($file) 
	{
		if (in_array($file['type'], $this->permittedTypes)) {
			return true;
		} else {
			$this->messages[] = $file['name'] . ' no es un tipo de archivo válido.';
			return false;
		}
	}
	
	protected function checkName($file)
	{
		$this->newName = null;
		$nospaces = str_replace(' ', '_', $file['name']);
		if ($nospaces != $file['name']) {
			$this->newName = $nospaces;
		}
		$nameparts = pathinfo($nospaces);
		$extension = isset($nameparts['extension']) ? $nameparts['extension'] : '';
		if (!$this->typeCheckingOn && !empty($this->suffix)) {
			if (in_array($extension, $this->notTrusted) || empty($extension)) {
				$this->newName = $nospaces . $this->suffix;
			}
		}
		if ($this->renameDuplicates) {
			$name = isset($this->newName) ? $this->newName : $file['name'];
			$existing = scandir($this->destination);
			if (in_array($name, $existing)) {
				$i = 1;
				do {
					$this->newName = $nameparts['filename'] . '_' . $i++;
					if (!empty($extension)) {
						$this->newName .= ".$extension";
					}
					if (in_array($extension, $this->notTrusted)) {
						$this->newName .= $this->suffix;
					}
				} while (in_array($this->newName, $existing));
			}
		}
	}
	
	protected function moveFile($file)
	{
		$filename = isset($this->newName) ? $this->newName : $file['name'];
		$success = move_uploaded_file($file['tmp_name'], $this->destination . $filename);
		if ($success) {
			$result = $file['name'] . ' fue subido con éxito ';
			if (!is_null($this->newName)) {
				$result .= ' y fue renombrado ' . $this->newName;
			}
			$result .= '';
			$this->messages[] = $result;
		} else {
			$this->messages[] = 'No se pudo subir ' . $file['name'];
		}
		$this->fileName = $filename;
	}

	public function getName(){
		return $this->fileName;
	}
}