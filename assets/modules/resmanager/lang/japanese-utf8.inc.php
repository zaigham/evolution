<?php
/**
 * Resource Manager Module - japanese-utf8.inc.php
 *
 * Purpose: Contains the language strings for use in the module.
 * Author: Garry Nutting
 * For: MODx CMS (www.modxcms.com)
 * Date:2009/07/25 Version: 1.6.2
 * Initial translated: 04/10/2006 by eastbind (eastbind@bodenplatte.jp)
 *
 */

//-- JAPANESE LANGUAGE FILE ENCODED IN UTF-8

//-- titles
$_lang['RM_module_title'] = 'Res Manager';
$_lang['RM_action_title'] = '操作を選択します';
$_lang['RM_range_title'] = '操作対象(操作元)のリソースIDを指定';
$_lang['RM_tree_title'] = 'サイトツリーからリソースを選択';
$_lang['RM_update_title'] = '更新完了';
$_lang['RM_sort_title'] = 'メニューインデックスエディタ';

//-- tabs
$_lang['RM_doc_permissions'] = 'アクセス許可';
$_lang['RM_template_variables'] = 'テンプレート変数';
$_lang['RM_sort_menu'] = 'メニュー整列';
$_lang['RM_change_template'] = 'テンプレート選択';
$_lang['RM_publish'] = '公開/非公開';
$_lang['RM_other'] = 'その他';

//-- buttons
$_lang['RM_close'] = '閉じる';
$_lang['RM_cancel'] = '戻る';
$_lang['RM_go'] = 'Go';
$_lang['RM_save'] = '更新';
$_lang['RM_sort_another'] = '別の整列';

//-- templates tab
$_lang['RM_tpl_desc'] = '下の表からテンプレートを選んでリソースIDを指定します。IDの指定は下記の範囲指定をするか、サイトツリーから選択するか、いずれでも指定できます。';
$_lang['RM_tpl_no_templates'] = 'テンプレートがありません';
$_lang['RM_tpl_column_id'] = 'ID';
$_lang['RM_tpl_column_name'] = 'テンプレート名';
$_lang['RM_tpl_column_description'] ='説明';
$_lang['RM_tpl_blank_template'] = 'テンプレート無し';

$_lang['RM_tpl_results_message']= '他の操作を行いたいときは「戻る」ボタンを使ってください。サイトのキャッシュは自動的にクリアされています。';

//-- template variables tab
$_lang['RM_tv_desc'] = '変更するリソースをIDで指定します。IDの指定は下記の範囲指定をするか、サイトツリーから選択するか、いずれでも指定できます。適用するテンプレートを表から選ぶと関連するテンプレート変数がロードされます。後はテンプレート変数の値を入力して「適用」ボタンを クリックすれば処理が開始されます。';
$_lang['RM_tv_template_mismatch'] = 'このリソースはそのテンプレートを使用していません。';
$_lang['RM_tv_doc_not_found'] = 'このリソースはデータベースにありません。';
$_lang['RM_tv_no_tv'] = 'このテンプレートにはテンプレート変数が定義されていません。';
$_lang['RM_tv_no_docs'] = '変更するリソースが選択されていません。';
$_lang['RM_tv_no_template_selected'] = 'テンプレートが選択されていません。';
$_lang['RM_tv_loading'] = 'テンプレート変数をロード中 ...';
$_lang['RM_tv_ignore_tv'] = 'これらのテンプレート変数を無視 (変数名をカンマ区切り):';
$_lang['RM_tv_ajax_insertbutton'] = '挿入';

//-- document permissions tab
$_lang['RM_doc_desc'] = '下の表からリソースグループを選んで加えたいのか外したいのかを選択します。そして操作対象のリソースIDを指定してください。IDの指定は下記の範囲指定をするか、サイトツリーから選択するか、いずれでも指定できます。';
$_lang['RM_doc_no_docs'] = 'リソースグループがありません';
$_lang['RM_doc_column_id'] = 'ID';
$_lang['RM_doc_column_name'] = 'グループ名';
$_lang['RM_doc_radio_add'] = 'リソースグループに追加';
$_lang['RM_doc_radio_remove'] = 'リソースグループから削除';

$_lang['RM_doc_skip_message1'] = 'リソースID';
$_lang['RM_doc_skip_message2'] = 'は選択したリソースグループに既に含まれています。(スキップ)';

//-- sort menu tab
$_lang['RM_sort_pick_item'] = 'メニューの並び順(menuindex)をマウス操作でまとめて変更できます。<br />サイトルートか、並べ替えたい範囲の親リソース(コンテナ)をクリックしてください。';
$_lang['RM_sort_updating'] = '更新中 ...';
$_lang['RM_sort_updated'] = '更新しました。「閉じる」または「戻る」ボタンをクリックしてください。';
$_lang['RM_sort_nochildren'] = 'このリソースにはサブリソースがありません。';
$_lang['RM_sort_noid']='リソースが選択されていません。戻ってリソースを選択してください。';

//-- other tab
$_lang['RM_other_header'] = 'リソースの各種設定';
$_lang['RM_misc_label'] = '変更対象の設定:';
$_lang['RM_misc_desc'] = '変更する設定をドロップダウンメニューから選択してください。そして必要なオプションを指定します。一度にひとつの設定しか変更できません。';

