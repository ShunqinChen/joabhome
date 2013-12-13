<?php
/*
 * ����ʱ�� 2007-03-08
 * �ļ�����(File Authors): л�Ƚ�
 * �汾(Version): 1.0
 * ����޸�ʱ��(Modified): 0000-00-00 00:00:00
 *
 * vtion ��Ȩ����, δ����ɣ���ֹ������ҵ��;��
 * ������´������
 */
 class showPage {
      protected  $_total;                          //��¼����
      protected  $pagesize;                       //ÿһҳ��ʾ�ļ�¼��
      public     $pages;                         //��ҳ��
      protected  $_cur_page;                    //��ǰҳ��
      protected  $offset;                      //��¼ƫ����
      protected  $pager_Links;                //url����
      protected  $pernum = 5;                //ҳ��ƫ������������������
    
      public function page($total,$pagesize=10,$_cur_page=1)
        {   
        $this->_total=$total;
        $this->pagesize=$pagesize;
        $this->_offset();
        $this->_pager();
        $this->cur_page($_cur_page);
        $this->link();
    }
    
    public  function _pager()//������ҳ��
    { 
    return $this->pages = ceil($this->_total/$this->pagesize);
    }
   
   
    public function cur_page($_cur_page) //����ҳ��
    {     
           if (isset($_cur_page))
           {
           $this->_cur_page=intval($_cur_page);
           }
           else
           {
            $this->_cur_page=1; //����Ϊ��һҳ
           }
        return  $this->_cur_page;
   }
   
//���ݿ��¼ƫ����
   public function _offset()
   {
/*   	echo $this->pagesize."size<br>";
   	echo $this->_cur_page."cur<br>";
   	echo $this->offset=$this->pagesize*($this->_cur_page-1)>=0?$this->pagesize*($this->_cur_page-1):$this->pagesize;
   */	
//   return $this->offset=$this->pagesize*($this->_cur_page-1)>=0?$this->pagesize*($this->_cur_page-1):$this->pagesize;
   return $this->offset=$this->pagesize*($this->_cur_page-1);
   }
   
  //html���ӵı�ǩ 
  public function link($url=array())
  {
  	global $IN;
  	if($IN['pageNum']) $url['pageNum'] = $IN['pageNum'];//�������һҳ��ʾ����
  	$urlString = '';
  	if(is_array($url)){
	  	foreach ($url as $k=>$y){
	  		$key = $k;
	  		$val = $y;
	  		$urlString .= '&'.$key.'='.$val;
	  		$hidden .="<input type='hidden' name='".$key."' value='".$val."'>";
	  	}
  	}else {
  		$urlString = $url;
  	}
  	$string = "  |".$this->_total."����¼ ��".ceil($this->_total/$this->pagesize)."ҳ ��ǰ��".$this->_cur_page."ҳ ";
    if ($this->_cur_page == 1 && $this->pages>1) 
        {
            //��һҳ
            $this->pager_Links = "�� ҳ | ��һҳ | <a href=".$PHP_SELF."?pager=".($this->_cur_page+1).$urlString.">��һҳ</a> | <a href=".$PHP_SELF."?pager=$this->pages$urlString>β ҳ</a>".$string;
        } 
        elseif($this->_cur_page == $this->pages && $this->pages>1) 
        {
            //���һҳ
             $this->pager_Links = "<a href=".$PHP_SELF."?pager=1$urlString>�� ҳ<a> | <a href=".$PHP_SELF."?pager=".($this->_cur_page-1).$urlString.">��һҳ</a> | ��һҳ | β ҳ".$string;
        } 
        elseif ($this->_cur_page > 1 && $this->_cur_page <= $this->pages) 
        {
            //�м�
             $this->pager_Links = "<a href=".$PHP_SELF."?pager=1$urlString>�� ҳ<a> | <a href=".$PHP_SELF."?pager=".($this->_cur_page-1).$urlString.">��һҳ</a> | <a href=".$PHP_SELF."?pager=".($this->_cur_page+1).$urlString.">��һҳ</a> | <a href=".$PHP_SELF."?pager=$this->pages$urlString>β ҳ</a>".$string;
        } 
        $this->pager_Links .= $hidden."<input type='text' name='pager' size='3'>&nbsp;<input type='submit' name='sub' value='Go' size='5'>";
        return $this->pager_Links;
  }
  
  //html�������ӵı�ǩ
   public function num_link()
  {
       $setpage  = $this->_cur_page ? ceil($this->_cur_page/$this->pernum) : 1;
        $pagenum   = ($this->pages > $this->pernum) ? $this->pernum : $this->pages;
        if ($this->_total  <= $this->pagesize) {
            $text  = 'ֻ��һҳ';
        } else {
            $text = 'ҳ��:'.$this->pages.'&nbsp;'.$this->pagesize.'��/ҳ&nbsp;';
            if ($this->_cur_page > 1) {
                $text .= '<a title=��һҳ href=?pager=1>[1]</a>..';
            }
            if ($setpage > 1) {
                $lastsetid = ($setpage-1)*$this->pernum;
                $text .= '<a title=��һ�� href=?pager='.$lastsetid.'>[<<]</a>';
            }
            if ($this->_cur_page > 1) {
                $pre = $this->_cur_page-1;
                $text .= '<a title=��һҳ href=?pager='.$pre.'>[<]</a>';
            }
            $i = ($setpage-1)*$this->pernum;
            for($j=$i; $j<($i+$pagenum) && $j<$this->pages; $j++) {
                $newpage = $j+1;
                if ($this->_cur_page == $j+1) {
                    $text .= '<b>['.($j+1).']</b>';
                } else {
                    $text .= '<a href=?pager='.$newpage.'>['.($j+1).']</a>';
                }
            }            
            if ($this->_cur_page < $this->pages){
                $next = $this->_cur_page+1;
                $text .= '<a title=��һҳ href=?pager='.$next.'>[>]</a>';
            }
            if ($setpage < $this->_total) {
                $nextpre = $setpage*($this->pernum+1);
                if($nextpre<$this->pages)
                $text .= '<a title=��һ�� href=?pager='.$nextpre.'>[>>]</a>';
            }
            if ($this->_cur_page < $this->pages) {
                $text .= '..<a title=���һҳ href=?pager='.$this->pages.'>['.$this->pages.']</a>';
            }
         }
            return $text;
         }
    }
//$conn,$tpl ȫ�ֱ��� ���� $table�����ݱ� $where ��������� $order ��ADSC֮���,$pager_size��ÿҳ��ʾ��,$pager�ǵ�ǰҳ
//���غ��������������ֱ��ʹ�� 
/*<{section name=sec loop=$show}>  <{/section}>
���ֱ�ǩ��<{$numlink}>*/
/*    class showPage extends show_Pager
    {
        function __construct($table,$where,$order,$pager_size,$pager)
        {
         global $conn;
         global $tpl;
         $sql="SELECT * FROM `$table` $where order by $order desc";
         $nums=$conn->Execute($sql)->RecordCount();
         $pager=new show_Pager($nums,$pager_size,$pager);
         $show=$conn->SelectLimit($sql,$pager_size,$pager->_offset())->GetAll();
         $tpl->assign("numlink",$pager->num_link());//���ֱ�ǩ
         $tpl->assign("show",$show);//��ʾ����
        }
    }*/
$linkpage = new  showPage();
?>