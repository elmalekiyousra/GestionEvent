<?php



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');



//Event
use app\Http\Controllers\EventController;
Route::auth();
Route::get('/event', 'EventController@index')->name('events.cat');
//Route::get('/event', 'EventController@show')->name('events.show');
Route::get('/event/details/{id}', 'EventController@show')->name('events.show');
//Route::get('/event/details/{id}', 'EventController@store')->name('events.store');
Route::get('/addevent', 'EventController@create')->name('events.create');
Route::post('/event/insert', 'EventController@insert')->name('events.insert');
Route::resource('events', 'EventController');
Route::get('/event/edit/{id}', array('as'=>'events.edit','uses'=>'EventController@edit'));
Route::post('/event/update/{id}', array('as'=>'events.update','uses'=>'EventController@update'));
Route::get('/event/delete/{id}', 'EventController@destroy')->name('events.destroy');

Route::get('/searche','EventController@search')->name('events.search');



/*Route::post ( '/search', function () {
	$q = Input::get ( 'q' );
	if($q != ""){
		$events = Event::where ( 'nom', 'LIKE', '%' . $q . '%' )
		         ->get ()->first();
		if (count ( $events ) > 0)
			return view ( 'events.details', ['events' => $events])->withDetails ( $events )->withQuery ( $q );
		else
		
			 return Redirect::back()->with('alert','Not found');
	}
	return Redirect::back()->with('alert','Veuillez saisir   valide...');
} );*/






//Conference
Route::auth();
Route::get('/conference', 'ConferenceController@index')->name('conferences.index');

Route::get('/conference/details/{id}', 'ConferenceController@show')->name('conferences.show');

Route::get('/addconference', 'ConferenceController@create')->name('conferences.create');
Route::post('/conference/insert', 'ConferenceController@insert')->name('conferences.insert');
Route::resource('conferences', 'ConferenceController');
Route::get('/conference/edit/{id}', array('as'=>'conferences.edit','uses'=>'ConferenceController@edit'));
Route::post('/conference/update/{id}', array('as'=>'conferences.update','uses'=>'ConferenceController@update'));
Route::get('/conference/delete/{id}', 'ConferenceController@destroy')->name('conferences.destroy');
Route::get('/rechercher','ConferenceController@search');
Route::get('/search','ConferenceController@search')->name('conferences.search');


//Competition
Route::auth();
Route::get('/competition', 'CompetitionController@index')->name('competitions.index');
//Route::get('/event', 'EventController@show')->name('events.show');
Route::get('/competition/details/{id}', 'CompetitionController@show')->name('competitions.show');
//Route::get('/event/details/{id}', 'EventController@store')->name('events.store');
Route::get('/addcompetition', 'CompetitionController@create')->name('competitions.create');
Route::post('/competition/insert', 'CompetitionController@insert')->name('competitions.insert');
Route::resource('competitions', 'CompetitionController');
Route::get('/competition/edit/{id}', array('as'=>'competitions.edit','uses'=>'CompetitionController@edit'));
Route::post('/competition/update/{id}', array('as'=>'competitions.update','uses'=>'CompetitionController@update'));
Route::get('/competition/delete/{id}', 'CompetitionController@destroy')->name('competitions.destroy');
Route::get('/searchc','CompetitionController@search')->name('competitions.search');



//Soiree
Route::auth();
Route::get('/soiree', 'SoireeController@index')->name('soirees.index');
//Route::get('/event', 'EventController@show')->name('events.show');
Route::get('/soiree/details/{id}', 'SoireeController@show')->name('soirees.show');
//Route::get('/event/details/{id}', 'EventController@store')->name('events.store');
Route::get('/addsoiree', 'SoireeController@create')->name('soirees.create');
Route::post('/soiree/insert', 'SoireeController@insert')->name('soirees.insert');
Route::resource('soirees', 'SoireeController');
Route::get('/soiree/edit/{id}', array('as'=>'soirees.edit','uses'=>'SoireeController@edit'));
Route::post('/soiree/update/{id}', array('as'=>'soirees.update','uses'=>'SoireeController@update'));
Route::get('/soiree/delete/{id}', 'SoireeController@destroy')->name('soirees.destroy');
Route::get('/searchs','SoireeController@search')->name('soirees.search');


//Programme
Route::auth();
Route::get('/programme', 'ProgrammeController@index')->name('programmes.index');
//Route::get('/event', 'EventController@show')->name('events.show');
Route::get('/programme/details/{id}', 'ProgrammeController@show')->name('programmes.show');
//Route::get('/event/details/{id}', 'EventController@store')->name('events.store');
Route::get('/addprogramme', 'ProgrammeController@create')->name('programmes.create');
Route::post('/programme/insert', 'ProgrammeController@insert')->name('programmes.insert');
Route::resource('programmes', 'ProgrammeController');
Route::get('/programme/edit/{id}', array('as'=>'programmes.edit','uses'=>'ProgrammeController@edit'));
Route::post('/programme/update/{id}', array('as'=>'programmes.update','uses'=>'ProgrammeController@update'));
Route::get('/programme/delete/{id}', 'ProgrammeController@destroy')->name('programmes.destroy');
Route::get('/searchp','ProgrammeController@search')->name('programmes.search');


