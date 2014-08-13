<?php

namespace Drupal\hello_file\Controller;
use Drupal\file\Entity\File;
use Drupal\Core\Entity\EntityStorageInterface;

class HelloFileController implements HelloFileInterface {
  public function getBaseName() {
    $file = 'http://3.bp.blogspot.com/-LwxfC6KTXxI/UVkmu75eWQI/AAAAAAAAGLw/j4nm1t60nfs/s1600/morning+nature+wallpaper.jpg';
    return drupal_basename($file);
    //echo morning+nature+wallpaper.jpg
  }

  public function dirname() {
    $directory = 'http://3.bp.blogspot.com/-LwxfC6KTXxI/UVkmu75eWQI/AAAAAAAAGLw/j4nm1t60nfs/s1600/morning+nature+wallpaper.jpg';
    return drupal_dirname($directory);
    //echo http://3.bp.blogspot.com/-LwxfC6KTXxI/UVkmu75eWQI/AAAAAAAAGLw/j4nm1t60nfs/s1600/
  }

  public function chmod() {
    $directory = 'public://test';
    return drupal_chmod($directory);
  }

  public function commandFile() {
    // *** create folder
    // $directory = 'public://tmp';
    // return drupal_mkdir($directory);
    //
    // **** create folder
    // ensure read and write files
    // $folder = 'public://color';
    // file_prepare_directory($folder, FILE_CREATE_DIRECTORY);
    //
    // **** remove folder
    // $directory = 'public://test';
    // drupal_rmdir($directory);

    // **** extract path
    // $directory = 'public://test1';
    // drupal_realpath('public://field/image/h1.jpg')
    // /var/www/d8v1.com/sites/default/files/field/image/h1.jpg
    //
    // **** extract path allow website
    // $uri = 'public://test1';
    // return file_create_url($uri);
    // http://d8v1.com/sites/default/files/test1
    //
    // ***** transform relative file
    // return file_url_transform_relative('http://d8v1.com/sites/default/files/test1');
    // echo /sites/default/files/test1
    //
    // **** create file temp
    // $directory = 'public://tmp/';
    // $prefix = 'my';
    // $file =  drupal_tempnam($directory, $prefix);
    //
    // **** file build uri
    // $file = 'temp/h1.jpg';
    // return file_build_uri($file);
    // public://temp/h1.jpg
    //
    // ****** copy file
    // file_unmanaged_copy, do not effect database
    // Copies a file to a new location without invoking the file API.
    //
    // ***** remove file
    // myDwwziA is created in public
    // remove myDwwziA in public://
    // $file = 'myDwwziA'
    // return drupal_unlink($file);
    // file_unmanaged_delete (same drupal_unlink)
    //
    // ***** move file (copy and delete file)
    // file_unmanaged_move
    //
    // ****** create string file
    // $file = 'xyz.txt';
    // $directory = '/sites/default/files/tmp';
    // return file_create_filename($file, $directory);
    // echo string /sites/default/files/tmp/xyz.txt
    //
    // ******* get schema file
    // return file_default_scheme();
    // echo public
    //
    // ******** delete file by fid
    // relative database
    // $fid = 2;
    // return file_delete($fid);
    // deleted file with fid = 2
    //
    // ********* delete mutil files
    // file_delete_multiple(array $fids)
    // First test for non-existent file.
    //
    // ********* return Temporary directory in computer
    // return file_directory_os_temp();
    // echo tmp
    // find by command: cd /tmp/
    //
    // ********* return Temporary directory
    // return file_directory_temp();
    // echo /tmp
    //
    // ********* if they do not have htaccess file
    // they will be created a .htaccess file
    // return file_ensure_htaccess();
    // create a file htaccess if public:// or private:// do not have
    //
    // ********* return field relate
    // $file = File::load(7);
    // var_dump(file_get_file_references($file, NULL, EntityStorageInterface::FIELD_LOAD_REVISION, NULL));
    //
    // ********* return mimetype
    // return file_get_mimetype('h1.dpf');
    // echo application/octet-stream
    // return file_get_mimetype('h1.jpg');
    // echo image/jpeg
    //
    // *********** create public:// private folder
    // file_get_stream_wrappers()
    // https://api.drupal.org/api/drupal/core%21modules%21system%21system.api.php/function/hook_stream_wrappers/8
    //
    // *********** scan file (search file)
    // eg: seach file xxxbeautyxxx, public:// is folder to begin search
    // var_dump(file_scan_directory('public://', '/.*beauty.*/'));
    //
    // *********** get_class scheme
    // return file_stream_wrapper_get_class('public');
    // echo Drupal\Core\StreamWrapper\PublicStream
    //
    // *********** get target file
    // $uri = 'public://field/image/h1.jpg';
    // return file_uri_target($uri);
    // echo field/image/h1.jpg
    return 'learn about file api drupal 8';
  }



}
