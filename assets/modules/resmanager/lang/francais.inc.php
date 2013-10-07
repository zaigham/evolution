<?php
/**
 * Resource Manager Module - francais.inc.php
 * 
 * Purpose: Contains the language strings for use in the module.
 * Author: Garry Nutting   Traduction : David Mollière
 * For: MODx CMS (www.modxcms.com)
 * Date:29/09/2006 Version: 1.6
 * 
 */
 
//-- ENGLISH LANGUAGE FILE
 
//-- titles
$_lang['RM_module_title'] = 'ResManager';
$_lang['RM_action_title'] = 'Selectionnez une opération';
$_lang['RM_range_title'] = 'Spécifiez une plage d\'ID';
$_lang['RM_tree_title'] = 'Selectionnez les documents dans l\'arbre';
$_lang['RM_update_title'] = 'Mise à jour effectuée';
$_lang['RM_sort_title'] = 'Editeur d\'index de Menu';

//-- tabs
$_lang['RM_doc_permissions'] = 'Permissions des documents';
$_lang['RM_template_variables'] = 'Variables de modèle';
$_lang['RM_sort_menu'] = 'Trier les items de menu';
$_lang['RM_change_template'] = 'Modifier le modèle';
$_lang['RM_publish'] = 'Publier/Dépublier';
$_lang['RM_other'] = 'Autres propriétés';
 
//-- buttons
$_lang['RM_close'] = 'Fermer ResManager';
$_lang['RM_cancel'] = 'Retour';
$_lang['RM_go'] = 'Exécuter';
$_lang['RM_save'] = 'Sauvegarder';
$_lang['RM_sort_another'] = 'Trier un autre';

//-- templates tab
$_lang['RM_tpl_desc'] = 'Choisissez le modèle à partir de la liste ci-dessous et spécifiez les ID de documents qui doivent être modifiés. Vous pouvez spécifier soit une plage d\'ID, soit en utilisant l\'arbre des documents.';
$_lang['RM_tpl_no_templates'] = 'Modèle introuvable';
$_lang['RM_tpl_column_id'] = 'ID';
$_lang['RM_tpl_column_name'] = 'Nom';
$_lang['RM_tpl_column_description'] ='Description';
$_lang['RM_tpl_blank_template'] = 'Modèle vide (_blank)';

$_lang['RM_tpl_results_message']= 'Utilisez le bouton "Retour" si vous souhaitez faire d\'autres modifications. Le cache du site a été automatiquement vidé.';

//-- template variables tab
$_lang['RM_tv_desc'] = 'Précisez l\'ID du(des) document(s) qui doit(doivent) être modifié(s), soit en spécifiant une plage d\'ID ou via l\'arbre des document, puis choisissez le modèle dans la liste (les variables de modèle associées seront chargées). Saisissez les variables de modèles souhaitées puis validez.';
$_lang['RM_tv_template_mismatch'] = 'Ce document n\'utilise pas le modèle sélectionné.';
$_lang['RM_tv_doc_not_found'] = 'Ce document n\'est pas dans la base de données.';
$_lang['RM_tv_no_tv'] = 'Pas de variable de modèle pour ce modèle.';
$_lang['RM_tv_no_docs'] = 'Aucun document sélectionné pour la mise à jour.';
$_lang['RM_tv_no_template_selected'] = 'Pas de modèle sélectionné.';
$_lang['RM_tv_loading'] = 'Variables de modèle en cours de chargement...';
$_lang['RM_tv_ignore_tv'] = 'Ignorer ces variables de modèle (liste séparée par des virgules):';
$_lang['RM_tv_ajax_insertbutton'] = 'Insérer';

//-- document permissions tab
$_lang['RM_doc_desc'] = 'Choisir le groupe de document à partir de la liste ci-dessous et si celuci doit être ajouté ou supprimer du groupe. Ensuite, précisez l\'ID des documents qui doivent être modifiées. Vous pouvez spécifier soit une plage d\'ID, soit en utilisant l\'arbre des documents.';
$_lang['RM_doc_no_docs'] = 'Ce groupe de document n\'existe pas.';
$_lang['RM_doc_column_id'] = 'ID';
$_lang['RM_doc_column_name'] = 'Nom';
$_lang['RM_doc_radio_add'] = 'Ajouter un groupe de documents';
$_lang['RM_doc_radio_remove'] = 'Supprimer un groupe de documents';

$_lang['RM_doc_skip_message1'] = 'Le document dont l\'ID est';
$_lang['RM_doc_skip_message2'] = 'fait déjà partie du groupe de document sélectionné (non pris en compte)';

//-- sort menu tab
$_lang['RM_sort_pick_item'] = 'Merci de cliquer sur l\'item de l\'arborescence du document que vous souhaitez trier.'; 
$_lang['RM_sort_updating'] = 'Mise à jour ...';
$_lang['RM_sort_updated'] = 'Mis à jour.';
$_lang['RM_sort_nochildren'] = 'Ce parent n\'a aucun enfant';
$_lang['RM_sort_noid']='Aucun document selectionné. Merci de revenir en arrière et de sélectionner un document.';

//-- other tab
$_lang['RM_other_header'] = 'Réglages divers de document';
$_lang['RM_misc_label'] = 'Réglages disponibles:';
$_lang['RM_misc_desc'] = 'Merci de choisir un item du menu déroulant ainsi que l\'option requise. Un seul item peut être modifié à la fois.';

$_lang['RM_other_dropdown_publish'] = 'Publier/Dépublier';
$_lang['RM_other_dropdown_show'] = 'Montrer/Masquer dans le menu';
$_lang['RM_other_dropdown_search'] = 'Recherchable/Non recherchable';
$_lang['RM_other_dropdown_cache'] = 'A mettre en cache/A ne pas mettre en cache';
$_lang['RM_other_dropdown_richtext'] = 'Editeur/Sans Editeur';
$_lang['RM_other_dropdown_delete'] = 'Effacer/Restaurer';

