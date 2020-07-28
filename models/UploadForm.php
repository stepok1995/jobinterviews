<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\TExpoImage;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
public $cstrong=NULL;
    public function rules()
    {
  return [   [['imageFiles'], 'default', 'value' => null],
   ];
    }

    public function upload($per,$id)
    {
        if ($this->validate()) {
		if($this->imageFiles == '')
		{
			return true;
		}
		else{
            foreach ($this->imageFiles as $file)
			{
				while($cstrong==NULL)
				{
				$bytes=openssl_random_pseudo_bytes(20,$cstrong);
				}
				$hex= bin2hex($bytes);
				$path=$per . /*$file->baseName */$hex.uniqid(). '.' . $file->extension;
				$image = new TExpoImage();
				$image->name='/'.$path;
				$image->expo_id=$id;
				$image->save();
                $file->saveAs($path);
            }
            return true;
        } 
		}
		else {
            return false;
        }
    }
}
