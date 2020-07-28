<?php
namespace app\models;

use Yii;
use yii\base\Model;
 
class MyForm extends Model
{
	public $name;
	public $mail;
	
	public function rules()
	{
		return [
		[['name','mail'],'required'],
		['mail','email']
		];
	}
}
?>