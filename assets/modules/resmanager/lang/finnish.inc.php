<?php
/**
 * Resource Manager Module - finnish.inc.php
 * 
 * Purpose: Contains the language strings for use in the module.
 * Author: doze
 * For: MODx CMS (www.modxcms.com)
 * Date:19/04/2007 Version: 1.0
 * 
 */
 
//-- FINNISH LANGUAGE FILE
 
//-- titles
$_lang['RM_module_title'] = 'Dokumenttien hallinta';
$_lang['RM_action_title'] = 'Valitse toiminto';
$_lang['RM_range_title'] = 'M&auml;&auml;rit&auml; haettavat dokumentit';
$_lang['RM_tree_title'] = 'Valitse dokumenttipuusta';
$_lang['RM_update_title'] = 'P&auml;ivitys suoritettu';
$_lang['RM_sort_title'] = 'Valikko j&auml;rjestyksen muokkaus';

//-- tabs
$_lang['RM_doc_permissions'] = 'Dokumenttien oikeudet';
$_lang['RM_template_variables'] = 'Sivustopohjamuuttujat';
$_lang['RM_sort_menu'] = 'J&auml;rjest&auml; valikon dokumentit';
$_lang['RM_change_template'] = 'Vaihda sivustopohja';
$_lang['RM_publish'] = 'Julkaise/Poista julkaisusta';
$_lang['RM_other'] = 'Muut ominaisuudet';
 
//-- buttons
$_lang['RM_close'] = 'Sulje dokumenttien hallinta';
$_lang['RM_cancel'] = 'Takaisin';
$_lang['RM_go'] = 'Suorita';
$_lang['RM_save'] = 'Tallenna';
$_lang['RM_sort_another'] = 'J&auml;rjest&auml; toinen';

//-- templates tab
$_lang['RM_tpl_desc'] = 'Valitse haluttu sivustopohja alla olevasta taulukosta ja m&auml;&auml;rit&auml; dokumenttien ID numerot, joita haluat p&auml;ivitt&auml;&auml;. M&auml;&auml;rit&auml; joko haara dokumenttien ID numeroista tai k&auml;yt&auml; dokumenttipuu valintaa alla.';
$_lang['RM_tpl_no_templates'] = 'Ei l&ouml;ytynyt yht&auml;&auml;n sivustopohjaa';
$_lang['RM_tpl_column_id'] = 'ID';
$_lang['RM_tpl_column_name'] = 'Nimi';
$_lang['RM_tpl_column_description'] ='Selite';
$_lang['RM_tpl_blank_template'] = 'Tyhj&auml; sivustopohja';

$_lang['RM_tpl_results_message']= 'K&auml;yt&auml; Takaisin painiketta, jos haluat tehd&auml; muita muutoksia. Sivuston v&auml;limuisti on tyhj&auml;tty automaattisesti.';

//-- template variables tab
$_lang['RM_tv_desc'] = 'M&auml;&auml;rit&auml; dokumenttien ID numerot, joita haluat p&auml;ivitt&auml;&auml;. M&auml;&auml;rit&auml; joko haara dokumenttien ID numeroista tai k&auml;yt&auml; dokumenttipuu valintaa alla. Valitse sitten taulukosta haluttu sivustopohja niin siihen liitetyt sivustopohjamuuttujat ladataan. Sy&ouml;t&auml; haluamasi arvot sivustopohjamuuttujille ja suorita lomake.';
$_lang['RM_tv_template_mismatch'] = 'T&auml;m&auml; dokumentti ei k&auml;yt&auml; valuttua sivustopohjaa.';
$_lang['RM_tv_doc_not_found'] = 'T&auml;t&auml; dokumenttia ei l&ouml;ytynyt tietokannasta.';
$_lang['RM_tv_no_tv'] = 'Sivustopohjalle ei l&ouml;ytynyt yht&auml;&auml;n sivustopohjamuuttujaa.';
$_lang['RM_tv_no_docs'] = 'Ei l&ouml;ytynyt yht&auml;&auml;n dokumenttia p&auml;ivitett&auml;v&auml;ksi.';
$_lang['RM_tv_no_template_selected'] = 'Sivustopohjaa ei ole valittu.';
$_lang['RM_tv_loading'] = 'Sivustopohjamuuttujia ladataan ..';
$_lang['RM_tv_ignore_tv'] = '&Auml;l&auml; huomioi n&auml;it&auml; sivustopohjamuuttujia (pilkulla eroteltu lista):';
$_lang['RM_tv_ajax_insertbutton'] = 'Sy&ouml;t&auml;';

