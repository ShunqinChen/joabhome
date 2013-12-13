<?php


/*
 * WEIP - Web-based Enterprise Information Platform
 * Copyright (C) 2005 WEIP Group (http://www.weip.cn/)
 * All rights reserved.
 * δ����ɣ���ֹ������ҵ��;��
 * 
 * �汾(Version):  0.1
 * ����޸�ʱ��(Modified): 0000-00-00 00:00:00
 * 
 * �ļ�����(File Authors):
 *      ��־��
 */

/**
 * WEIP Image ��
 *
 * @package weip.util
 * @author ��־��
 */
class FileSystem {
	/**
	 * ���캯��
	 */
	public function __construct() {
	
	}
	/**
	 * �ƶ��ļ�
	 * @param array $fileList
	 * @param string $from
	 * @param string $to
	 * @param string $option
	 * @return void
	 */
	public static function mv($fileList, $from, $to, $option='f') {
		if ( is_dir($from) && is_dir($to) ) {
			if (!is_array($fileList)) {
				$fileList = explode('|', $fileList);
			}
			foreach ($fileList as $file) {
				$file_src = $from . '/' . $file;
				if (is_file($file_src))	{
					$file_dest = $to . '/' . $file;
					if (!is_file($file_dest) || strpos($option, 'f')!==false) {
						copy($file_src, $file_dest);
						if (strpos($option, 'k')===false) {
							unlink($file_src);
						}
					}
				}
			}
		}
	}
	/**
	 * ɾ���ļ����ļ��У��ݹ飩
	 * @param array $fileList
	 * @param string $option
	 * @return void
	 */
	public static function rm($fileList, $option='r') {
		if (!is_array($fileList)) {
			$fileList = explode('|', $fileList);
		}
		foreach ($fileList as $filename) {
			if (is_file($filename))	{
				unlink($filename);
			} elseif (is_dir($filename)) {
				if (strpos($option, 'r')!==false) {
					$file_list_ = FileSystem::ls($filename);
					foreach ($file_list_ as $fi => $file) {
						$file_list_[$fi] = $filename . '/' . $file;
					}
					FileSystem::rm($file_list_, $option);
				}
				rmdir($filename);
			}
		}
	}
	/**
	 * ȡ�ļ���չ��  
	 * @param string $fileName
	 * @param bool $withDot
	 * @return string
	 */
	public static function fileExt($fileName, $withDot=false)
	{
		$fileName = basename($fileName);
		$pos = strrpos($fileName, '.');
		if ($pos===false) {
			$result = '';
		} else {
			$result = ($withDot) ? substr($fileName, $pos) : substr($fileName, $pos+1);
		}
		return $result;
	}
	public static function getBasicName($fileName, $withDot=false) {
		$pos = strrpos($fileName, '.');
		if ($pos===false) {
			$result = $fileName;
		} else {
			$result = ($withDot) ? substr($fileName,0, $pos+1) : substr($fileName,0, $pos);
		}
		return $result;
	}
	/**
	 * ����ָ��·���з����������ļ����ļ����б�  
	 * @param string $path
	 * @param array $condition
	 * @param string $sort
	 * @return array
	 */
	public static function ls($path, $condition=array(), $sort='ASC', $withPath=false)
	{
		$result = array();
		if (is_dir($path) && $handle=opendir($path)) {
			while (false !== ($file = readdir($handle))) {
				if ($file!='.' && $file!='..') {
					$valid = true;
					if ($condition)	{
						foreach ($condition as $name => $value)	{
							switch ($name) {
								case 'fileext':
									if (!$fileext_list) {
										$fileext_list = explode('|', $value);
									}
									if ($fileext_list) {
										$valid = in_array(FileSystem::fileExt($file), $fileext_list);
									}
									break;
								case 'fileonly':
									$valid = ( !$value || is_file($path . '/' . $file) );
									break;
								case 'folderonly':
									$valid = ( !$value || is_dir($path . '/' . $file) );
									break;
								case 'filename':
									if ($value) {
										$valid = ( $value == basename($file, FileSystem::fileExt($file, true)) );
									}
									break;
							}
							if (!valid) {
								break;
							}
						}
					}
					if ($valid) {
						$result[] = ($withPath) ? ($path . '/' . $file) : $file;
					}
				}
			}
			closedir($handle); 
		}
		switch ($sort) {
			case 'ASC':
				sort($result);
				break;
			case 'DESC':
				rsort($result);
				break;
		}
		return $result;
	}
	/**
	 * ����ָ��·���з����������ļ��б�  
	 * @param string $path
	 * @param string $fileext
	 * @param string $sort
	 * @return array
	 */
	public static function fileList($path, $fileext='', $sort='ASC', $withPath=false) {
		$condition = array(
				'fileonly'		=> true,
				'fileext'		=> $fileext,
				);
		$result = FileSystem::ls($path, $condition, $sort, $withPath);
		return $result;
	}
	/**
	 * ����ָ��·���з����������ļ����б�  
	 * @param string $path
	 * @param string $sort
	 * @return array
	 */
	public static function folderList($path, $sort='ASC', $withPath=false)
	{
		$condition = array(
				'folderonly'		=> true,
				);
		$result = FileSystem::ls($path, $condition, $sort, $withPath);
		return $result;
	}

}






























