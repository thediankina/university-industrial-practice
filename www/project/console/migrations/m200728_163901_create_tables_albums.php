<?php

use yii\db\Migration;

/**
 * Class m200728_163901_create_tables_albums
 */
class m200728_163901_create_tables_albums extends Migration
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
        
        $this->insert('album', [
            'id' => 1,
            'name' => 'My first album',
        ]);
        
        $this->insert('album', [
            'id' => 2,
            'name' => 'My second album',
        ]);
    }
    
    private function createAlbumsToUsers()
    {
        $this->createTable('album_to_user', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
        
        $this->insert('album_to_user', [
            'id' => 1,
            'album_id' => 1,
            'user_id' => 1,
        ]);
        
        $this->insert('album_to_user', [
            'id' => 2,
            'album_id' => 2,
            'user_id' => 2,
        ]);
    }
    
    private function createPhotos()
    {
        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'name' => $this->string(),
        ]);
        
        $this->insert('photo', [
            'id' => 1,
            'album_id' => 1,
            'name' => 'test_photo_1.jpg',
        ]);
        
        $this->insert('photo', [
            'id' => 2,
            'album_id' => 1,
            'name' => 'test_photo_2.jpg',
        ]);
        
        $this->insert('photo', [
            'id' => 3,
            'album_id' => 1,
            'name' => 'test_photo_3.jpg',
        ]);
        
        $this->insert('photo', [
            'id' => 4,
            'album_id' => 1,
            'name' => 'test_photo_4.jpg',
        ]);
    }
}
