<? if ( ! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();

//print_r( $arResult );

$arResult["PICTURE"] = FALSE;

	$PictureWidth = 99;
	$PictureHeight = 99;

		// Картинка анонса
		if ( is_array ( $arResult["PREVIEW_PICTURE"] ) && isset ( $arResult["PREVIEW_PICTURE"]["ID"] ) ) {

			$arResult["PICTURE"] = Img::ResizeById(
				$arResult["PREVIEW_PICTURE"]["ID"],
				$PictureWidth,
				$PictureHeight
			);

		} else if ( is_numeric ( $arResult["PREVIEW_PICTURE"] ) ) {

			$arResult["PICTURE"] = Img::ResizeById(
				$arResult["PREVIEW_PICTURE"],
				$PictureWidth,
				$PictureHeight
			);

		// Детальная картинка
		} else if ( is_array ( $arResult["DETAIL_PICTURE"] ) && isset ( $arResult["DETAIL_PICTURE"]["ID"] ) ) {

			$arResult["PICTURE"] = Img::ResizeById(
				$arResult["DETAIL_PICTURE"]["ID"],
				$PictureWidth,
				$PictureHeight
			);

		} else if ( is_numeric ( $arResult["DETAIL_PICTURE"] ) ) {

			$arResult["PICTURE"] = Img::ResizeById(
				$arResult["DETAIL_PICTURE"],
				$PictureWidth,
				$PictureHeight
			);

		}

		
		
			if ( isset ( $arResult['DISPLAY_PROPERTIES']['FEATURE'] ) ) {

				$arResult["TEXT"] = Text::limit_words( $arResult['DISPLAY_PROPERTIES']['FEATURE']['DISPLAY_VALUE'], 22 );

			} elseif ( $arResult["PREVIEW_TEXT"] ) {

				$arResult["TEXT"] = Text::limit_words( $arResult["PREVIEW_TEXT"], 22 );

			} elseif ( $arResult["DETAIL_TEXT"] ) {

				$arResult["TEXT"] = Text::limit_words( $arResult["DETAIL_TEXT"], 22 );

			}


?>