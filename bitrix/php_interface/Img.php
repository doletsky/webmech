<?

class Img {

	function ResizeById ( $id = false, $width = 0, $height = 0 )
	{

		if ( ! isset ( $id ) && $id == FALSE ) return false;

		$arFileTmp = CFile::ResizeImageGet(
			$id,
			array(
				"width" => $width, 
				"height" => $height,
			),
			BX_RESIZE_IMAGE_EXACT,
			FALSE
		);

		$arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);

		return array(
			"WIDTH" => IntVal($arSize[0]),
			"HEIGHT" => IntVal($arSize[1]),
			"SRC" => $arFileTmp["src"],
		);

	}

}

class Text {

	public static function limit_words($str, $limit = 100, $end_char = NULL)
	{
		$limit = (int) $limit;
		$end_char = ($end_char === NULL) ? '…' : $end_char;

		if (trim($str) === '')
			return $str;

		if ($limit <= 0)
			return $end_char;

		preg_match('/^\s*+(?:\S++\s*+){1,'.$limit.'}/u', $str, $matches);

		return rtrim($matches[0]).((strlen($matches[0]) === strlen($str)) ? '' : $end_char);
	}

}

?>