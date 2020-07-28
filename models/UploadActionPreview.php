<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\TAction;

class UploadActionPreview extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
public $cstrong=NULL;
    public function rules()
    {
        return [	     [['imageFiles'], 'default', 'value' => null],
            // [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'maxFiles' => 10],
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
				$image = TAction::findOne($id);
				$image->img_preview='/'.$path;
				//$image->action_id=$id;
				$image->save();
                $file->saveAs($path);
            }
          //  return true;
        } 
		}
		else {
            return false;
        }
		
    }
}
