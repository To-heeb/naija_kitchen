<?php namespace App\Models;



use CodeIgniter\Model;



class SettingsEmailTemplate extends Model

{
    protected $table = 'settings_email_template';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = false;
    protected $returnType = "object";
    protected $allowedFields = ["title","subject","email_body"];
    protected $useTimestamps = true;


}