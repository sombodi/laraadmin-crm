<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/* ================== Home page lead Horm  ================== */
Route::post('store_lead_form_1', 'LA\LeadsController@store_lead_form_1');

/* ================== Test ElasticSearch ================== */

Route::get('search/{query}', function ($query) {
	echo "<br>Query: ".$query."<br><br><br>";
    $orgs = \App\Models\Organization::search($query);
	if($orgs->totalHits()) {
		foreach ($orgs as $org) {
			echo $org->name."(".$org->documentScore().")<br>";
		}
	} else {
		echo "No result";
	}
	echo "<br>totalHits: ".$orgs->totalHits()."<br>";
	echo "<br>maxScore: ".$orgs->maxScore()."<br>";
	echo "<br>took: ".$orgs->took()."<br>";
});

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