//-- document permissions tab
$_lang['RM_doc_desc'] = 'Valitse haluamasi dokumenttiryhm&auml;t alla olevasta taulukosta sek&auml; haluatko poistaa vai lis&auml;t&auml; dokumenttiryhmi&auml;. M&auml;&auml;rit&auml; sitten dokumenttien ID numerot, joita haluat p&auml;ivitt&auml;&auml;. M&auml;&auml;rit&auml; joko haara dokumenttien ID numeroista tai k&auml;yt&auml; dokumenttipuu valintaa alla.';
$_lang['RM_doc_no_docs'] = 'Ei l&ouml;ytynyt yht&auml;&auml;n dokumenttiryhm&auml;&auml;';
$_lang['RM_doc_column_id'] = 'ID';
$_lang['RM_doc_column_name'] = 'Nimi';
$_lang['RM_doc_radio_add'] = 'Lis&auml;&auml; dokumenttiryhm&auml;';
$_lang['RM_doc_radio_remove'] = 'Poista dokumenttiryhm&auml;';

$_lang['RM_doc_skip_message1'] = 'Dokumentti ID:ll&auml;';
$_lang['RM_doc_skip_message2'] = 'kuuluu jo valittuun dokumenttiryhm&auml;&auml;n (ohitetaan)';

//-- sort menu tab
$_lang['RM_sort_pick_item'] = 'Ole hyv&auml; ja klikkaa sivuston runkoon tai kansioon P&Auml;&Auml;DOKUMENTTIPUUSSA, jota haluat j&auml;rjest&auml;&auml;.'; 
$_lang['RM_sort_updating'] = 'P&auml;ivitet&auml;&auml;n ...';
$_lang['RM_sort_updated'] = 'P&auml;ivitetty';
$_lang['RM_sort_nochildren'] = 'Kansiossa ei ole yht&auml;&auml;n dokumenttia';
$_lang['RM_sort_noid']='Ei ole valittu yht&auml;&auml;n dokumenttia. Ole hyv&auml; ja siirry takaisin sek&auml; valitse dokumentti.';

//-- other tab
$_lang['RM_other_header'] = 'Selkalaiset dokumenttien asetukset';
$_lang['RM_misc_label'] = 'K&auml;ytett&auml;viss&auml; olevat asetukset:';
$_lang['RM_misc_desc'] = 'Ole hyv&auml; ja valitse asetus pudotuslistasta sek&auml; sen j&auml;lkeen haluttu arvo. Huomioi et&auml; vain yhden asetuksen voi vaihtaa kerrallaan.';

$_lang['RM_other_dropdown_publish'] = 'Julkaise/Poista julkaisusta';
$_lang['RM_other_dropdown_show'] = 'N&auml;yt&auml; valikossa/&Auml;l&auml; n&auml;yt&auml; valikossa';
$_lang['RM_other_dropdown_search'] = 'Haettavissa/Ei haettavissa';
$_lang['RM_other_dropdown_cache'] = 'Tallentaminen v&auml;limuistiin sallittu/Tallentaminen v&auml;limuistiin ei sallittu';
$_lang['RM_other_dropdown_richtext'] = 'Tekstieditori/Ei tekstieditoria';
$_lang['RM_other_dropdown_delete'] = 'Poista/Peruuta poistaminen';

//-- radio button text
$_lang['RM_other_publish_radio1'] = 'Julkaise'; 
$_lang['RM_other_publish_radio2'] = 'Poista julkaisusta';
$_lang['RM_other_show_radio1'] = '&Auml;l&auml; n&auml;yt&auml; valikossa'; 
$_lang['RM_other_show_radio2'] = 'N&auml;yt&auml; valikossa';
$_lang['RM_other_search_radio1'] = 'Haettavissa'; 
$_lang['RM_other_search_radio2'] = 'Ei haettavissa';
$_lang['RM_other_cache_radio1'] = 'Tallentaminen v&auml;limuistiin sallittu'; 
$_lang['RM_other_cache_radio2'] = 'Tallentaminen v&auml;limuistiin ei sallittu';
$_lang['RM_other_richtext_radio1'] = 'Tekstieditori'; 
$_lang['RM_other_richtext_radio2'] = 'Ei tekstieditoria';
$_lang['RM_other_delete_radio1'] = 'Poista'; 
$_lang['RM_other_delete_radio2'] = 'Peruuta poistaminen';

//-- adjust dates 
$_lang['RM_adjust_dates_header'] = 'Aseta dokumenttien p&auml;iv&auml;m&auml;&auml;r&auml;t';
$_lang['RM_adjust_dates_desc'] = 'Seuraavat dokumenttien p&auml;iv&auml;m&auml;&auml;r&auml;t voidaan vaihtaa. K&auml;yt&auml; "N&auml;yt&auml; kalenteri" toimintoa asettaaksesi p&auml;iv&auml;m&auml;&auml;r&auml;t.';
$_lang['RM_view_calendar'] = 'N&auml;yt&auml; kalenteri';
$_lang['RM_clear_date'] = 'Poista p&auml;iv&auml;m&auml;&auml;r&auml;';

//-- adjust authors
$_lang['RM_adjust_authors_header'] = 'Aseta henkil&ouml;tiedot';
$_lang['RM_adjust_authors_desc'] = 'K&auml;yt&auml; pudotuslistaa asettaaksesi uudet henkil&ouml;tiedot dokumentille.';
$_lang['RM_adjust_authors_createdby'] = 'Luonut:';
$_lang['RM_adjust_authors_editedby'] = 'Muokannut:';
$_lang['RM_adjust_authors_noselection'] = 'Ei valintaa';

 //-- labels
