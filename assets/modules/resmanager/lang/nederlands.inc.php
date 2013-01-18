<?php

/*
* Resource Manager Module - nederlands.inc.php
* 
* Purpose: Contains the language strings for use in the module.
* Author: Garry Nutting
* For: MODx CMS (www.modxcms.com)
* Date:29/09/2006 Version: 1.6
* 
*/
 
//-- DUTCH LANGUAGE FILE
//-- titles
$_lang['RM_module_title'] = 'Resource Manager';
$_lang['RM_action_title'] = 'Kies een handeling';
$_lang['RM_range_title'] = 'Geef een bereik van Document ID\'s aan';
$_lang['RM_tree_title'] = 'Kies documenten uit de boomstructuur';
$_lang['RM_update_title'] = 'Update voltooid';
$_lang['RM_sort_title'] = 'Menu-index Editor';
//-- tabs
$_lang['RM_doc_permissions'] = 'Document rechten';
$_lang['RM_template_variables'] = 'Template Variabelen';
$_lang['RM_sort_menu'] = 'Sorteer menu-items';
$_lang['RM_change_template'] = 'wijzig template';
$_lang['RM_publish'] = 'Publiceren/Niet publiceren';
$_lang['RM_other'] = 'Andere eigenschappen';
//-- buttons
$_lang['RM_close'] = 'Sluit Resource Manager';
$_lang['RM_cancel'] = 'Terug';
$_lang['RM_go'] = 'Start';
$_lang['RM_save'] = 'Opslaan';
$_lang['RM_sort_another'] = 'Andere sorteren';
//-- templates tab
$_lang['RM_tpl_desc'] = 'Kies de gewenste template uit de tabel hieronder en geef vervolgens de document ID\'s aan die gewijzigd moeten worden. Dit kan door een bereik van ID\'s aan te geven of de structuur optie hieronder te gebruiken.';
$_lang['RM_tpl_no_templates'] = 'Geen templates gevonden';
$_lang['RM_tpl_column_id'] = 'ID';
$_lang['RM_tpl_column_name'] = 'Naam';
$_lang['RM_tpl_column_description'] ='Omschrijving';
$_lang['RM_tpl_blank_template'] = 'Blanco template';
$_lang['RM_tpl_results_message']= 'Gebruik de knop \'Terug]\ als u nog meer wilt wijzigen. De site cache is automatisch gewist.';
//-- template variables tab
$_lang['RM_tv_desc'] = 'Geef de  document ID\'s aan die gewijzigd dienen te worden. Dit kan door een bereik van ID\'s aan te geven of de structuur optie hieronder te gebruiken. Kies vervolgens de gewenste template uit de tabel en de geassocieerde Template Variabelen worden geladen. Kies de door u gewenste Template Variabele waarden en verzend voor verwerking.';
$_lang['RM_tv_template_mismatch'] = 'Dit document gebruikt de gekozen template niet.';
$_lang['RM_tv_doc_not_found'] = 'Dit document is niet in het bestand gevonden.';
$_lang['RM_tv_no_tv'] = 'Geen Template Variabelen gevonden voor de template.';
$_lang['RM_tv_no_docs'] = 'Geen documenten geselecteerd om bij te werken.';
$_lang['RM_tv_no_template_selected'] = 'Er is geen template geselecteerd.';
$_lang['RM_tv_loading'] = 'Template Variabele worden geladen ...';
$_lang['RM_tv_ignore_tv'] = 'Negeer deze Template Variabelen (door komma\'s gescheiden waarden):';
$_lang['RM_tv_ajax_insertbutton'] = 'Invoegen';
//-- document permissions tab
$_lang['RM_doc_desc'] = 'Kies de gewenste documentgroep uit de tabel hieronder en voeg of verwijder de groep naar wens. Specificeer vervolgens de document ID\'s die gewijzigd moeten worden. Dit kan door een bereik van ID\'s aan te geven of de structuur optie hieronder te gebruiken.';
$_lang['RM_doc_no_docs'] = 'Geen documentgroepen gevonden';
$_lang['RM_doc_column_id'] = 'ID';
$_lang['RM_doc_column_name'] = 'Naam';
$_lang['RM_doc_radio_add'] = 'Documentgroep toevoegen';
$_lang['RM_doc_radio_remove'] = 'Documentgroep verwijderen';
$_lang['RM_doc_skip_message1'] = 'Document met ID';
$_lang['RM_doc_skip_message2'] = 'is al onderdeel van de geselecteerde documentgroep (wordt overgeslagen)';
//-- sort menu tab
$_lang['RM_sort_pick_item'] = 'Klik a.u.b. op de site root of het ouder-document van de \'MAIN DOCUMENT\' structuur die u wilt sorteren.'; 
$_lang['RM_sort_updating'] = 'Bijwerken ...';
$_lang['RM_sort_updated'] = 'Bijgewerkt';
$_lang['RM_sort_nochildren'] = 'Ouder heeft geen kinderen';
$_lang['RM_sort_noid']='Er is geen document geselecteerd. Ga a.u.b. terug en selecteer een document.';
//-- other tab
$_lang['RM_other_header'] = 'Diverse document instellingen';
$_lang['RM_misc_label'] = 'Beschikbare instellingen:';
$_lang['RM_misc_desc'] = 'Kies a.u.b. een instelling van het dropdown menu en dan de gewenste optie. NB: per keer kan slechts &#233;&#233;n instelling tegelijk gewijzigd worden.';
$_lang['RM_other_dropdown_publish'] = 'Publiceren/Niet publiceren';
$_lang['RM_other_dropdown_show'] = 'Toon/Verberg in menu';
$_lang['RM_other_dropdown_search'] = 'Doorzoekbaar/Niet doorzoekbaar';
$_lang['RM_other_dropdown_cache'] = 'Cachebaar/Niet cachebaar';
$_lang['RM_other_dropdown_richtext'] = 'Richtext/Geen richtext editor';
$_lang['RM_other_dropdown_delete'] = 'Verwijderen/Herstellen';
//-- radio button text
$_lang['RM_other_publish_radio1'] = 'Publiceren'; 
$_lang['RM_other_publish_radio2'] = 'Niet publiceren';
$_lang['RM_other_show_radio1'] = 'Verberg in menu'; 
$_lang['RM_other_show_radio2'] = 'Toon in menu';
$_lang['RM_other_search_radio1'] = 'Doorzoekbaar'; 
$_lang['RM_other_search_radio2'] = 'Niet doorzoekbaar';
$_lang['RM_other_cache_radio1'] = 'Cachebaar'; 
$_lang['RM_other_cache_radio2'] = 'Niet cachebaar';
$_lang['RM_other_richtext_radio1'] = 'Richtext'; 
$_lang['RM_other_richtext_radio2'] = 'Geen Richtext';
$_lang['RM_other_delete_radio1'] = 'Verwijderen'; 
$_lang['RM_other_delete_radio2'] = 'Herstellen';
//-- adjust dates 
$_lang['RM_adjust_dates_header'] = 'Document datums instellen';
$_lang['RM_adjust_dates_desc'] = 'Elke van de volgende document datuminstellingen kan gewijzigd worden. Gebruik de \'Toon kalender\' optie om de datums in te stellen.';
$_lang['RM_view_calendar'] = 'Toon kalender';
$_lang['RM_clear_date'] = 'Wis datum';
//-- adjust authors
$_lang['RM_adjust_authors_header'] = 'Auteurs instellen';
$_lang['RM_adjust_authors_desc'] = 'Gebruik de dropdown lijsten om nieuwe auteurs voor het document in te stellen.';
$_lang['RM_adjust_authors_createdby'] = 'Gemaakt door:';
$_lang['RM_adjust_authors_editedby'] = 'Gewijzigd door:';
$_lang['RM_adjust_authors_noselection'] = 'Ongewijzigd';
//-- labels
$_lang['RM_date_pubdate'] = 'Datum publiceren:';
$_lang['RM_date_unpubdate'] = 'Datum niet publiceren:';
$_lang['RM_date_createdon'] = 'Datum gemaakt:';
$_lang['RM_date_editedon'] = 'Datum gewijzigd:';
//$_lang['RM_date_deletedon'] = 'Datum verwijderd';
$_lang['RM_date_notset'] = ' (niet ingesteld)';
//deprecated
$_lang['RM_date_dateselect_label'] = 'Kies een datum: ';
//-- document select section
$_lang['RM_select_submit'] = 'Verzenden';
$_lang['RM_select_range'] = 'Ga terug om een bereik van document ID\'s aan te geven';
$_lang['RM_select_range_text'] = '<p><strong>Toets (waarbij n een document ID nummer is):</strong><br /><br />
							  n* - Wijzig de instelling voor dit document en direkte kinderen<br /> 
							  n** - Wijzig de instelling voor dit document en ALLE kinderen<br /> 
							  n-n2 - Wijzig de instelling voor dit bereik van documenten<br /> 
							  n - Wijzig de instelling voor een enkel document</p> 
							  <p>Voorbeeld: 1*,4**,2-20,25 - Dit zal de geselecteerde instelling wijzigen
						      voor documenten 1 en direkte kinderen, document 4 en alle kinderen, documenten
						      2 t/m 20 en document 25.</p>';
