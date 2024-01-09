<?php

namespace common\models;

use yii\web\HttpException;

class UploadsImage
{
    /**
     * Upload model
     *
     * @property object $getModel // Any model
     * @property object $uploadedFile //UploadedFile::getInstance($model, 'attr')
     * @property filePathName $pathName // imagePathName
     * @throws HttpException
     */
    public static function uploadImage($getModel, $uploadedFile, $pathName)
    {

        $model = $getModel;
        if (!$model) throw new HttpException(500, 'Object is not found!');
        if (!$uploadedFile) throw new HttpException(500, 'files are not found!');

        if ($uploadedFile->tempName) {
            $model->imageFile = $uploadedFile;
            if ($model->validate(['file'])) {
                $dir = \Yii::getAlias("@frontend/web/uploads/$pathName/");
                if (!file_exists($dir)) {     //check if dir already exists
                    mkdir($dir, 0777, true);  //make dir ,give permissions
                }
                $name = $pathName . '_' . date('d-m-Y-H-i-s');
                $fileName = $name;//$uploadedFile->name;
                $model->imageFile->saveAs($dir . $fileName);
                $model->imageFile = $fileName;
                return $fileName;
            }
        } else {
            throw new HttpException(500, 'Can not find uploaded file');
        }

    }

    /*public static function uploadImage($type, $getModel, $uploadedFile, $pathName)
    {

        $model = $getModel;
        if ($type === 0 and is_array($uploadedFile)){
            throw new HttpException(500,'Uploaded File Shouldn\'t Be Array');
        }
        if (!$model) {
            throw new HttpException(500, 'Object is not found!');
        }
        if (!$uploadedFile) {
            throw new HttpException(500, 'files are not found!');
        }
        if ($type === 0) {
            if ($uploadedFile && $uploadedFile->tempName) {
                $model->imageFile = $uploadedFile;
                if ($model->validate(['file'])) {
                    $dir = \Yii::getAlias("../../frontend/web/uploads/$pathName/");
                    if (!file_exists($dir)) {     //check if dir already exists
                        mkdir($dir, 0777, true);  //make dir ,give permissions
                    }
                    $name = time();
                    $fileName = $name . '.' . $model->imageFile->extension;
                    $model->imageFile->saveAs($dir . $fileName);
                    $model->imageFile = $fileName;
                    $model->image = $fileName;
                }
                $model->save();
                return true;
            }
        } elseif ($type === 1) {
            foreach ($uploadedFile as $item) {
                if ($item && $item->tempName) {
                    $model->imageFile = $item;
                    if ($model->validate(['file'])) {
                        $dir = \Yii::getAlias("../../frontend/web/uploads/$pathName/");
                        if (!file_exists($dir)) {     //check if dir already exists
                            mkdir($dir, 0777, true);  //make dir ,give permissions
                        }
                        $name = $item->name;
                        $fileName = $name;
                        $model->imageFile->saveAs($dir . $fileName);
                        $model->imageFile = $fileName;
                        $model->image = $fileName;
                    }
                    $model->save(false);
                }
            }
            return true;
        } else {
            throw new HttpException(500, 'Incorrect uploads type!');
        }
    }*/
}