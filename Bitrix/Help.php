<!-- Вывод масива, только для админа -->
<?
global $USER;
if($USER -> IsAdmin()){
    echo('<pre>');
    print_r($yourArray);
}
?>
<!-- Вывод масива, только для админа -->

<!-- Получение пользовательских свойств раздела -->
<?$fSections = CIBlockSection::GetList(
    false,
    Array("IBLOCK_ID" => /*Тут id инфоблока*/ , "ID" => /*Тут id раздела*/ , "ACTIVE"=>"Y", "GLOBAL_ACTIVE"=>"Y", "SECTION_ACTIVE" => "Y"),
    false,
    Array("Здесь название св-ва"),
    false
);    
    $flSections = $fSections->Fetch();
    $links =  $flSections["Здесь название св-ва"];
    echo $links;
?>
<!-- Получение пользовательских свойств раздела -->


<!-- Получение id раздела по вложености -->
<?
$scRes = CIBlockSection::GetNavChain(
    $arResult['IBLOCK_ID'],
    $arResult['IBLOCK_SECTION_ID'],
    array("ID","DEPTH_LEVEL")
);
$ROOT_SECTION_ID = 0;
while($arGrp = $scRes->Fetch()){
// определяем корневой раздел
if ($arGrp['DEPTH_LEVEL'] == 1){
$ROOT_SECTION_ID = $arGrp['ID'];
}
}
?>
<!-- Получение id раздела по вложености -->

<!-- Наложение вотермарик на уже загруженные картинки -->
<?
$arWaterMark = Array(
    array(
       "name" => "watermark",
       "position" => "bottomright", // Положение
       "type" => "image",
       "size" => "real",
       "file" => $_SERVER["DOCUMENT_ROOT"].'/upload/copy.png', // Путь к картинке
       "fill" => "exact",
   )
);
$arFileTmp = CFile::ResizeImageGet(
// Здесь вставляем путь к картинке которую нужно зарезайзить как пример вот --> $arElement["DETAIL_PICTURE"],
   array("width" => 250, "height" => 127),
   BX_RESIZE_IMAGE_EXACT,
   true,
   $arWaterMark
);
?>
<!-- Наложение вотермарик на уже загруженные картинки -->