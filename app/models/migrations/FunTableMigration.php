<?php

use Illuminate\Database\Capsule\Manager as Migration;

class FunTableMigration  extends Migration
{

    // public function __construct()
    // {
    //     self::schema()->dropIfExists('fun');
    // }
    public static function handle()
    {
        self::schema()->dropIfExists('fun');
        self::schema()->create('fun', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('userimage')->nullable();
            $table->string('api_key')->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