/*
 * WEIP - Web-based Enterprise Information Platform
 * Copyright (C) 2005 WEIP Group (http://www.weip.cn/)
 * All rights reserved.
 * δ����ɣ���ֹ������ҵ��;��
 * 
 * �汾(Version):  0.1
 * ����޸�ʱ��(Modified): 0000-00-00 00:00:00
 * 
 * �ļ�����(File Authors):
 *      ��־��
 */

/**
 * WEIP Image ��
 *
 * @package weip.util
 * @author ��־��
 */
class Image {

	/**
	 * @var string $fileName �ļ���
	 * @access private
	 */
	private $fileName = '';
	
	/**
	 * @var gd resource $imageResource ԭͼ��
	 * @access private
	 */
	private $imageResource = NULL;
	
	/**
	 * @var int $imageWidth ԭͼ���
	 * @access private
	 */
	private $imageWidth = NULL;
	
	/**
	 * @var int $imageHeight ԭͼ���
	 * @access private
	 */
	private $imageHeight = NULL;
	
	/**
	 * @var int $imageType ԭͼ������
	 * @access private
	 */
	private $imageType = NULL;
	
	/**
	 * @var int $newResource ��ͼ��
	 * @access private
	 */
	private $newResource = NULL;
	
	/**
	 * @var int $newResType ��ͼ������
	 * @access private
	 */
	private $newResType = NULL;
	
	/**
	 * ���캯��
	 * @param string $fileName �ļ���
     */
	public function construct($fileName = NULL) {
		$this->fileName = $fileName;
		if ($this->fileName) {
			$this->getSrcImageInfo();
		}
	}
	
	/**
	 * ȡԴͼ����Ϣ
	 * @access private
	 * @return void
	 */
	private function getSrcImageInfo() {
		$info = $this->getImageInfo();
		$this->imageWidth = $info[0];
		$this->imageHeight = $info[1];
		$this->imageType = $info[2];
	}

	/**
	 * ȡͼ����Ϣ
	 * @param string $fileName �ļ���
	 * @access private
	 * @return array
	 */
	private function getImageInfo($fileName = NULL) {
		if ($fileName==NULL) {
			$fileName = $this->fileName;
		}
		$info = getimagesize($fileName);
		return $info;
	}

	/**
	 * ����Դͼ��GD ��Դ
	 * @access private
	 * @return void
	 */
	private function createSrcImage () {
		$this->imageResource = $this->createImageFromFile();
	}

