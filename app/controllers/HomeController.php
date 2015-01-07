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

	// public $contador;
	//
	// public function __construct(){
	// 	$this->contador = 0;
	// }

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


	}

	public function cumpleanos(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://www.facebook.com/events/birthdays');


		$form = $crawler->selectButton('Iniciar sesión')->form();

		$crawler = $client->submit($form, array('email' => 'frankito@hotmail.es', 'pass' => 'strong.10'));

		// $form = $crawler->selectButton('Publicar')->form();
		// $crawler = $client->submit($form, array('message' => 'Feliz cumple!'));
		$count =0;
		//$crawler = $crawler->filter('.clearfix _cwo');
		//$crawler = $crawler->filterXPath('//*[@id="events_birthday_view"]/div[1]/div[2]/div[2]/div/div/div[2]/div/div[1]');

		dd($crawler);
		// foreach($crawler as $craw){
		// 	print_r($craw);
		// }

		// $crawler->filter('._3ng2 lfloat _ohe')->each(function ($node, $i)
		// {
		// 	//print_r($node);
		// 	//$this->contador = $this->contador + 1;
		//
		// });

		//$count =  $this->contador;



	}

	public function spammer(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/MarielGonzalezPerez?soft=composer');

		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));
		dd($crawler->html());
		$input = $this->aleatorio();

		for($i=0;$i<20;$i++){

			$form = $crawler->selectButton('Publicar')->form();
			$crawler = $client->submit($form, array('xc_message' => 'To begin this series, lets zoom out for a few moments, and review what regular expressions look like, how we can write our own, and what that might look like in our PHP code.'));

		}


	}

	public function aleatorio(){
		$agudas = "acción, acordeón, además, adicción, admiración, admisión, anís, avión, balón, bebé, botón, café, cajón, calzón, camarón, camión, campeón, canción, celebración, colibrí, comprensión, común, confirmación, corazón, cortés, decisión, dirección, división, doblón, edredón, educación, evaluación, exclamación, explicación, expresión, guión, ilustración, información, japonés, Jesús, José, Julián, lección, león, limón, malecón, mamá, maní, marajá, medicación, melón, multiplicación, ocasión, olé, oración, Panamá, pantalón, papá, París, perdición, perfección, Perú, población, portón, rebelión, religión, rotación, salmón, Salomón, satisfacción, sección, según, sillón, Simón, sofá, solución, sustracción, también, tapón, televisión, terminación, tiburón, transición, unión, votación";
		$porciones = explode(", ", $agudas);

		//print_r(count($porciones));
		$cantidad = count($porciones);
		// for($i =0; $i<=$cantidad; $i++){
		//
		// }
		$num = rand(1,$cantidad);

		$input = array(
			'palabra' => $porciones[$num-1],
			'num'				=> $cantidad
		);

		return $input;

	}

	public function selecAmigos(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/harrykeyber.gottfried?v=friends');

		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));

		$crawler = $crawler->filter('.darkTouch _1aj5 1');
		print_r($crawler);
		foreach($crawler as $craw){
			dd($craw);
		}

		// $crawler->filter('.darkTouch _1aj5 1')->each(function ($node, $i)
		// {
		// 	//print_r($node);
		// 	//$this->contador = $this->contador + 1;
		//
		// });


	}

	public function palabraAleatoria(){

		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		$numerodeletras=10; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada
		for($i=0;$i<$numerodeletras;$i++)
		{
			$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres
			entre el rango 0 a Numero de letras que tiene la cadena */
		}
		return $cadena;
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
