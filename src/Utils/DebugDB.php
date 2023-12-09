<?php

namespace Microwin7\PHPUtils\Utils;

use Microwin7\PHPUtils\Configs\MainConfig;
use Microwin7\PHPUtils\Configs\PathConfig;

class DebugDB
{
	/**
	 * @psalm-param 'debug'|'debug_error' $path
	 */
	private function file_put_contents(string $path, string $message): void
	{
		$directory = PathConfig::DB_LOG_FOLDER;
		if (defined('DB_MODULE_NAME')) {
			if (defined('DB_MODULE_COMPONENT_NAME')) $directory .= constant('DB_MODULE_NAME') . '/' . constant('DB_MODULE_COMPONENT_NAME') . '/';
			else $directory .= constant('DB_MODULE_NAME') . '/';
		} else $directory .= substr(strrchr(realpath('.'), '/'), 1) . '/';
		if (!file_exists($directory))
			mkdir($directory, 0777, true);
		file_put_contents($directory . $path . '_' . date("Y.n") . '.log', date('[d] | H:i:s - ') . $message . "\n", FILE_APPEND);
	}
	public function debug(string $message): void
	{
		if (MainConfig::DB_DEBUG) $this->file_put_contents(__FUNCTION__, $message);
	}
	public function debug_error(string $message): void
	{
		if (MainConfig::DB_DEBUG) $this->file_put_contents(__FUNCTION__, $message);
	}
	public function debug_extra(string $message, string $folder= 'extra'): void
    {
		if (MainConfig::DB_DEBUG) $this->file_put_contents($folder, $message);
	}
}
