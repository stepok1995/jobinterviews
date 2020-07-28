<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\TSaurImage;

class UploadFormSaurFile extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
public $cstrong=NULL;
    public function rules()
    {
        return [
            [['imageFiles'], 'default', 'value' => null],
        ];
    }

    public function upload($per)
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
				$image = new TSaurImage();
				$image->name='/'.$path;
				//$image->id=$id;
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
