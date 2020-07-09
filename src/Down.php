<?php
/**
 * 下载
 */
namespace ToolPackage;
class Down
{
	/**
	 * 生成一个文件名
	 */
	public function generateSaveName()
	{
		list($usec, $sec) = explode(' ', microtime());
		return str_replace('.', '', $sec . $usec);
	}

	/**
	 * 设置header
	 */
	public function header($size, $saveName = null)
	{
		isset($saveName) || $saveName = $this -> generateSaveName();
		header('Content-type: application/octet-stream');
		header('Accept-Ranges: bytes');
		header('Accept-Length: ' . $size);
		header('Content-Disposition: attachment; filename=' . $saveName);
	}

	/**
	 * 下载 一个 string
	 * $contents string
	 * $saveName 下载的文件名称
	 */
	public function text($contents, $saveName = null)
	{
		$this -> header(strlen($contents), $saveName);
		echo $contents;
	}
}
