<?php

namespace Drupal\hello_query\Controller;
/*
 * learn database.inc
 * Core systems for the database layer.
 */
class HelloQueryController {

  /*
   * /query/create_table/{table_name}
   * /query/create_table/abc
   * add schema default (des, fn, ln)
   */
  public function createTable($table_name) {
    //  module_load_install('system');
    // var_dump($schema = system_schema());
    if (db_table_exists($table_name)) {
      return 'exists ' . $table_name . ' table';
    }

    $module = 'hello_query';
    // get schema hello_query_schema
    $schema = drupal_get_schema_unprocessed($module);
    db_create_table($table_name, $schema['hello_query']);
    return 'created table ' . $table_name;
  }

  /*
   * /query/drop_table/{table_name}
   * /query/drop_table/abc
   */
  public function dropTable($table_name) {
    // db_drop_table($table_name);
    db_truncate($table_name);
    return 'dropped table ' . $table_name;
  }

  /*
   * /query/create_row/{table_name}/?des=abc&fn=phuong&ln=ocditimban
   * /query/create_row/abc/?des=abc&fn=phuong&ln=ocditimban
   */
  public function createRow($table_name) {
    $query = \Drupal::request()->query;
    $des = $query->get('des');
    $fn =  $query->get('fn');
    $ln =  $query->get('ln');

    db_insert($table_name)->fields(array(
      'des' => $des,
      'fname' => $fn,
      'lname' => $ln,
    ))->execute();
    return 'Create Row Successful';
  }

  /*
   * /query/edit_row/{table_name}/?des=abc&fn=phuong&ln=ocditimban
   * /query/edit_row/abc/?des=abc&id=1fn=phuong&ln=ocditimban
   */
  public function editRow($table_name) {
    $query = \Drupal::request()->query;
    $id =  $query->get('id');
    $des = $query->get('des');
    $fn =  $query->get('fn');
    $ln =  $query->get('ln');

    db_update($table_name)
      ->condition('id', $id)
      ->fields(array(
        'des' => $des,
        'fname' => $fn,
        'lname' => $ln,
      ))
      ->execute();
    return 'Edit Row Successful';
  }

  /*
   * /query/delete_row/{table_name}/?des=abc&fn=phuong&ln=ocditimban
   * /query/delete_row/abc/?des=abc&id=3
   */
  public function deleteRow($table_name) {
    $query = \Drupal::request()->query;
    $id =  $query->get('id');

    db_delete($table_name)
      ->condition('id', $id)
      ->execute();
    return 'Delete Row Successful';
  }

}
