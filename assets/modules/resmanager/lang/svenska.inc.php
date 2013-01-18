<?php
/**
 * Resource Manager Module - svenska.inc.php
 * 
 * Purpose: Contains the language strings for use in the module.
 * Author: Garry Nutting
 * For: MODx CMS (www.modxcms.com)
 * Date:29/09/2006 Version: 1.6
 *
 * Translation: Pontus Ågren (Pont)
 * Date: 2010-04-12
 * 
 */

//-- SWEDISH LANGUAGE FILE

//-- titles
$_lang['RM_module_title'] = 'Dokumenthanterare';
$_lang['RM_action_title'] = 'Välj en åtgärd';
$_lang['RM_range_title'] = 'Ange ett intervall av dokument-IDn';
$_lang['RM_tree_title'] = 'Välj dokument från dokumentträdet';
$_lang['RM_update_title'] = 'Uppdateringen är klar';
$_lang['RM_sort_title'] = 'Redigerare för menyindex';

//-- tabs
$_lang['RM_doc_permissions'] = 'Dokumenträttigheter';
$_lang['RM_template_variables'] = 'Mallvariabler';
$_lang['RM_sort_menu'] = 'Sortera menyposter';
$_lang['RM_change_template'] = 'Ändra mall';
$_lang['RM_publish'] = 'Publicera/Avpublicera';
$_lang['RM_other'] = 'Andra egenskaper';
 
//-- buttons
$_lang['RM_close'] = 'Stäng dokumenthanteraren';
$_lang['RM_cancel'] = 'Gå tillbaka';
$_lang['RM_go'] = 'Utför';
$_lang['RM_save'] = 'Spara';
$_lang['RM_sort_another'] = 'Sortera en annan';

//-- templates tab
$_lang['RM_tpl_desc'] = 'Välj den avsedda mallen i nedanstående tabell och ange sedan IDn på de dokument som ska ändras. Ange ett intervall av IDn eller använd trädfunktionen nedan.';
$_lang['RM_tpl_no_templates'] = 'Inga mallar hittades';
$_lang['RM_tpl_column_id'] = 'ID';
$_lang['RM_tpl_column_name'] = 'Namn';
$_lang['RM_tpl_column_description'] ='Beskrivning';
$_lang['RM_tpl_blank_template'] = 'Tom mall';

$_lang['RM_tpl_results_message'] = 'Använd Tillbaka-knappen om du behöver göra fler ändringar. Webbplatsens cache har rensats automatiskt.';

//-- template variables tab
$_lang['RM_tv_desc'] = 'Specificera IDn på de dokument som ska ändras genom att ange ett intervall av IDn eller genom att använda trädfunktionen nedan. Välj sedan den önskade mallen i tabellen så laddas de tillhörande mallvariablerna. Ändra därefter de värden på mallvariablerna som önskas och klicka på Skicka för att utföra ändringarna.';
$_lang['RM_tv_template_mismatch'] = 'Detta dokument använder inte den valda mallen.';
$_lang['RM_tv_doc_not_found'] = 'Dokumentet finns inte i databasen.';
$_lang['RM_tv_no_tv'] = 'Inga mallvariabler kunde hittas för mallen.';
$_lang['RM_tv_no_docs'] = 'Inga dokument har valts för uppdatering.';
$_lang['RM_tv_no_template_selected'] = 'Ingen mall har valts.';
$_lang['RM_tv_loading'] = 'Mallvariablerna laddas...';
$_lang['RM_tv_ignore_tv'] = 'Ignorera dessa mallvariabler (separera värden med kommatecken):';
$_lang['RM_tv_ajax_insertbutton'] = 'Infoga';

//-- document permissions tab
$_lang['RM_doc_desc'] = 'Markera den avsedda dokumentgruppen i tabellen nedan och välj om du vill lägga till eller ta bort den. Specificera sedan de dokument som ska ändras. Det görs antingen genom att specificera IDn i ett intervall eller genom att använda trädfunktionen nedan.';
$_lang['RM_doc_no_docs'] = 'Inga dokumentgrupper hittades';
$_lang['RM_doc_column_id'] = 'ID';
$_lang['RM_doc_column_name'] = 'Namn';
$_lang['RM_doc_radio_add'] = 'Lägg till en dokumentgrupp';
$_lang['RM_doc_radio_remove'] = 'Ta bort en dokumentgrupp';

$_lang['RM_doc_skip_message1'] = 'Dokument med ID';
$_lang['RM_doc_skip_message2'] = 'är redan en del av den valda dokumentgruppen (hoppar över)';

//-- sort menu tab
$_lang['RM_sort_pick_item'] = 'Klicka på webbplatsens rotdokument eller det föräldradokument som du vill sortera i dokumentträdet till vänster.'; 
$_lang['RM_sort_updating'] = 'Uppdaterar...';
$_lang['RM_sort_updated'] = 'Uppdaterad';
$_lang['RM_sort_nochildren'] = 'Föräldern har inga barn';
$_lang['RM_sort_noid']='Inga dokument har markerats. Gå tillbaka och välj ett dokument.';

//-- other tab
$_lang['RM_other_header'] = 'Övriga dokumentinställningar';
$_lang['RM_misc_label'] = 'Tillgängliga inställningar:';
$_lang['RM_misc_desc'] = 'Välj en inställning från rullgardinsmenyn och sedan den förändring som önskas. Notera att det bara går att ändra en inställning i taget.';

