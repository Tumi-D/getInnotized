<?php


use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{

    protected $table = "services";
    protected $primaryKey = 'serviceid';
    protected $guarded = [];
    const TABLENAME = 'services';
}