	/**
	 * �����ļ�����ͼ��GD ��Դ
	 * @param string $fileName �ļ���
	 * @return gd resource
	 */
    public function createImageFromFile($fileName = NULL)
    {
    	
		if (!$fileName) {
			$fileName = $this->fileName;
			$imgType = $this->imageType;
		}
        if (!is_readable($fileName) || !file_exists($fileName)) {
            throw new Exception('Unable to open file "' . $fileName . '"');
        }

		if (!$imgType) {
			$imageInfo = $this->getImageInfo($fileName);
			$imgType = $imageInfo[2];
		}
		
        switch ($imgType) {
		case IMAGETYPE_GIF:
			$tempResource = imagecreatefromgif($fileName);
			break;
		case IMAGETYPE_JPEG:
			$tempResource = imagecreatefromjpeg($fileName);
			break;
		case IMAGETYPE_PNG:
			$tempResource = imagecreatefrompng($fileName);
			break;
		case IMAGETYPE_WBMP:
			$tempResource = imagecreatefromwbmp($fileName);
			break;
		case IMAGETYPE_XBM:
			$tempResource = imagecreatefromxbm($fileName);
			break;
		default:
			throw new Exception('Unsupport image type');
        }
		return $tempResource;
    }
	/**
	 * �ı�ͼ���С
	 * @param int $width ��
	 * @param int $height ��
	 * @param string $flag ��ʲô��ʽ�ı� 0=����ת���ɲ���ָ���� 1=���������ţ�����Լ���ڲ���ָ���ڣ�2=�Կ�ΪԼ�����ţ�3=�Ը�ΪԼ������
	 * @return string
	 */
	public function resizeImage($width, $height, $flag=1) {
		$widthRatio = $width/$this->imageWidth;
		$heightRatio = $height/$this->imageHeight;
		switch ($flag) {
		case 1:
			if ($this->imageHeight < $height && $this->imageWidth < $width) {
				$endWidth = $this->imageWidth;
				$endHeight = $this->imageHeight;
				//return;
			} elseif (($this->imageHeight * $widthRatio)>$height) {
				$endWidth = ceil($this->imageWidth * $heightRatio);
				$endHeight = $height;
			} else {
				$endWidth = $width;
				$endHeight = ceil($this->imageHeight * $widthRatio);
			}
			break;
		case 2:
			$endWidth = $width;
			$endHeight = ceil($this->imageHeight * $widthRatio);
			break;
		case 3:
			$endWidth = ceil($this->imageWidth * $heightRatio);
			$endHeight = $height;
			break;
		case 4:
			$endWidth2 = $width;
			$endHeight2 = $height;
			if ($this->imageHeight < $height && $this->imageWidth < $width) {
				$endWidth = $this->imageWidth;
				$endHeight = $this->imageHeight;
				//return;
			} elseif (($this->imageHeight * $widthRatio)<$height) {
				$endWidth = ceil($this->imageWidth * $heightRatio);
				$endHeight = $height;
			} else {
				$endWidth = $width;
				$endHeight = ceil($this->imageHeight * $widthRatio);
			}
			break;
		default:
			$endWidth = $width;
			$endHeight = $height;
			break;
		}
		if ($this->imageResource==NULL) {
			$this->createSrcImage();
		}
		if ($flag==4) {
			$this->newResource = imagecreatetruecolor($endWidth2,$endHeight2);
		} else {
			$this->newResource = imagecreatetruecolor($endWidth,$endHeight);
		}
		$this->newResType = $this->imageType;
		imagecopyresampled($this->newResource, $this->imageResource, 0, 0, 0, 0, $endWidth, $endHeight,$this->imageWidth,$this->imageHeight);
		
	}
	
