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

	public function agregarGrupo(){

		$grupos = Grupo::all();

		$input = array(
			'url'=>'https://m.facebook.com/groups/5788853127/'
		);
		Grupo::create($input);
	}

	public function grupoSimple(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/groups/211205422237054/');

		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));
		$form = $crawler->selectButton('Publicar')->form();
		$crawler = $client->submit($form, array('xc_message' => 'Tengo un secreto que confesar, anoche me acoste con mi propia hermana, hicimos el amor con mucha pasion, incluso mas de lo que yo había tenido con mis ex novias. En serio, es genial. Necesito que me den consejos acerca de como es la mejor manera de hacerle el amor para no tener tiempo de pensar que esto es un trastorno/patologia/whatever.'));

		//https://m.facebook.com/groups/211205422237054/
	}

	public function grupo(){

		$grupos = User::all();

		foreach($grupos as $grupo)
		{

			$client = new Client();
			$crawler = $client->request('GET', $grupo->url);

			$form = $crawler->selectButton('Iniciar sesión')->form();
			$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));
			$form = $crawler->selectButton('Publicar')->form();
			$crawler = $client->submit($form, array('xc_message' => 'Tengo un secreto que confesar, anoche me acoste con mi propia hermana, hicimos el amor con mucha pasion, incluso mas de lo que yo había tenido con mis ex novias. En serio, es genial. Necesito que me den consejos acerca de como es la mejor manera de hacerle el amor para no tener tiempo de pensar que esto es un trastorno/patologia/whatever.'));
			//dd($crawler->html());

		}

		//https://m.facebook.com/groups/211205422237054/
	}

	public function obtenerGrupos(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/browsegroups/?category=membership');
		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));
		//$configurationRows = $crawler->filter('.groupsRecommendedTitle');
		// dd($configurationRows)
		// $prefix = "https://m.facebook.com";

		$crawler->filter('.groupsRecommendedTitle')->each(function ($node, $i)
		{
			//print_r($node->attr('href'));
			$url = $node->attr('href');

			$user = User::all();
			$input = array(
				'url'=> "https://m.facebook.com".$url
			);
			User::create($input);
		});
		//dd($crawler->html());

	}

	public function pruebin(){

		$client = new Client();

		// Login page
		$crawler = $client->request('GET', 'http://x3demob.cpx3demo.com:2082/?locale=en');

		// Select Login form
		$form = $crawler->selectButton('Log in')->form();

		// Submit form
		$crawler = $client->submit($form, array(
			'user' => 'x3demob',
			'pass' => 'x3demob',
		));

		// PHP Configuration page
		$link = $crawler->selectLink('PHP Configuration')->link();
		$crawler = $client->click($link);

		// Find PHP Configuration rows
		$configurationRows = $crawler->filter('#phptbl tbody tr');

		$configurationRows->each(function($configurationRow, $index) {

			$directive = $configurationRow->filter('td')->eq(1)->text();
			$value     = $configurationRow->filter('td')->eq(3)->text();

			//echo sprintf("%-20s = %s\n", $directive, $value);
			print_r($configurationRow);
		});
	}

}
