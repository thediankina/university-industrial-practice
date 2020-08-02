<?php

use yii\db\Migration;

/**
 * Class m200802_171413_create_tables_for_gallery
 */
class m200802_171413_create_tables_for_gallery extends Migration
{
     public function up()
    {
        $this->createAlbums();
        $this->createAlbumsToUsers();
        $this->createPhotos();
    }

    public function down()
    {
        $this->dropTable('album');
        $this->dropTable('album_to_user');
        $this->dropTable('photo');
    }
    
    private function createAlbums()
    {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'preview' => $this->string(),
            'number_of_photos' => $this->integer(),
        ]);
    }
    
    private function createAlbumsToUsers()
    {
        $this->createTable('album_to_user', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }
    
    private function createPhotos()
    {
        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'name' => $this->string(),
        ]);
    }
}
