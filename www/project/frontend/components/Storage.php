<?php

namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * File storage component
 */
class Storage extends Component implements StorageInterface {
    
    private $fileName;
    
    /**
     * Save given uploaded file instance to disk
     * @param UploadedFile $file
     * @return string|null
     */
    public function saveUploadedFile(UploadedFile $file) {
        
        $path = $this->preparePath($file);
        
        if($path && $file->saveAs($path)){
            return $this->fileName;
        }
    }
    
    /**
     * Prepare path to save uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function preparePath(UploadedFile $file) {
        
        $this->fileName = $this->getFileName($file);
        
        $path = $this->getStoragePath().$this->fileName;
        
        $path = FileHelper::normalizePath($path);
        if (FileHelper::createDirectory(dirname($path))) {
            return $path;
        }
    }
    
    /**
     * Create filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function getFilename(UploadedFile $file) {

        $hash = sha1_file($file->tempName);

        $name = substr_replace($hash, '/', 2, 0);
        $name = substr_replace($hash, '/', 5, 0);
        return $name.'.'.$file->extension;
    }
    
    /**
     * Get path to uploads
     * @return string
     */
    protected function getStoragePath() {
        
        return Yii::getAlias(Yii::$app->params['storagePath']);
    }
    
    /**
     * Get filename from uploads
     * @param string $filename
     * @return string
     */
    public function getFile(string $filename) {
        
        return Yii::$app->params['storageUri'].$filename;
    }
}