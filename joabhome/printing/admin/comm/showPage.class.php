<?php
/*
 * 创建时间 2007-03-08
 * 文件作者(File Authors): 谢稳金
 * 版本(Version): 1.0
 * 最后修改时间(Modified): 0000-00-00 00:00:00
 *
 * vtion 版权所有, 未经许可，禁止用于商业用途！
 * 添加文章处理代码
 */
 class showPage {
      protected  $_total;                          //记录总数
      protected  $pagesize;                       //每一页显示的记录数
      public     $pages;                         //总页数
      protected  $_cur_page;                    //当前页码
      protected  $offset;                      //记录偏移量
      protected  $pager_Links;                //url连接
      protected  $pernum = 5;                //页码偏移量，这里可随意更改
    
      public function page($total,$pagesize=10,$_cur_page=1)
        {   
        $this->_total=$total;
        $this->pagesize=$pagesize;
        $this->_offset();
        $this->_pager();
        $this->cur_page($_cur_page);
        $this->link();
    }
    
    public  function _pager()//计算总页数
    { 
    return $this->pages = ceil($this->_total/$this->pagesize);
    }
   
   
    public function cur_page($_cur_page) //设置页数
    {     
           if (isset($_cur_page))
           {
           $this->_cur_page=intval($_cur_page);
           }
           else
           {
            $this->_cur_page=1; //设置为第一页
           }
        return  $this->_cur_page;
   }
   
//数据库记录偏移量
   public function _offset()
   {
/*   	echo $this->pagesize."size<br>";
   	echo $this->_cur_page."cur<br>";
   	echo $this->offset=$this->pagesize*($this->_cur_page-1)>=0?$this->pagesize*($this->_cur_page-1):$this->pagesize;
   */	
//   return $this->offset=$this->pagesize*($this->_cur_page-1)>=0?$this->pagesize*($this->_cur_page-1):$this->pagesize;
   return $this->offset=$this->pagesize*($this->_cur_page-1);
   }
   
  //html连接的标签 
  public function link($url=array())
  {
  	global $IN;
  	if($IN['pageNum']) $url['pageNum'] = $IN['pageNum'];//这是针对一页显示几条
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
  	$string = "  |".$this->_total."条记录 共".ceil($this->_total/$this->pagesize)."页 当前第".$this->_cur_page."页 ";
    if ($this->_cur_page == 1 && $this->pages>1) 
        {
            //第一页
            $this->pager_Links = "首 页 | 上一页 | <a href=".$PHP_SELF."?pager=".($this->_cur_page+1).$urlString.">下一页</a> | <a href=".$PHP_SELF."?pager=$this->pages$urlString>尾 页</a>".$string;
        } 
        elseif($this->_cur_page == $this->pages && $this->pages>1) 
        {
            //最后一页
             $this->pager_Links = "<a href=".$PHP_SELF."?pager=1$urlString>首 页<a> | <a href=".$PHP_SELF."?pager=".($this->_cur_page-1).$urlString.">上一页</a> | 下一页 | 尾 页".$string;
        } 
        elseif ($this->_cur_page > 1 && $this->_cur_page <= $this->pages) 
        {
            //中间
             $this->pager_Links = "<a href=".$PHP_SELF."?pager=1$urlString>首 页<a> | <a href=".$PHP_SELF."?pager=".($this->_cur_page-1).$urlString.">上一页</a> | <a href=".$PHP_SELF."?pager=".($this->_cur_page+1).$urlString.">下一页</a> | <a href=".$PHP_SELF."?pager=$this->pages$urlString>尾 页</a>".$string;
        } 
        $this->pager_Links .= $hidden."<input type='text' name='pager' size='3'>&nbsp;<input type='submit' name='sub' value='Go' size='5'>";
        return $this->pager_Links;
  }
  
  //html数字连接的标签
   public function num_link()
  {
       $setpage  = $this->_cur_page ? ceil($this->_cur_page/$this->pernum) : 1;
        $pagenum   = ($this->pages > $this->pernum) ? $this->pernum : $this->pages;
        if ($this->_total  <= $this->pagesize) {
            $text  = '只有一页';
        } else {
            $text = '页数:'.$this->pages.'&nbsp;'.$this->pagesize.'个/页&nbsp;';
            if ($this->_cur_page > 1) {
                $text .= '<a title=第一页 href=?pager=1>[1]</a>..';
            }
            if ($setpage > 1) {
                $lastsetid = ($setpage-1)*$this->pernum;
                $text .= '<a title=上一列 href=?pager='.$lastsetid.'>[<<]</a>';
            }
            if ($this->_cur_page > 1) {
                $pre = $this->_cur_page-1;
                $text .= '<a title=上一页 href=?pager='.$pre.'>[<]</a>';
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
                $text .= '<a title=下一页 href=?pager='.$next.'>[>]</a>';
            }
            if ($setpage < $this->_total) {
                $nextpre = $setpage*($this->pernum+1);
                if($nextpre<$this->pages)
                $text .= '<a title=下一列 href=?pager='.$nextpre.'>[>>]</a>';
            }
            if ($this->_cur_page < $this->pages) {
                $text .= '..<a title=最后一页 href=?pager='.$this->pages.'>['.$this->pages.']</a>';
            }
         }
            return $text;
         }
    }
//$conn,$tpl 全局变量 传入 $table是数据表 $where 是条件语句 $order 是ADSC之类的,$pager_size是每页显示数,$pager是当前页
//返回后在摸板里面可以直接使用 
/*<{section name=sec loop=$show}>  <{/section}>
数字标签用<{$numlink}>*/
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
         $tpl->assign("numlink",$pager->num_link());//数字标签
         $tpl->assign("show",$show);//显示帖子
        }
    }*/
$linkpage = new  showPage();
?>