<?php
/**
 * Adapted from the TemplateRules plugin by Cipa
 */
class TemplateRules {

    /**
     * Returns an array with the value of the TV and at what level was found. Level is used if multiple levels are configured in the TV
     *
     * Returns null if non-empty TV not found
     *
     * @author Cipa
     */
    function getTvValueAndLevel($startId, $templateRulesTvID){
    
        global $modx;
    
        //init level
        $level = 0;
        //init the TV value
        $tplVal = ''; 
    
        //find the first parent that has an defaultTemplate TV and on which level
        while($startId){
            //increase level
            $level++;
        
            //check if the parent has the defaultTemplate TV
            $sql = "SELECT * FROM ".$modx->db->config['table_prefix']."site_tmplvar_contentvalues WHERE tmplvarid = " . $templateRulesTvID . " AND contentid = " . $startId;
            $rs= $modx->dbQuery($sql);
            $row = $modx->fetchRow($rs);
        
            if($row && $row['value'] != ''){
                //stop while loop
                $startId = 0;
                //save TV value
                $tplVal = $row['value'];
            }else{
                //get next parent
                $sql = "SELECT parent FROM ".$modx->db->config['table_prefix']."site_content WHERE id = " . $startId;
                $rs= $modx->dbQuery($sql);
                $row = $modx->fetchRow($rs);
            
                $startId = $row['parent'];
            }
        }
    
        return $tplVal ? array("value"=>$tplVal, "level"=>$level) : null;  // TimGS
    }

    /**
     * Gets the value of the default teplate. Used when a new document/resource is created
     *
     * @author Cipa
     */
    function getDefaultTemplate($tvValueAndLevel){
    
        $tvValue = $tvValueAndLevel['value'];
        $level = $tvValueAndLevel['level'];
    
        $template = null; // TimGS

        //set template to the defaultTemplate value
        $aTplVals = explode(",",$tvValue);
        if(isset($aTplVals[$level-1])){
        
            $defaultTemplateInfo = $aTplVals[$level-1];
            $hasAllowed = strpos($defaultTemplateInfo, '[');
        
            if($hasAllowed){//parse allowed templates
            
                $aAllowedTemplatesTemp = explode("[",$defaultTemplateInfo);
                $template = intval($aAllowedTemplatesTemp[0]);
            
            }else{ //no allowed templates functionality
            
                $template = intval($defaultTemplateInfo);
            
            }
    
        }else{
            //NTD
        }
    
        return $template;
    }

    /**
     * Gets list of allowed templates to display
     *
     * @author TimGS
     */
    function getTemplateList($tvValueAndLevel) {
        if (preg_match('/\[(.*?)\]/', $tvValueAndLevel['value'], $matches)) {
            $ids2 = array();
            $ids = explode('|', $matches[1]);
            foreach ($ids as $id) {
                $id = trim($id);
                if (ctype_digit($id)) {
                    $ids2[] = $id;
                }
            }
            return implode(',', $ids2);
        } else {
            return '';
        }
    }
}

