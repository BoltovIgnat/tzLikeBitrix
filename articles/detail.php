<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статья детально");

$APPLICATION->IncludeComponent("bitrix:news.detail", "ibc_template_detail", Array(
	"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"USE_SHARE" => "Y",	// Отображать панель соц. закладок
		"SHARE_HIDE" => "N",	// Не раскрывать панель соц. закладок по умолчанию
		"SHARE_TEMPLATE" => "",	// Шаблон компонента панели соц. закладок
		"SHARE_HANDLERS" => array(	// Используемые соц. закладки и сети
			0 => "delicious",
		),
		"SHARE_SHORTEN_URL_LOGIN" => "",	// Логин для bit.ly
		"SHARE_SHORTEN_URL_KEY" => "",	// Ключ для для bit.ly
		"AJAX_MODE" => "Y",	// Включить режим AJAX
		"IBLOCK_TYPE" => "news",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_ID" => "5",	// Код информационного блока
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],	// ID новости
		"ELEMENT_CODE" => "",	// Код новости
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"FIELD_CODE" => array(	// Поля
			0 => "ID",
		),
		"PROPERTY_CODE" => array(	// Свойства
			0 => "DESCRIPTION",
		),
		"IBLOCK_URL" => "news.php?ID=#IBLOCK_ID#\"",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SET_CANONICAL_URL" => "Y",	// Устанавливать канонический URL
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"SET_STATUS_404" => "Y",	// Устанавливать статус 404
		"SET_LAST_MODIFIED" => "Y",	// Устанавливать в заголовках ответа время модификации страницы
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"USE_PERMISSIONS" => "Y",	// Использовать дополнительное ограничение доступа
		"GROUP_PERMISSIONS" => array(	// Группы пользователей, имеющие доступ к детальной информации
			0 => "1",
		),
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"DISPLAY_TOP_PAGER" => "Y",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"PAGER_TITLE" => "Страница",	// Название категорий
		"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
		"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
		"PAGER_BASE_LINK_ENABLE" => "Y",	// Включить обработку ссылок
		"SHOW_404" => "Y",	// Показ специальной страницы
		"MESSAGE_404" => "",
		"STRICT_SECTION_CHECK" => "Y",	// Строгая проверка раздела для показа элемента
		"PAGER_BASE_LINK" => "",	// Url для построения ссылок (по умолчанию - автоматически)
		"PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	),
	false
);

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>