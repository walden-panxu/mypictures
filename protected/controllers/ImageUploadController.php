<?php 
/**
 * ImageUploadController类文件，实现图片上传
 *
 * @author pan <panxuzhengxuxin@gmail.com>
 * @package application.controllers
 * @since 1.0
 */
 
class ImageUploadController extends CController
{
	



	/**
	 * 上传页面的视图
	 * 
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->renderPartial('upload');
	}

	/**
	 * 实现图片的缩放
	 *
	 *	
	 */
	public function actionImage()
	{
		include("Images.php");	
		$fileName=$_POST['url'];
		copy('F:/picture/upload/'.$fileName, 'E:/phpweb/myphoto/images/cy_'.$fileName);
		$image=new Images();
		$source='images/cy_'.$fileName;
		$pre=0.2;
		$newfile='images/new_'.$fileName;
		$image->thumn($source,$pre,$newfile);
		echo $newfile;
	}

	/**
	 * 实现图片上传
	 */
	public function actionUpload()
	{
		//遍历图片数组
		for($i=0; $i <count($_FILES['image']['name']) ; $i++) 
		{ 
			
			
			$userId="20131110191822001";
			$destDir='images/';
			$imageClass="n";
			$image=new ImagesDao($userId,$destDir.$_FILES['image']['name'][$i],$imageClass);
			
			if($image->save())
			{
				if(is_uploaded_file($_FILES['image']['tmp_name'][$i]))
				{
					if(move_uploaded_file($_FILES['image']['tmp_name'][$i], $destDir.$_FILES['image']['name'][$i]))
					{
						$this->renderPartial('success');
					}
					else
					{
						$this->renderPartial('error');
					}
				}
				else
				{
					$this->renderPartial('error');
				}
			}
		}
	}
	
}
 ?>