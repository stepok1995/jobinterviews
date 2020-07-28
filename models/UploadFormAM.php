<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\TAfishaMonth;

class UploadFormAM extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
public $cstrong=NULL;
    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'maxFiles' => 10],
        ];
    }

    public function upload($per)
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file)
			{
				while($cstrong==NULL)
				{
				$bytes=openssl_random_pseudo_bytes(20,$cstrong);
				}
				$hex= bin2hex($bytes);
				$path=$per . /*$file->baseName */$hex.uniqid(). '.' . $file->extension;
				$image = new TAfishaMonth();
				$image->name='/'.$path;
				//$image->id=$id;
				$image->save();
                $file->saveAs($path);
            }
            return true;
        } else {
            return false;
        }
    }
}
