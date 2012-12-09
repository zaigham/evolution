<?php
/**
 * Resource Manager Module - francais.inc.php
 * 
 * Purpose: Contains the language strings for use in the module.
 * Author: Garry Nutting   Traduction: David Mollière Correction: Jean-Christophe Brebion
 * For: MODx CMS (www.modxcms.com)
 * Date:29/09/2006 Version: 1.6  Correction: 28/07/09
 * 
 */
 
//-- FRENCH LANGUAGE FILE
 
//-- titles
$_lang['RM_module_title'] = 'Res Manager';
$_lang['RM_action_title'] = 'Sélectionnez une opération';
$_lang['RM_range_title'] = 'Spécifiez une plage d\'ID';
$_lang['RM_tree_title'] = 'Sélectionnez les Ressources dans l\'Arbre du Site';
$_lang['RM_update_title'] = 'Mise à jour effectuée';
$_lang['RM_sort_title'] = 'Éditeur d\'index de menu';

//-- tabs
$_lang['RM_doc_permissions'] = 'Permissions des Ressources';
$_lang['RM_template_variables'] = 'Variables de Modèle';
$_lang['RM_sort_menu'] = 'Trier les index de menu';
$_lang['RM_change_template'] = 'Modifier le Modèle';
$_lang['RM_publish'] = 'Publier/Dépublier';
$_lang['RM_other'] = 'Autres propriétés';
 
//-- buttons
$_lang['RM_close'] = 'Fermer Res Manager';
$_lang['RM_cancel'] = 'Retour';
$_lang['RM_go'] = 'Exécuter';
$_lang['RM_save'] = 'Sauvegarder';
$_lang['RM_sort_another'] = 'Trier un autre';

//-- templates tab
$_lang['RM_tpl_desc'] = 'Choisissez le Modèle à partir de la liste ci-dessous et spécifiez les ID des Ressources qui doivent être modifiées. Pour ce faire, vous pouvez spécifier une plage d\'ID ou utiliser directement l\'Arbre du Site.';
$_lang['RM_tpl_no_templates'] = 'Modèle introuvable';
$_lang['RM_tpl_column_id'] = 'ID';
$_lang['RM_tpl_column_name'] = 'Nom';
$_lang['RM_tpl_column_description'] ='Description';
$_lang['RM_tpl_blank_template'] = 'Modèle vide (_blank)';

$_lang['RM_tpl_results_message']= 'Utilisez le bouton «Retour» si vous souhaitez faire d\'autres modifications. Le cache du site a été vidé automatiquement.';

//-- template variables tab
$_lang['RM_tv_desc'] = 'Précisez l\'ID de la(des) Ressource(s) qui doit(doivent) être modifiée(s), soit en spécifiant une plage d\'ID ou via l\'Arbre du Site, puis choisissez le Modèle dans la liste (les Variables de Modèle associées seront chargées). Saisissez les Variables de Modèles souhaitées puis validez.';
$_lang['RM_tv_template_mismatch'] = 'Cette Ressource n\'utilise pas le Modèle sélectionné.';
$_lang['RM_tv_doc_not_found'] = 'Cette Ressource n\'est pas dans la base de données.';
$_lang['RM_tv_no_tv'] = 'Pas de Variable de Modèle pour ce Modèle.';
$_lang['RM_tv_no_docs'] = 'Aucune Ressource sélectionnée pour la mise à jour.';
$_lang['RM_tv_no_template_selected'] = 'Pas de Modèle sélectionné.';
$_lang['RM_tv_loading'] = 'Variables de Modèle en cours de chargement...';
$_lang['RM_tv_ignore_tv'] = 'Ignorer ces Variables de Modèle (liste séparée par des virgules):';
$_lang['RM_tv_ajax_insertbutton'] = 'Insérer';