	/**
	 * ��ͼ���ˮӡ
	 * @param string $waterContent ˮӡ���ݿ�����ͼ���ļ�����Ҳ����������
	 * @param int $pos λ��0-9����������
	 * @param int $textFont ������֣���ˮӡ����������ʱ��Ч
	 * @param string $textColor ������ɫ����ˮӡ����������ʱ��Ч
	 * @return string
	 */
	public function waterMark($waterContent, $pos = 0, $textFont=5, $textColor="#ffffff") {
		$isWaterImage = file_exists($waterContent);
		if ($isWaterImage) {
			$waterImgRes = $this->createImageFromFile($waterContent);
			$waterImgInfo = $this->getImageInfo($waterContent);
			$waterWidth = $waterImgInfo[0];
			$waterHeight = $waterImgInfo[1];
		} else {
			$waterText = $waterContent;
			//$temp = @imagettfbbox(ceil($textFont*2.5),0,"./cour.ttf",$waterContent);
			if ($temp) {
				$waterWidth = $temp[2]-$temp[6];
				$waterHeight = $temp[3]-$temp[7];
			} else {
				$waterWidth = 100;
				$waterHeight = 12;
			}
		}
		if ($this->imageResource==NULL) {
			$this->createSrcImage();
		}
		switch($pos) 
		{ 
		case 0://��� 
			$posX = rand(0,($this->imageWidth - $waterWidth)); 
			$posY = rand(0,($this->imageHeight - $waterHeight)); 
			break; 
		case 1://1Ϊ���˾��� 
			$posX = 0; 
			$posY = 0; 
			break; 
		case 2://2Ϊ���˾��� 
			$posX = ($this->imageWidth - $waterWidth) / 2; 
			$posY = 0; 
			break; 
		case 3://3Ϊ���˾��� 
			$posX = $this->imageWidth - $waterWidth; 
			$posY = 0; 
			break; 
		case 4://4Ϊ�в����� 
			$posX = 0; 
			$posY = ($this->imageHeight - $waterHeight) / 2; 
			break; 
		case 5://5Ϊ�в����� 
			$posX = ($this->imageWidth - $waterWidth) / 2; 
			$posY = ($this->imageHeight - $waterHeight) / 2; 
			break; 
		case 6://6Ϊ�в����� 
			$posX = $this->imageWidth - $waterWidth; 
			$posY = ($this->imageHeight - $waterHeight) / 2; 
			break; 
		case 7://7Ϊ�׶˾��� 
			$posX = 0; 
			$posY = $this->imageHeight - $waterHeight; 
			break; 
		case 8://8Ϊ�׶˾��� 
			$posX = ($this->imageWidth - $waterWidth) / 2; 
			$posY = $this->imageHeight - $waterHeight; 
			break; 
		case 9://9Ϊ�׶˾��� 
			$posX = $this->imageWidth - $waterWidth-20; 
			$posY = $this->imageHeight - $waterHeight-10; 
			break; 
		default://��� 
			$posX = rand(0,($this->imageWidth - $waterWidth)); 
			$posY = rand(0,($this->imageHeight - $waterHeight)); 
			break;     
		}
		imagealphablending($this->imageResource, true);  
		if($isWaterImage) {
			imagecopy($this->imageResource, $waterImgRes, $posX, $posY, 0, 0, $waterWidth,$waterHeight);    
		} else { 
			$R = hexdec(substr($textColor,1,2)); 
			$G = hexdec(substr($textColor,3,2)); 
			$B = hexdec(substr($textColor,5)); 
			
			$textColor = imagecolorallocate($this->imageResource, $R, $G, $B);
			imagestring ($this->imageResource, $textFont, $posX, $posY, $waterText, $textColor);         
		}
		$this->newResource =  $this->imageResource;
		$this->newResType = $this->imageType;
	}
	
