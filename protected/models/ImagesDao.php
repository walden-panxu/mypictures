<?php 
/**
 *  ImagesDao类是一个图片数据持久化类
 *  @author pan <panxuzhengxuxin@gmail.com> 
 *  @package application.models 
 *  @since 1.0 
 *
 */
class ImagesDao 
{
	private $_userId;
	private $_url;
	private $_imagesClass;
	function __construct($userId,$url,$imagesClass)
	{
		$this->_userId=$userId;
		$this->_url=$url;
		$this->_imagesClass=$imagesClass;
	}
	public function getCommand()
	{
		$sql="insert into imagesInfo(userId,url,imagesClass) values(:userId,:url,:imagesClass)";
		$command=Yii::app()->db->createCommand($sql);
		$command->bindParam(':userId',$this->_userId);
		$command->bindParam(':url',$this->_url);
		$command->bindParam(':imagesClass',$this->_imagesClass);
		return $command;
	}
	public function save()
	{
		$command=$this->getCommand();
		$res=$command->execute();
		if($res>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
 ?>