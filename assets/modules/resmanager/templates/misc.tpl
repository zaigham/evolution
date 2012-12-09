<br /><h3>[+lang.RM_adjust_dates_header+]</h3><br />
<p>[+lang.RM_adjust_dates_desc+]</p><br />
<form id="dates" name="dates" method="post" action="">
    <table style="margin-left: 50px">
	    <tr>
	        <td><label for="date_pubdate" id="date_pubdate_label">[+lang.RM_date_pubdate+]</label></td>
	        <td>
	            <input type="text" id="date_pubdate" class="DatePicker" name="date_pubdate" />
	            <a href="#" onclick="document.forms['dates'].elements['date_pubdate'].value=''; return true;">[+lang.RM_clear_date+]</a>
	        </td>
	    </tr>
	    <tr>
	        <td><label for="date_unpubdate" id="date_unpubdate_label">[+lang.RM_date_unpubdate+]</label></td>
	        <td>
	            <input type="text" id="date_unpubdate" class="DatePicker" name="date_unpubdate" />
	            <a href="#" onclick="document.forms['dates'].elements['date_unpubdate'].value=''; return true;">[+lang.RM_clear_date+]</a>
	        </td>
	    </tr>
	    <tr>
	        <td><label for="date_createdon" id="date_createdon_label">[+lang.RM_date_createdon+]</label></td>
	        <td>
	            <input type="text" id="date_createdon" class="DatePicker" name="date_createdon" />
	            <a href="#" onclick="document.forms['dates'].elements['date_createdon'].value=''; return true;">[+lang.RM_clear_date+]</a>
	        </td>
	    </tr>
	    <tr>
	        <td><label for="date_editedon" id="date_editedon_label">[+lang.RM_date_editedon+]</label></td>
	        <td>
	            <input type="text" id="date_editedon" class="DatePicker" name="date_editedon" />
	            <a href="#" onclick="document.forms['dates'].elements['date_editedon'].value=''; return true;">[+lang.RM_clear_date+]</a>
	        </td>
	    </tr>
    </table>
</form>


<br />
<h3>[+lang.RM_other_header+]</h3>
<br />
<p>[+lang.RM_misc_desc+]</p><br />
<form style="margin-left:50px;" name="other" method="post" action="">
    <input type="hidden" id="option1" name="option1" value="[+lang.RM_other_publish_radio1+]" />
    <input type="hidden" id="option2" name="option2" value="[+lang.RM_other_publish_radio2+]" />
    <input type="hidden" id="option3" name="option3" value="[+lang.RM_other_show_radio1+]" />
    <input type="hidden" id="option4" name="option4" value="[+lang.RM_other_show_radio2+]" />
    <input type="hidden" id="option5" name="option5" value="[+lang.RM_other_search_radio1+]" />
    <input type="hidden" id="option6" name="option6" value="[+lang.RM_other_search_radio2+]" />
    <input type="hidden" id="option7" name="option7" value="[+lang.RM_other_cache_radio1+]" />
    <input type="hidden" id="option8" name="option8" value="[+lang.RM_other_cache_radio2+]" />
    <input type="hidden" id="option9" name="option9" value="[+lang.RM_other_richtext_radio1+]" />
    <input type="hidden" id="option10" name="option10" value="[+lang.RM_other_richtext_radio2+]" />
    <input type="hidden" id="option11" name="option11" value="[+lang.RM_other_delete_radio1+]" />
    <input type="hidden" id="option12" name="option12" value="[+lang.RM_other_delete_radio2+]" />
    <label for="misc" id="misc_label">[+lang.RM_misc_label+]</label> 
    <select id="misc" name="misc" onchange="changeOtherLabels();">
		<option value="1">[+lang.RM_other_dropdown_publish+]</option>
		<option value="2">[+lang.RM_other_dropdown_show+]</option>
		<option value="3">[+lang.RM_other_dropdown_search+]</option>
		<option value="4">[+lang.RM_other_dropdown_cache+]</option>
		<option value="5">[+lang.RM_other_dropdown_richtext+]</option>
		<option value="6">[+lang.RM_other_dropdown_delete+]</option>
		<option value="0">&nbsp;-</option>
  </select>
  <br /><br />
  <input type="radio" name="choice" value = "1" />&nbsp;<label for="choice" id="choice_label_1">[+lang.RM_other_publish_radio1+]</label>
  <input type="radio" name="choice" value = "0" />&nbsp;<label for="choice" id="choice_label_2">[+lang.RM_other_publish_radio2+]</label>
</form>