$_lang['RM_other_dropdown_publish'] = '公開/非公開';
$_lang['RM_other_dropdown_show'] = 'メニューに表示/非表示';
$_lang['RM_other_dropdown_search'] = '検索対象/非対象';
$_lang['RM_other_dropdown_cache'] = 'キャッシュ/不可';
$_lang['RM_other_dropdown_richtext'] = 'エディタ/なし';
$_lang['RM_other_dropdown_delete'] = '削除/復活';

//-- radio button text
$_lang['RM_other_publish_radio1'] = '公開';
$_lang['RM_other_publish_radio2'] = '非公開';
$_lang['RM_other_show_radio1'] = 'メニューから隠す';
$_lang['RM_other_show_radio2'] = 'メニューに表示';
$_lang['RM_other_search_radio1'] = '検索対象';
$_lang['RM_other_search_radio2'] = '検索しない';
$_lang['RM_other_cache_radio1'] = 'キャッシュする';
$_lang['RM_other_cache_radio2'] = 'キャッシュしない';
$_lang['RM_other_richtext_radio1'] = 'エディタ使用';
$_lang['RM_other_richtext_radio2'] = 'エディタ不要';
$_lang['RM_other_delete_radio1'] = '削除';
$_lang['RM_other_delete_radio2'] = '削除から復活';

//-- adjust dates
$_lang['RM_adjust_dates_header'] = 'リソースの各種日時設定';
$_lang['RM_adjust_dates_desc'] = '複数のリソースの日時設定をまとめて変更できます。';
$_lang['RM_view_calendar'] = 'カレンダーを表示';
$_lang['RM_clear_date'] = 'リセット';

//-- adjust authors
$_lang['RM_adjust_authors_header'] = '作成者などの設定';
$_lang['RM_adjust_authors_desc'] = 'リソースの作成者/編集者をリストから選んでください';
$_lang['RM_adjust_authors_createdby'] = '作成者:';
$_lang['RM_adjust_authors_editedby'] = '編集者:';
$_lang['RM_adjust_authors_noselection'] = '変更なし';

 //-- labels
$_lang['RM_date_pubdate'] = '公開日時:';
$_lang['RM_date_unpubdate'] = '公開終了日時:';
$_lang['RM_date_createdon'] = '作成日時:';
$_lang['RM_date_editedon'] = '編集日時:';
//$_lang['RM_date_deletedon'] = 'Deleted On Date';

$_lang['RM_date_notset'] = ' (変更しません)';
//deprecated
$_lang['RM_date_dateselect_label'] = '日付を選択: ';

//-- document select section
$_lang['RM_select_submit'] = '適用';
$_lang['RM_select_range'] = 'ID指定画面に戻ります';
$_lang['RM_select_range_text'] = '<p><strong>指定方法（n、m はリソースIDを示す数字です):</strong></p>
						<ul><li>n*　 - その親リソース(コンテナ)と直下のサブリソースを意味する指定</li>
							<li>n** - その親リソース(コンテナ)と配下の子、孫など全てのリソースを意味する指定</li>
							<li>n-m - n から m までのIDの範囲を意味る指定。n、m を含みます</li>
							<li>n　　 - IDがnの1つのリソースを意味する指定</li>
							<li>例：1*,4**,2-20,25　- この指定では、1、1のサブリソース、4、4の全配下リソース、
							2から20までの19個のリソース及び25 の各IDのリソースが指定されています。</li></ul>';
$_lang['RM_select_tree'] ='ツリー表示からリソースを選択します';

//-- process tree/range messages
$_lang['RM_process_noselection'] = '必要な指定がされていません。';
$_lang['RM_process_novalues'] = '値が指定されていませんでした。';
$_lang['RM_process_limits_error'] = '上限が下限よりも小さいです:';
$_lang['RM_process_invalid_error'] = '値がイレギュラーです ';
$_lang['RM_process_update_success'] = '変更は無事完了しました。';
$_lang['RM_process_update_error'] = '変更は完了しましたが、エラーがありました:';
$_lang['RM_process_back'] = '戻る';

//-- manager access logging
$_lang['RM_log_template'] = 'Res Manager: テンプレートを変更しました。';
$_lang['RM_log_templatevariables'] = 'Res Manager: テンプレート変数を変更しました。';
$_lang['RM_log_docpermissions'] ='Res Manager: リソースのアクセス制限を変更しました。';
$_lang['RM_log_sortmenu']='Resource Manager: メニューインデックス操作を完了しました。';
$_lang['RM_log_publish']='Resource Manager: リソースの公開/非公開を変更しました。';
$_lang['RM_log_hidemenu']='Resource Manager: リソースのメニュー表示/非表示を変更しました。';
$_lang['RM_log_search']='Resource Manager: リソースの検索対象/非対象を変更しました。';
$_lang['RM_log_cache']='Resource Manager: リソースのキャッシュ可/不可を変更しました。';
$_lang['RM_log_richtext']='Resource Manager: リソースのリッチテキストエディタの設定を変更しました。';
$_lang['RM_log_delete']='Resource Manager: リソースの削除/復活を変更しました。';
$_lang['RM_log_dates']='Resource Manager: リソースの各種日付を変更しました。';
$_lang['RM_log_authors']='Resource Manager: リソースの作成者などの情報を変更しました。';

?>