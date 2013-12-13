<script type="text/javascript">
//<![CDATA[
function ot(id,flag) {
	if (flag!=true && document.getElementById('openst').value!='' && document.getElementById('openst').value!=id) {
		ot(document.getElementById('openst').value,true);
	}
	var t =    document.getElementById(id);
	var subt = document.getElementById(id + '_s');
	var tm = document.getElementById(id + '_m');
	var tu = document.getElementById(id + '_p');
	var display = subt.style.display;
	if (display=='block') {
		t.className = 'm1';
		tm.className = '';
		subt.style.display = 'none';
		tu.src="template/images/jia.gif";
		document.getElementById('openst').value = '';
	} else {
		t.className = 'm1  m1_bg';
		tm.className = 'h3_b2';
		subt.style.display = 'block';
		tu.src="template/images/juan.gif";
		document.getElementById('openst').value = id;
	}
}
function go (fid) {
	op_url = "secAudi.jsp?dec=note_admin&type_id="+fid;
	window.open(op_url,'');
}
//]]> 
</script>  <input id="openst" type="hidden" value="" />
<table width="178" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table id="t_1" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr id="t_1_m"> 
          <td width="178" height="28" background="img/cl1.gif"> <div align="center"><a href="javascript:ot('t_1')" class="cls14">Big 
              class</a> </div></td>
        </tr>
        <tr id="t_1_s" style="display:none;"> 
          <td height="70" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr > 
                <td width="33%" height="16"> <div align="right"><img src="img/line_tri.gif" width="19" height="16"></div></td>
                <td width="4%"><img src="img/mark.gif" width="5" height="5" id="t_1_p" alt="µã»÷" onClick="ot('t_1',1)"></td>
                <td width="63%" class="cls12">small class</td>
              </tr>
             
             
            
            
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table id="t_2" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr id="t_2_m"> 
          <td width="178" height="28" background="img/cl1.gif"> <div align="center"> 
              <p ><a href="javascript:ot('t_2')" class="cls14">Big class</a> </p>
            </div></td>
        </tr>
        <tr id="t_2_s" style="display:none;"> 
          <td height="70" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr > 
                <td width="33%" height="16"> <div align="right"><img src="img/line_tri.gif" width="19" height="16"></div></td>
                <td width="4%"><img src="img/mark.gif" width="5" height="5" id="t_2_p" alt="µã»÷" onClick="ot('t_2',2)"></td>
                <td width="63%" class="cls12">small class</td>
              </tr>
             
             
            
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table id="t_3" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr id="t_3_m"> 
          <td width="178" height="28" background="img/cl1.gif"> <div align="center"><a href="javascript:ot('t_3')" class="cls14">Big 
              class</a> </div></td>
        </tr>
        <tr id="t_3_s" style="display:none;"> 
          <td height="70" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr > 
                <td width="33%" height="16"> <div align="right"><img src="img/line_tri.gif" width="19" height="16"></div></td>
                <td width="4%"><img src="img/mark.gif" width="5" height="5" id="t_3_p" alt="µã»÷"  onClick="ot('t_3',3)"></td>
                <td width="63%" class="cls12">small class</td>
              </tr>

            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<script type="text/javascript">
//<![CDATA[
//ot('t_1');
//]]>
</script>