$_lang['RM_select_tree'] ='Bekijk en selecteer documenten door de structuur te gebruiken';
//-- process tree/range messages
$_lang['RM_process_noselection'] = 'Er is geen selectie gemaakt. ';
$_lang['RM_process_novalues'] = 'Er zijn geen waardes aangegeven.';
$_lang['RM_process_limits_error'] = 'Hoogste waarde lager dan laagste waarde:';
$_lang['RM_process_invalid_error'] = 'Ongeldige waarde:';
$_lang['RM_process_update_success'] = 'Bijwerken succesvol voltooid, zonder fouten.';
$_lang['RM_process_update_error'] = 'Bijwerken voltooid, maar met de volgende fouten:';
$_lang['RM_process_back'] = 'Terug';
//-- manager access logging
$_lang['RM_log_template'] = 'Resource Manager: Templates gewijzigd.';
$_lang['RM_log_templatevariables'] = 'Resource Manager: Template Variabelen gewijzigd.';
$_lang['RM_log_docpermissions'] ='Resource Manager: Document rechten gewijzigd.';
$_lang['RM_log_sortmenu']='Resource Manager: Menu-index bewerking voltooid.';
$_lang['RM_log_publish']='Resource Manager: Resource Manager: Documentinstellingen Publiceren/Niet publiceren gewijzigd.';
$_lang['RM_log_hidemenu']='Resource Manager: Documentinstellingen Tonen/Vverbergen gewijzigd.';
$_lang['RM_log_search']='Resource Manager: Documentinstellingen Doorzoekbaar/Niet doorzoekbaar gewijzigd.';
$_lang['RM_log_cache']='Resource Manager: Documentinstellingen Cachebaar/Niet cachebaar gewijzigd.';
$_lang['RM_log_richtext']='Resource Manager: Documents Use Richtext Editor settings changed.';
$_lang['RM_log_delete']='Resource Manager: Documentinstellingen Verwijderen/Herstellen gewijzigd.';
$_lang['RM_log_dates']='Resource Manager: Documentinstellingen Datum gewijzigd.';
$_lang['RM_log_authors']='Resource Manager: Documentinstellingen Auteur gewijzigd.';

?>