//-- document permissions tab
$_lang['RM_doc_desc'] = 'Choisir le Groupe de Ressources à partir de la liste ci-dessous et préciser si celui-ci doit être ajouté ou supprimé du groupe. Ensuite, précisez les ID des Ressources qui doivent être modifiées. Vous pouvez soit spécifier une plage d\'ID, soit utiliser l\'Arbre du Site.';
$_lang['RM_doc_no_docs'] = 'Ce Groupe de Ressources n\'existe pas.';
$_lang['RM_doc_column_id'] = 'ID';
$_lang['RM_doc_column_name'] = 'Nom';
$_lang['RM_doc_radio_add'] = 'Ajouter un Groupe de Ressources';
$_lang['RM_doc_radio_remove'] = 'Supprimer un Groupe de Ressources';

$_lang['RM_doc_skip_message1'] = 'La Ressource dont l\'ID est';
$_lang['RM_doc_skip_message2'] = 'fait déjà partie du Groupe de Ressources sélectionné (non pris en compte)';

//-- sort menu tab
$_lang['RM_sort_pick_item'] = 'Veuillez cliquer, dans l\'Arbre du Site, sur la racine du site ou sur la Ressource parente que vous souhaitez trier.'; 
$_lang['RM_sort_updating'] = 'Mise à jour ...';
$_lang['RM_sort_updated'] = 'Mise à jour effectuée.';
$_lang['RM_sort_nochildren'] = 'Cette Ressource parente n\'a aucun enfant';
$_lang['RM_sort_noid']='Aucune Ressource sélectionnée. Merci de revenir en arrière et de sélectionner une Ressource.';

//-- other tab
$_lang['RM_other_header'] = 'Réglages divers de Ressources';
$_lang['RM_misc_label'] = 'Réglages disponibles:';
$_lang['RM_misc_desc'] = 'Veuillez sélectionner un paramètre dans le menu déroulant, ainsi que l\'option requise. Vous ne pouvez modifier qu\'un seul paramètre à la fois.';

$_lang['RM_other_dropdown_publish'] = 'Publier/Dépublier';
$_lang['RM_other_dropdown_show'] = 'Montrer/Masquer dans le menu';
$_lang['RM_other_dropdown_search'] = 'Recherchable/Non recherchable';
$_lang['RM_other_dropdown_cache'] = 'À mettre en cache/À ne pas mettre en cache';
$_lang['RM_other_dropdown_richtext'] = 'Éditeur/Sans éditeur';
$_lang['RM_other_dropdown_delete'] = 'Effacer/Restaurer';

//-- radio button text
$_lang['RM_other_publish_radio1'] = 'Publier'; 
$_lang['RM_other_publish_radio2'] = 'Dépublier';
$_lang['RM_other_show_radio1'] = 'Masquer dans le menu'; 
$_lang['RM_other_show_radio2'] = 'Afficher dans le menu';
$_lang['RM_other_search_radio1'] = 'Recherchable'; 
$_lang['RM_other_search_radio2'] = 'Non recherchable';
$_lang['RM_other_cache_radio1'] = 'À mettre en cache'; 
$_lang['RM_other_cache_radio2'] = 'À ne pas mettre en cache';
$_lang['RM_other_richtext_radio1'] = 'Éditeur WYSIWYG'; 
$_lang['RM_other_richtext_radio2'] = 'Pas d\'éditeur WYSIWYG';
$_lang['RM_other_delete_radio1'] = 'Effacer'; 
$_lang['RM_other_delete_radio2'] = 'Restaurer';

//-- adjust dates 
$_lang['RM_adjust_dates_header'] = 'Définir les dates des Ressources';
$_lang['RM_adjust_dates_desc'] = 'Toutes les options de date peuvent être modifiées. Utilisez «Voir le calendrier» pour définir les dates.';
$_lang['RM_view_calendar'] = 'Voir le calendrier';
$_lang['RM_clear_date'] = 'Remettre les dates à zéro';

