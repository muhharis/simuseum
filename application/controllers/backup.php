<?php if(! defined('BASEPATH')) exit ('no direct access allowed');
 
class backup extends CI_controller{
 /*
* File          : Klinik2.php
* Language      : PHP
* Package       : CodeIgniter 3.0
* Location      : application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author        : MuhHaris
* Email         :muhharis90@yahoo.com
* HP            : 089-537-625-7021
*/
// ------------------------------------------------------------------------
 
        public  function backupklinik(){
        // Load Clas Utilitas Database
        $this->load->dbutil();
 
        // nyiapin aturan untuk file backup
        $aturan = array(    
                'format'      => 'zip',            
                'filename'    => 'db_klinik.sql'
              );
 
 
        $backup =& $this->dbutil->backup($aturan);
 
        $nama_database = 'db-klinik-on-'. date("Y-m-d-H-i-s") .'.zip';
        $simpan = 'E:\dataweb\klinik\backup_db\ '.$nama_database;
 
        $this->load->helper('file');
        write_file($simpan, $backup);
 
 
        $this->load->helper('download');
        force_download($nama_database, $backup);
        }
       
}