$_lang['RM_date_pubdate'] = 'Julkaisu p&auml;iv&auml;m&auml;&auml;r&auml;:';
$_lang['RM_date_unpubdate'] = 'Julkasun p&auml;&auml;ttymisp&auml;iv&auml;m&auml;&auml;r&auml;:';
$_lang['RM_date_createdon'] = 'Luotu p&auml;iv&auml;m&auml;&auml;r&auml;:';
$_lang['RM_date_editedon'] = 'Muokattu p&auml;iv&auml;m&auml;&auml;r&auml;:';
//$_lang['RM_date_deletedon'] = 'Deleted On Date';

$_lang['RM_date_notset'] = ' (ei asetettu)';
//deprecated
$_lang['RM_date_dateselect_label'] = 'Valitse p&auml;iv&auml;m&auml;&auml;r&auml;: ';

//-- document select section
$_lang['RM_select_submit'] = 'L&auml;het&auml;';
$_lang['RM_select_range'] = 'Vaihda takaisin dokumenttien ID haaran m&auml;&auml;ritykseen';
$_lang['RM_select_range_text'] = '<p><strong>Avain (jossa n on dokumentin ID numero):</strong><br /><br />
							  n* - P&auml;ivit&auml; muutos t&auml;h&auml;n dokumenttiin sek&auml; sen v&auml;litt&ouml;miin aladokumentteihin<br /> 
							  n** - P&auml;ivit&auml; muutos t&auml;h&auml;n dokumenttiin ja kaikkiin sen aladokumentteihin<br /> 
							  n-n2 - P&auml;ivit&auml; muutos n&auml;iden dokumenttien v&auml;lill&auml;<br /> 
							  n - P&auml;ivit&auml; muutos yksitt&auml;iseen dokumenttiin</p> 
							  <p>Esimerkki: 1*,4**,2-20,25 - T&auml;m&auml; p&auml;ivitt&auml;&auml; muutoksen dokumenttiin 1 ja sen aladokumentteihin, dokumenttiin 4 ja sen kaikkiin aladokumentteihin, dokumentteihin joiden ID numero on 2-20, sek&auml; dokumenttiin jonka ID numero on 25.</p>';
$_lang['RM_select_tree'] ='Valitse dokumentit k&auml;ytt&auml;en dokumenttipuuta';

//-- process tree/range messages
$_lang['RM_process_noselection'] = 'Valintaa ei tehty. ';
$_lang['RM_process_novalues'] = 'Arvoja ei ole m&auml;&auml;ritetty.';
$_lang['RM_process_limits_error'] = 'Yl&auml;arvo v&auml;hemm&auml;n kuin ala-arvo:';
$_lang['RM_process_invalid_error'] = 'Virheellinen arvo:';
$_lang['RM_process_update_success'] = 'P&auml;ivitys suoritettu onnistuneesti.';
$_lang['RM_process_update_error'] = 'P&auml;ivitys suoritettu, mutta havaittiin seuraavat virheet:';
$_lang['RM_process_back'] = 'Takaisin';

//-- manager access logging
$_lang['RM_log_template'] = 'Dokumenttien hallinta moduuli: Sivustopohja vaihdettu.';
$_lang['RM_log_templatevariables'] = 'Dokumenttien hallinta moduuli: Sivustopohjamuuttujat muutettu.';
$_lang['RM_log_docpermissions'] ='Dokumenttien hallinta moduuli: Dokumenttien oikeudet muutettu.';
$_lang['RM_log_sortmenu']='Dokumenttien hallinta moduuli: Valikon j&auml;rjestysoperaatio suoritettu.';
$_lang['RM_log_publish']='Dokumenttien hallinta moduuli: Dokumenttien julkaisuasetuksia muutettu.';
$_lang['RM_log_hidemenu']='Dokumenttien hallinta moduuli: Dokumenttien valikon n&auml;kyvyysasetuksia muutettu.';
$_lang['RM_log_search']='Dokumenttien hallinta moduuli: Dokumenttien hakuasetuksia muutettu.';
$_lang['RM_log_cache']='Dokumenttien hallinta moduuli: Dokumenttien v&auml;limuistiasetuksia muutettu.';
$_lang['RM_log_richtext']='Dokumenttien hallinta moduuli: Dokumenttien tekstieditoriasetuksia muutettu.';
$_lang['RM_log_delete']='Dokumenttien hallinta moduuli: Dokumenttien poistoasetuksia muutettu.';
$_lang['RM_log_dates']='Dokumenttien hallinta moduuli: Dokumenttien p&auml;iv&auml;m&auml;&auml;ri&auml; muutettu.';
$_lang['RM_log_authors']='Dokumenttien hallinta moduuli: Dokumenttien henkil&ouml;tietoja muutettu.';

?>