//-- radio button text
$_lang['RM_other_publish_radio1'] = 'Publier'; 
$_lang['RM_other_publish_radio2'] = 'Dépublier';
$_lang['RM_other_show_radio1'] = 'Masquer dans le menu'; 
$_lang['RM_other_show_radio2'] = 'Afficher dans le menu';
$_lang['RM_other_search_radio1'] = 'Recherchable'; 
$_lang['RM_other_search_radio2'] = 'Non recherchable';
$_lang['RM_other_cache_radio1'] = 'A mettre en cache'; 
$_lang['RM_other_cache_radio2'] = 'A ne pas mettre en cache';
$_lang['RM_other_richtext_radio1'] = 'Editeur WYSIWYG'; 
$_lang['RM_other_richtext_radio2'] = 'Pas d\'éditeur WYSIWYG';
$_lang['RM_other_delete_radio1'] = 'Effacer'; 
$_lang['RM_other_delete_radio2'] = 'Restaurer';

//-- adjust dates 
$_lang['RM_adjust_dates_header'] = 'Définir les dates des documents';
$_lang['RM_adjust_dates_desc'] = 'N\'importe lequel des option de date peuvent être modifiés. Utiliser "Voir le calendrier" pour définir les dates.';
$_lang['RM_view_calendar'] = 'Voir le calendrier';
$_lang['RM_clear_date'] = 'Remettre les dates à zéro';

//-- adjust authors
$_lang['RM_adjust_authors_header'] = 'Redéfinir les auteurs';
$_lang['RM_adjust_authors_desc'] = 'Utiliser la liste déroulante pour définir le nouvel auteur du document.';
$_lang['RM_adjust_authors_createdby'] = 'Créé par:';
$_lang['RM_adjust_authors_editedby'] = 'Edité par:';
$_lang['RM_adjust_authors_noselection'] = 'Aucune modification';

 //-- labels
$_lang['RM_date_pubdate'] = 'Date de publication:';
$_lang['RM_date_unpubdate'] = 'Date de dépublication:';
$_lang['RM_date_createdon'] = 'Date de création:';
$_lang['RM_date_editedon'] = 'Date de modification:';
//$_lang['RM_date_deletedon'] = 'Deleted On Date';

$_lang['RM_date_notset'] = ' (indéfini)';
//deprecated
$_lang['RM_date_dateselect_label'] = 'Sélectionner une date: ';

//-- document select section
$_lang['RM_select_submit'] = 'Envoi';
$_lang['RM_select_range'] = 'Revenir à la définition de la plage de document';
$_lang['RM_select_range_text'] = '<p><strong>Clé (ou n est une ID de document):</strong><br /><br />
							  n* - Modifier le réglage pour ce document et ses enfants immédiats<br /> 
							  n** - Modifier le réglage pour ce document et tous ses enfants<br /> 
							  n-n2 - Modifier le réglage pour cette plage de documents<br /> 
							  n - Modifier le réglage pour un document</p> 
							  <p>Exemple: 1*,4**,2-20,25 - Cela modifiera le réglage sélectionné pour le document 1 et ses enfants, le document 4 et tous ses enfants, et les documents 2 à 20, ainsi que le document 25</p>';
$_lang['RM_select_tree'] ='Afficher et sélectionner les documents en utilisant l\'Arbre des documents';

//-- process tree/range messages
$_lang['RM_process_noselection'] = 'Aucune sélection effectuée. ';
$_lang['RM_process_novalues'] = 'Aucune valeur définie.';
$_lang['RM_process_limits_error'] = 'Limite supérieure plus petite que la limite inférieure:';
$_lang['RM_process_invalid_error'] = 'Valeur incorrecte:';
$_lang['RM_process_update_success'] = 'La mise à jour s\'est correctement déroulée, sans erreurs.';
$_lang['RM_process_update_error'] = 'La mise à jour a été effectuée mais a généré des erreurs:';
$_lang['RM_process_back'] = 'Retour';

//-- manager access logging
$_lang['RM_log_template'] = 'Resource Manager: Modèle(s) modifié(s).';
$_lang['RM_log_templatevariables'] = 'Resource Manager: Variable(s) de modèle modifiée(s).';
$_lang['RM_log_docpermissions'] ='Resource Manager: Permission(s) du(des) document(s) modidifiée(s).';
$_lang['RM_log_sortmenu']='Resource Manager: Modification de l\'index de menu effectuée.';
$_lang['RM_log_publish']='Resource Manager: Réglages de publication/dépublication modifiés.';
$_lang['RM_log_hidemenu']='Resource Manager: Option(s) de masquage/affichage du(des) document(s) dans le menu modifiée(s).';
$_lang['RM_log_search']='Resource Manager:Option(s) de recherche du(des) document(s) dans le menu modifiée(s).';
$_lang['RM_log_cache']='Resource Manager: Option(s) de cache du(des) document(s) dans le menu modifiée(s)..';
$_lang['RM_log_richtext']='Resource Manager: Option(s) d\'édition du(des) document(s) dans le menu modifiée(s)..';
$_lang['RM_log_delete']='Resource Manager: Option(s) d\'effacement/de restauration du(des) document(s) dans le menu modifiée(s).';
$_lang['RM_log_dates']='Resource Manager: Date(s) de création/édition du(des) document(s) modifiée(s).';
$_lang['RM_log_authors']='Resource Manager: Auteur du(des) document(s) modifié(s).';

?>
