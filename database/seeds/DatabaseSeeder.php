<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
		/*
    		Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
			$table->integer('categoria');		
			$table->softDeletes();
            $table->timestamps();
        });
		
    		Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
			$table->softDeletes();
            $table->timestamps();
        });
		
    		Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo1');
			$table->integer('equipo2');
			$table->integer('ordre');
			$table->integer('grupo');
			$table->string('dia');
			$table->string('hora');
			$table->string('campo');
			$table->integer('categoria');
			$table->softDeletes();
            $table->timestamps();
        });
		
    		Schema::create('grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('titulo');
			$table->integer('categoria');
			$table->softDeletes();
            $table->timestamps();
        });
		
    		Schema::create('grupo_partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
			$table->integer('partido');
			$table->integer('grupo');
			$table->integer('categoria');
			$table->integer('jornada');
			$table->softDeletes();
            $table->timestamps();
        });
		
    		Schema::create('grupo_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
			$table->integer('equipo');
			$table->integer('grupo');
			$table->integer('categoria');
			$table->softDeletes();
            $table->timestamps();
        });
		
		
    		Schema::create('ranking', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria');
			$table->string('grupo');
			$table->string('equipo1');
			$table->string('equipo2');			
			$table->string('PJ');
			$table->string('PG');
			$table->string('PE');
			$table->string('PP');
			$table->string('GF');
			$table->string('GC');
			$table->string('PTS');
			$table->string('MAS_MENOS');
			$table->softDeletes();
            $table->timestamps();
        });
		*/
    }
}