//-- adjust authors
$_lang['RM_adjust_authors_header'] = 'Redéfinir les auteurs';
$_lang['RM_adjust_authors_desc'] = 'Utilisez la liste déroulante pour définir le nouvel auteur da la Ressource.';
$_lang['RM_adjust_authors_createdby'] = 'Créé par:';
$_lang['RM_adjust_authors_editedby'] = 'Édité par:';
$_lang['RM_adjust_authors_noselection'] = 'Aucune modification';

 //-- labels
$_lang['RM_date_pubdate'] = 'Date de publication:';
$_lang['RM_date_unpubdate'] = 'Date de dépublication:';
$_lang['RM_date_createdon'] = 'Date de création:';
$_lang['RM_date_editedon'] = 'Date de modification:';
//$_lang['RM_date_deletedon'] = 'Deleted On Date';

$_lang['RM_date_notset'] = ' (indéfini)';
//deprecated
$_lang['RM_date_dateselect_label'] = 'Sélectionnez une date: ';

//-- document select section
$_lang['RM_select_submit'] = 'Envoi';
$_lang['RM_select_range'] = 'Revenir à la sélection de la plage de Ressources';
$_lang['RM_select_range_text'] = '<p><strong>Clé (ou «n» est un ID de Ressource):</strong><br /><br />
							  n* - Modifier le réglage pour cette Ressource et ses enfants immédiats<br /> 
							  n** - Modifier le réglage pour cette Ressource et tous ses enfants<br /> 
							  n-n2 - Modifier le réglage pour cette plage de Ressources<br /> 
							  n - Modifier le réglage pour une Ressource</p> 
							  <p>Exemple: 1*,4**,2-20,25 - Cela modifiera le réglage sélectionné pour la Ressource 1 et ses enfants, la Ressource 4 et tous ses enfants, et les Ressources 2 à 20, ainsi que la Ressource 25.</p>';
$_lang['RM_select_tree'] ='Afficher et sélectionner les Ressources en utilisant l\'Arbre du Site';

//-- process tree/range messages
$_lang['RM_process_noselection'] = 'Aucune sélection effectuée. ';
$_lang['RM_process_novalues'] = 'Aucune valeur définie.';
$_lang['RM_process_limits_error'] = 'Limite supérieure plus petite que la limite inférieure:';
$_lang['RM_process_invalid_error'] = 'Valeur incorrecte:';
$_lang['RM_process_update_success'] = 'La mise à jour a été effectuée correctement, sans erreurs.';
$_lang['RM_process_update_error'] = 'La mise à jour a été effectuée, mais a généré des erreurs:';
$_lang['RM_process_back'] = 'Retour';

//-- manager access logging
$_lang['RM_log_template'] = 'Resource Manager: Modèle(s) modifié(s).';
$_lang['RM_log_templatevariables'] = 'Resource Manager: Variable(s) de Modèle modifiée(s).';
$_lang['RM_log_docpermissions'] ='Resource Manager: Permission(s) de la(des) Ressource(s) modifiée(s).';
$_lang['RM_log_sortmenu']='Resource Manager: Modification de l\'index de menu effectuée.';
$_lang['RM_log_publish']='Resource Manager: Réglages de publication/dépublication effectués.';
$_lang['RM_log_hidemenu']='Resource Manager: Option(s) de masquage/affichage de la(des) Ressource(s) dans le menu modifiée(s).';
$_lang['RM_log_search']='Resource Manager:Option(s) de recherche de la(des) Ressource(s) dans le menu modifiée(s).';
$_lang['RM_log_cache']='Resource Manager: Option(s) de cache de la(des) Ressource(s) dans le menu modifiée(s).';
$_lang['RM_log_richtext']='Resource Manager: Option(s) d\'édition de la(des) Ressource(s) dans le menu modifiée(s).';
$_lang['RM_log_delete']='Resource Manager: Option(s) d\'effacement/de restauration de la(des) Ressource(s) dans le menu modifiée(s).';
$_lang['RM_log_dates']='Resource Manager: Date(s) de création/édition de la(des) Ressource(s) modifiée(s).';
$_lang['RM_log_authors']='Resource Manager: Auteur de la(des) Ressource(s) modifié(s).';
?>