<?php /* Smarty version 2.6.1, created on 2008-04-14 20:02:39
         compiled from monitor_info.tpl */ ?>
<?php echo '<?'?>
xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 - Live Support Solution (Powered By Help Center Live)</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/monitor.css" rel="stylesheet" type="text/css" />
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
">
</script>
<?php endif; ?>
</head>
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<br />


<table width="90%" align="center" border="0" cellspacing="1" cellpadding="2" class="border">
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><?php echo $this->_tpl_vars['lang']['hostname']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light" colspan="2"><div align="center"><?php echo $this->_tpl_vars['info']['hostname']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><?php echo $this->_tpl_vars['lang']['ip_addr']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light" colspan="2"><div align="center"><?php echo $this->_tpl_vars['info']['ip']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['useragent']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">&nbsp;&nbsp;<?php echo $this->_tpl_vars['info']['useragent']; ?>
</td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['referrer']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['refurl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['referrer']; ?>
</a></td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['current_page']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['page']; ?>
</a></td>
  </tr>
  <tr>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['time_page']; ?>
</b></div></td>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['time_site']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['page_time']; ?>
</div></td>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['site_time']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['total_unique_visits']; ?>
</b></div></td>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['total_chat_requests']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['visits']; ?>
</div></td>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['requests']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['footprints']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['info']['footprints']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<?php if ($this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['hotpage'] == 'true'): ?>
      <b>!</b>&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php else: ?>
      &nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php endif; ?>
<?php endfor; endif; ?>
    </td>
  </tr>
<?php if ($this->_tpl_vars['history'] == 'true'): ?>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['history']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['info']['history']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<?php if ($this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['hotpage'] == 'true'): ?>
      <b>!</b>&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php else: ?>
      &nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php endif; ?>
<?php endfor; endif; ?>
    </td>
  </tr>
<?php endif; ?>
  <tr>
    <td class="light" colspan="3"><div align="center">[<a href="javascript:window.location.href = window.location.href+'&history';"><?php echo $this->_tpl_vars['lang']['view_history']; ?>
</a>][<a href="javascript:window.close();"><?php echo $this->_tpl_vars['lang']['close']; ?>
</a>]</div></td>
  </tr>
</table>
<br /><br />

</body>
</html>