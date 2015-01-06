<?php
use Goutte\Client;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function fb()
	{
		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/');


		//$crawler = $client->click($crawler->selectLink('Inscribirse')->link());
		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'strong.10'));


		// $crawler = $client->click($crawler->selectLink('Harry Keyber')->link());
		// $crawler = $client->click($crawler->selectLink('¿Qué estás pensando?')->link());

		$form = $crawler->selectButton('Publicar')->form();
		$crawler = $client->submit($form, array('xc_message' => 'No se dice diglesica, se dice dislexica'));
		dd($crawler->html());
		//$crawler = $client->click($crawler->selectButton('Actualizar estado'));
		//$form = $crawler->selectButton('Actualizar estado')->form();
	}

	public function grupo(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/groups/211205422237054/');

		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'strong.10'));
		$form = $crawler->selectButton('Publicar')->form();
		$crawler = $client->submit($form, array('xc_message' => 'Hola'));
		dd($crawler->html());
		//https://m.facebook.com/groups/211205422237054/
	}

}
