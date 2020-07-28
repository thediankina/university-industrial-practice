<?php

use yii\db\Migration;

/**
 * Class m200728_094819_create_tables_albums
 */
class m200728_094819_create_tables_albums extends Migration
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
        
        echo "m200728_094819_create_tables_albums cannot be reverted.\n";
        
        return false;
    }
    
    private function createAlbums() {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }
    
    private function createAlbumsToUsers() {
        $this->createTable('album_to_user', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }
    
    private function createPhotos() {
        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'url' => $this->string()
        ]);
    }
}
