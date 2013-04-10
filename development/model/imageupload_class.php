<?php 
require_once SITEPATH.'model/model.php';
class ImageUpload
{
	private $image_id;
	private $image;
	
	public function getImage_id() {
		return $this->image_id;
	}
	public function setImage_id($image_id) {
		$this->image_id = $image_id;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
	}
	public function upload($image)
	{
	
		$obj=new MyModel();
		$result=$obj->uploadImage($image);
return $result;
	}
	public function ImageUploadProperty($image,$id)
	{
	
		$obj=new MyModel();
		$result=$obj->uploadImageProperty($image,$id);
		return $result;
	}
	
}


?>