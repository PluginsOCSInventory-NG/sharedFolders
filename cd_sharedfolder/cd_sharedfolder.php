<?php
/*
====================================================================================
 OCS INVENTORY
 Copyleft Valentin DEVILLE
 Web: http://www.ocsinventory-ng.org
====================================================================================
*/

if(AJAX){
    parse_str($protectedPost['ocs']['0'], $params);
    $protectedPost+=$params;
    ob_start();
    $ajax = true;
}
else{
    $ajax=false;
}
    print_item_header("Shared Folders");

	if (!isset($protectedPost['SHOW'])){
        $protectedPost['SHOW'] = 'NOSHOW';
    }
	$form_name="sharedfolders";
	$table_name=$form_name;
    $tab_options=$protectedPost;
    $tab_options['form_name']=$form_name;
    $tab_options['table_name']=$table_name;
    echo open_form($form_name);
	$list_fields = array(
        'Share Name' => 'ShareName',
        'Local Path' => 'SharePath',
        'Share Type' => 'ShareType',
        'Share Descr.' => 'ShareDesc'
    );
    $list_col_cant_del=$list_fields;
    $default_fields= $list_fields;
    $sql=prepare_sql_tab($list_fields);

    $sql['SQL']  .= "FROM sharedfolders WHERE (hardware_id = $systemid)";
    array_push($sql['ARG'],$systemid);
    $tab_options['ARG_SQL']=$sql['ARG'];
    $tab_options['ARG_SQL_COUNT']=$systemid;
    ajaxtab_entete_fixe($list_fields,$default_fields,$tab_options,$list_col_cant_del);
    echo close_form();
    if ($ajax){
        ob_end_clean();
        tab_req($list_fields,$default_fields,$list_col_cant_del,$sql['SQL'],$tab_options);
        ob_start();
    }
