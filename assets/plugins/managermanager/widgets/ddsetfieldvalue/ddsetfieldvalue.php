<?php
/** 
 * ddSetFieldValue
 * @version 1.0.2 (2012-02-12)
 * 
 * Жёстко выставляет необходимые значения заданному полю
 * 
 * @todo Основан на mm_default
 * 
 * @param field {string} - Имя поля, для которого необходимо установить значение.
 * @param value {string} - Значение, которое необходимо установить.
 * @param roles {comma separated string} - Id ролей. По умолчанию: для всех ролей.
 * @param templates {comma separated string} - Id шаблонов. По умолчанию: для всех шаблонов.
 * 
 * @copyright 2012, DivanDesign
 * http://www.DivanDesign.ru
 */

function mm_ddSetFieldValue($field, $value='', $roles='', $templates=''){

	global $modx, $content, $mm_fields;
	$e = &$modx->Event;
	
	if ($e->name == 'OnDocFormRender' && useThisRule($roles, $templates)){
		
		$output = " // ----------- mm_ddSetFieldValue :: Begin -------------- \n";
		
		//Подбираем правильный формат даты в соответствии с конфигурацией
		switch($modx->config['date_format']){
			case 'dd-mm-yy':
				$date_format = 'd-m-Y';
			break;
			case 'mm/dd/yy':
				$date_format = 'm/d/Y';
			break;
			case 'yy/mm/dd':
				$date_format = 'Y/m/d';
			break;
		}
		
		//Смотрим, что за поле надо изменить
		switch ($field){
			//Дата публикации
			case 'pub_date':
				$value = ($value == '') ? date("$date_format H:i:s") : $value;
				$output .= '$("input[name=pub_date]").val("'.jsSafe($value).'"); '."\n";
			break;
			
			//Дата отмены публикации
			case 'unpub_date':
				$value = ($value=='') ? date("$date_format H:i:s") : $value;
				$output .= '$("input[name=unpub_date]").val("'.jsSafe($value).'"); '."\n";
			break;
			
			//Признак публикации
			case 'published':
				if ($value == '1'){
					$output .= '$("input[name=publishedcheck]").attr("checked", "checked"); '."\n";
				}else{
					$value = '0';
					$output .= '$("input[name=publishedcheck]").removeAttr("checked"); '."\n";
				}
				
				$output .= '$("input[name=published]").val("'.$value.'"); '."\n";
			break;
			
			//Признак отображения в меню
			case 'show_in_menu':
				if ($value == '1'){
					$output .= '$("input[name=hidemenucheck]").attr("checked", "checked"); '."\n";
				}else{
					$value = '0';
					$output .= '$("input[name=hidemenucheck]").removeAttr("checked"); '."\n";
				}
								
				$output .= '$("input[name=hidemenu]").val("'.$value.'"); '."\n";
			break;
			
			//Признак доступности для поиска
			case 'searchable':
				if ($value == '1'){
					$output .= '$("input[name=searchablecheck]").attr("checked", "checked"); '."\n";
				}else{
					$value = '0';
					$output .= '$("input[name=searchablecheck]").removeAttr("checked"); '."\n";
				}
				
				$output .= '$("input[name=searchable]").val("'.$value.'"); '."\n";
			break;
			
			//Признак кэширования
			case 'cacheable':
				if ($value == '1'){
					$output .= '$("input[name=cacheablecheck]").attr("checked", "checked"); '."\n";
				}else{
					$value = '0';
					$output .= '$("input[name=cacheablecheck]").removeAttr("checked"); '."\n";
				}
				
				$output .= '$("input[name=cacheable]").val("'.$value.'"); '."\n";
			break;
			
			//Признак очистки кэша
			case 'clear_cache':
				if ($value == '1'){
					$output .= '$("input[name=syncsitecheck]").attr("checked", "checked"); '."\n";
				}else{
					$value = '0';
					$output .= '$("input[name=syncsitecheck]").removeAttr("checked"); '."\n";
				}

				$output .= '$("input[name=syncsite]").val("'.$value.'"); '."\n";
			break;

			//Признак папки
			case 'is_folder':
				if ($value == '1'){
					$output .= '$("input[name=isfoldercheck]").attr("checked", "checked"); '."\n";
				}else{
					$value = '0';
					$output .= '$("input[name=isfoldercheck]").removeAttr("checked"); '."\n";
				}
			break;

			//Признак использованшия визуального редактора
			case 'is_richtext':
				$output .= 'var originalRichtextValue = $("#which_editor:first").val(); '."\n";
				
				if ($value == '1'){
					$output .= '$("input[name=richtextcheck]").attr("checked", "checked"); '."\n";
				}else{
					$value = '0';
					$output .= '
								$("input[name=richtextcheck]").removeAttr("checked");
								// Make the RTE displayed match the default value that has been set here
								if (originalRichtextValue != "none"){
									$("#which_editor").val("none");
									changeRTE();
								}
										
								';
					$output .= ''."\n";
				}

				$output .= '$("input[name=richtext]").val("'.$value.'"); '."\n";
			break;
			
			//Признак логирования
			case 'log':
				//TODO Note these are reversed from what you'd think
				$value = ($value) ? '0' : '1';
				
				if ($value == '1'){
					$output .= '$("input[name=donthitcheck]").attr("checked", "checked"); '."\n";
				}else{
					$output .= '$("input[name=donthitcheck]").removeAttr("checked"); '."\n";
				}
				
				$output .= '$("input[name=donthit]").val("'.$value.'"); '."\n";
			break;
			
			//Тип содержимого
			case 'content_type':
				$output .= '$("select[name=contentType]").val("'.$value.'");' . "\n";
			break;
			
			
			//TV
			default:
				// Which template is this page using?
				if (isset($content['template'])){
					$page_template = $content['template'];
				}else{
					// If no content is set, it's likely we're adding a new page at top level.
					// So use the site default template. This may need some work as it might interfere with a default template set by MM?
					$page_template = $modx->config['default_template'];
				}
				
				$tvsMas = tplUseTvs($page_template, $field);
				
				if ($tvsMas){
					$output .= '$("#tv'.$tvsMas[0]['id'].'").val("'.$value.'");' . "\n";
				}
			break;
		}
		
		$output .= "\n// ---------------- mm_ddSetFieldValue :: End -------------";
		
		$e->output($output . "\n");
	} 
}
?>