	/**
	 * ������֤��ͼƬ
	 * @param int $width ��
	 * @param string $height ��
	 * @param int $length ����
	 * @param int $validType 0=����,1=��ĸ,2=���ּ���ĸ
	 * @param string $textColor ������ɫ
	 * @param string $backgroundColor ������ɫ
	 * @return void
	 */
	public function imageValidate($width, $height, $length = 4, $validType = 1, $textColor = '#000000', $backgroundColor = '#ffffff') {
		if ($validType==1) {
			$validString = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$validLength = 52;
		} elseif ($validType==2) {
			$validString = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$validLength = 62;
		} else {
			$validString = '0123456789';
			$validLength = 10;
		}
		
		srand((int)time());
		$valid = '';
		for ($i=0; $i<$length; $i++) {
			$valid .= $validString{rand(0, $validLength-1)};
		}
		$this->newResource = imagecreate($width,$height);
		$bgR = hexdec(substr($backgroundColor,1,2));
		$bgG = hexdec(substr($backgroundColor,3,2));
		$bgB = hexdec(substr($backgroundColor,5,2));
		$backgroundColor = imagecolorallocate($this->newResource, $bgR, $bgG, $bgB);
		$tR = hexdec(substr($textColor,1,2));
		$tG = hexdec(substr($textColor,3,2));
		$tB = hexdec(substr($textColor,5,2));
		$textColor = imagecolorallocate($this->newResource, $tR, $tG, $tB);
		for ($i=0;$i<strlen($valid);$i++){ 
			imagestring($this->newResource,5,$i*$width/$length+3,2, $valid[$i],$textColor); 
		}
		$this->newResType = IMAGETYPE_JPEG;
		return $valid;

	}
	
	/**
	 * ��ʾ���ͼ��
	 * @return void
	 */
	public function display($fileName='', $quality=100) {
	
		$imgType = $this->newResType;
		$imageSrc = $this->newResource;
        switch ($imgType) {
		case IMAGETYPE_GIF:
			if ($fileName=='') {
				header('Content-type: image/gif');
			}
			imagegif($imageSrc, $fileName, $quality);
			break;
		case IMAGETYPE_JPEG:
			if ($fileName=='') {
				header('Content-type: image/jpeg');
			}
			imagejpeg($imageSrc, $fileName, $quality);
			break;
		case IMAGETYPE_PNG:
			if ($fileName=='') {
				header('Content-type: image/png');
				imagepng($imageSrc);
			} else {
				imagepng($imageSrc, $fileName);
			}
			break;
		case IMAGETYPE_WBMP:
			if ($fileName=='') {
				header('Content-type: image/wbmp');
			}
			imagewbmp($imageSrc, $fileName, $quality);
			break;
		case IMAGETYPE_XBM:
			if ($fileName=='') {
				header('Content-type: image/xbm');
			}
			imagexbm($imageSrc, $fileName, $quality);
			break;
		default:
			throw new Exception('Unsupport image type');
        }
		imagedestroy($imageSrc);
	}
	
	/**
	 * ����ͼ��
	 * @param int $fileNameType �ļ������� 0ʹ��ԭ�ļ�����1ʹ��ָ�����ļ�����2��ԭ�ļ������Ϻ�׺��3��������ļ���
	 * @param string $folder �ļ���·�� Ϊ��Ϊ��ԭ�ļ���ͬ
	 * @param string $param ����$fileNameTypeΪ1ʱΪ�ļ���2ʱΪ��׺
	 * @return void
	 */
	public function save($fileNameType = 0, $folder = NULL, $param = '_miniature') {
		if ($folder==NULL) {
			$folder = dirname($this->fileName).DIRECTORY_SEPARATOR;
			
		}
		$fileExtName = FileSystem::fileExt($this->fileName, true);
		$fileBesicName = FileSystem::getBasicName($this->fileName, false);
		switch ($fileNameType) {
		case 1:
			$newFileName = $folder;
//			var_dump($folder.$fileBesicName.$fileExtName);
			break;
		case 2:
			$newFileName = $folder.$fileBesicName.$param.$fileExtName;
			break;
		case 3:
			$tmp = date('YmdHis');
			$fileBesicName = $tmp;
			$i = 0;
			while (file_exists($folder.$fileBesicName.$fileExtName)) {
				$fileBesicName = $tmp.$i;
				$i++;
			}
			$newFileName = $folder.$fileBesicName.$fileExtName;
			break;
		default:
			$newFileName = $this->fileName;
			break;
		}
		$this->display($newFileName);
		return $newFileName;
	}
}
?>