$_lang['RM_other_dropdown_publish'] = 'Publicera/Avpublicera';
$_lang['RM_other_dropdown_show'] = 'Visa/Dölj i menyn';
$_lang['RM_other_dropdown_search'] = 'Sökbar/Ej sökbar';
$_lang['RM_other_dropdown_cache'] = 'Cachebar/Ej cachebar';
$_lang['RM_other_dropdown_richtext'] = 'Richtext-/Ej Richtexteditor';
$_lang['RM_other_dropdown_delete'] = 'Ta bort/Återställ';

//-- radio button text
$_lang['RM_other_publish_radio1'] = 'Publicera'; 
$_lang['RM_other_publish_radio2'] = 'Avpublicera';
$_lang['RM_other_show_radio1'] = 'Dölj i menyn'; 
$_lang['RM_other_show_radio2'] = 'Visa i menyn';
$_lang['RM_other_search_radio1'] = 'Sökbar'; 
$_lang['RM_other_search_radio2'] = 'Ej sökbar';
$_lang['RM_other_cache_radio1'] = 'Cachebar'; 
$_lang['RM_other_cache_radio2'] = 'Ej cachebar';
$_lang['RM_other_richtext_radio1'] = 'Richtext'; 
$_lang['RM_other_richtext_radio2'] = 'Ej Richtext';
$_lang['RM_other_delete_radio1'] = 'Ta bort'; 
$_lang['RM_other_delete_radio2'] = 'Återställ';

//-- adjust dates 
$_lang['RM_adjust_dates_header'] = 'Ange dokumentdatum';
$_lang['RM_adjust_dates_desc'] = 'Alla de följande dokumentdatumen kan ändras. Använd "Visa kalender" för att ange datumen.';
$_lang['RM_view_calendar'] = 'Visa kalender';
$_lang['RM_clear_date'] = 'Radera datum';

//-- adjust authors
$_lang['RM_adjust_authors_header'] = 'Ange författare';
$_lang['RM_adjust_authors_desc'] = 'Använd rullgardinsmenyerna för att välja nya författare till dokumentet.';
$_lang['RM_adjust_authors_createdby'] = 'Skapad av:';
$_lang['RM_adjust_authors_editedby'] = 'Redigerad av:';
$_lang['RM_adjust_authors_noselection'] = 'Ingen ändring';

 //-- labels
$_lang['RM_date_pubdate'] = 'Publiceringsdatum:';
$_lang['RM_date_unpubdate'] = 'Avpubliceringsdatum:';
$_lang['RM_date_createdon'] = 'Skapad:';
$_lang['RM_date_editedon'] = 'Redigerad:';
//$_lang['RM_date_deletedon'] = 'Borttagen';

$_lang['RM_date_notset'] = ' (ej angivet)';
//deprecated
$_lang['RM_date_dateselect_label'] = 'Välj ett datum: ';

//-- document select section
$_lang['RM_select_submit'] = 'Utför';
$_lang['RM_select_range'] = 'Växla tillbaka till att specificera ett dokumentintervall';
$_lang['RM_select_range_text'] = '<p><strong>Nyckel (där n är ett dokumentID):</strong><br /><br />
							  n* - Ändra inställning på detta dokument och dess närmaste barn<br /> 
							  n** - Ändra inställning på detta dokument och ALLA dess barn<br /> 
							  n-n2 - Ändra inställning på detta intervall av dokument<br /> 
							  n - Ändra inställning på ett enstaka dokument</p> 
							  <p>Exempel: 1*, 4**, 2-20, 25 - Det här ändrar den valda inställningen
						      för dokument 1 och dess närmaste barn, dokument 4 och alla dess barn,
						      dokument 2-20 och dokument 25.</p>';
$_lang['RM_select_tree'] ='Visa dokumentträdet och välj dokument';

//-- process tree/range messages
$_lang['RM_process_noselection'] = 'Inget val har gjorts. ';
$_lang['RM_process_novalues'] = 'Inga värden har angetts.';
$_lang['RM_process_limits_error'] = 'Övre gränsen lägre än den undre gränsen:';
$_lang['RM_process_invalid_error'] = 'Ogiltligt värde:';
$_lang['RM_process_update_success'] = 'Uppdateringen har genomförts utan några fel.';
$_lang['RM_process_update_error'] = 'Uppdateringen har genomförts, men det uppstog fel:';
$_lang['RM_process_back'] = 'Tillbaka';

//-- manager access logging
$_lang['RM_log_template'] = 'Dokumenthanterare: Mallar ändrade.';
$_lang['RM_log_templatevariables'] = 'Dokumenthanterare: Mallvariabler ändrade.';
$_lang['RM_log_docpermissions'] = 'Dokumenthanterare: Dokumenträttigheter ändrade.';
$_lang['RM_log_sortmenu'] = 'Dokumenthanterare: Menyindexoperationer klara.';
$_lang['RM_log_publish'] = 'Dokumenthanterare: Dokumentinställningar för publicering/avpublicering ändrade.';
$_lang['RM_log_hidemenu'] = 'Dokumenthanterare: Inställningar för visa/dölj i menyn ändrade.';
$_lang['RM_log_search'] = 'Dokumenthanterare: Inställningar för sökbarhet ändrade.';
$_lang['RM_log_cache'] = 'Dokumenthanterare: Inställningar för cachebarhet ändrade.';
$_lang['RM_log_richtext'] = 'Dokumenthanterare: Inställningar för användning av Richtexteditor ändrade.';
$_lang['RM_log_delete'] = 'Dokumenthanterare: Inställningar för ta bort/återställ ändrade.';
$_lang['RM_log_dates'] = 'Dokumenthanterare: Datuminställningar för dokument ändrade.';
$_lang['RM_log_authors'] = 'Dokumenthanterare: Författarinställningar för dokument ändrade.';

?>