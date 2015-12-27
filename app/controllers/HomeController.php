<?php
use Goutte\Client;
//use Guzzle\Http\Client;
use Guzzle\Plugin\Cookie\CookiePlugin;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;

class HomeController extends BaseController {



	public $contador;

	public function __construct(){
		$this->contador = 0;
	}

	public function index()
	{
		return View::make('index');
	}


	public function circle(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://www.circle.com/');
		// dd($crawler->html());
		//$crawler = $client->click($crawler->selectLink('Inscribirse')->link());
		$form = $crawler->selectButton('Create Account')->form();
		$crawler = $client->submit($form, array('first-name' => 'olviendo', 'last-name' => 'kost','email'=>'lala@gmail.com'));
		dd($crawler->html());
	}

	public function titulos(){
		$titulos = ['Pendeja nueva en el sexo coge a su hermano','garchando abajo del puente con 	amateur','obedeciendo las ordenes de la maestra','con este culo te haces 3 pajas seguidas','Cogiendo al vecino en el patio de casa','Rocio Marengo, Diosa!','Parejas caseras haciendo porno','Morenita juguetona en la cama toda una zorrita','tremenda partusa!','follando con mi primo','Daphne Rosen y el calvo del a suerte vuelve por mas','La loco amateur se esta chupando verga','tetotas y culote en bikini...que mas quieres?','Carolina Abril en su nueva serie porno, que precio...','maquinas de orgasmos caseros','linda huera se baja los calzones que ricas nalgotas','fotos privadas aficionados','Aficionado coleccion europea caliente','Wink Lindas lesbianitas jugando a la botella en español','Mi novia quiere saber qué tipo de comentarios inspira','Empinaditas Nalgas Paradas Esperandote','Hermosa Peliroja Y Sus Sexy Poses: Set Privado Robado: Ultima Parte','La Diosa Malena Morgan, pasando el rato en la cama.'];

		$cantidad = count($titulos);

		$aleatorio = rand(1,$cantidad);

		$input = array(
			'titulo'=> $titulos[$aleatorio-1],
			'num'=> $cantidad
		);

		return $input;
	}

	public function spammerPicture(){


		// dd($crawler->html());
		$input = $this->titulos();
		$numFotos = 30;


		for($i=0; $i<=$numFotos; $i++){

			$client = new Client();
			$constante = "https://m.facebook.com/login.php?next=";
			$username = "jorge.polancoalbuerme";
			$crawler = $client->request('GET', 'https://m.facebook.com/login.php?next=https://m.facebook.com/'.$username.'?soft=composer');

			$form = $crawler->selectButton('Iniciar sesión')->form();
			$crawler = $client->submit($form, array('email' => 'binario_mayor@hotmail.com', 'pass' => 'lolita.5'));
			dd($crawler->html());

			$input = $this->titulos();
			$random = rand(1,$numFotos);
			//dd($crawler->html());
			// $form = $crawler->selectButton('Agregar foto')->form();

			$form = $crawler->selectButton('Añadir foto')->form();
			$crawler = $client->submit($form, array('lgc_view_photo' => 'hey'));

			$form = $crawler->selectButton('Publicar')->form();
			$crawler = $client->submit($form, array('file1' => '/Users/franciscoperez/Desktop/porn/'.$i.'.jpg','xc_message' => $input['titulo'] ));

			// $form = $crawler->selectButton('Cerrar')->form();
			// $crawler = $client->submit($form);

		}
		dd($crawler->html());


	}


	public function fb()
	{
		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/home.php?soft=composer');
		//$crawler = $client->click($crawler->selectLink('Inscribirse')->link());
		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'strong.10'));

		$form = $crawler->selectButton('Publicar')->form();
		$crawler = $client->submit($form, array('xc_message' => 'hey'));
		dd($crawler->html());
	}

	public function daleware(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://delecorp.delaware.gov/tin/EntitySearch.jsp');

		$form = $crawler->selectButton('Search')->form();
		$crawler = $client->submit($form,array('frmDisclaimerChkBox' => 'Y'));

		$crawler = $client->submit($form,array('frmEntityType' => 'Y'));

		print_r($crawler->html());
		sleep(2);
		$crawler = $client->submit($form,array('frmEntityEnding' => 'LLC'));

		// dd($crawler->html());

		$form = $crawler->selectButton('Search')->form();
		// frmDisclaimerChkBox$form = $crawler->select('frmDisclaimerChkBox')->form();
		$crawler = $client->submit($form,array('frmEntityName'=>'BPAY'));

		dd($crawler->html());

	}

	public function subirFoto(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/login.php?next=https://m.facebook.com/home.php?soft=composer');
		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));

		$form = $crawler->selectButton('Añadir fotos')->form();
		$crawler = $client->submit($form, array('lgc_view_photo' => 'hey'));

		// $form = $crawler->selectButton('Seleccionar archivo')->form();
		// $crawler = $client->submit($form, array('file1' => 'http://buzzgfx.com/wp-content/uploads/2014/02/woocommerce.png'));

		$form = $crawler->selectButton('Publicar')->form();
		$crawler = $client->submit($form, array('file1' => '/Users/franciscoperez/Desktop/a.png'));
		$form = $crawler->selectButton('Cerrar')->form();
		$crawler = $client->submit($form);
			dd($crawler->html());

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

	}

	public function grupo(){

		$grupos = User::all();

		foreach($grupos as $grupo)
		{

			$client = new Client();
			$crawler = $client->request('GET', $grupo->url);

			$form = $crawler->selectButton('Iniciar sesión')->form();
			$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));

			//dd($crawler->html());

			//=======
			$input = $this->aleatorio();

			$num = $input['num'];

				for($i=0; $i<10; $i++){

					$pal = $this->aleatorio();
					$form = $crawler->selectButton('Publicar')->form();
					$crawler = $client->submit($form, array('xc_message' => $pal['palabra']));

				}

		}

		//https://m.facebook.com/groups/211205422237054/
	}

	public function obtenerGrupos(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://m.facebook.com/browsegroups/?category=membership');
		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'harrykeyber@gmail.com', 'pass' => 'behavior.10'));

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

		// foreach($crawler as $craw){
		// 	print_r($craw);
		// }

		$crawler->filter('.bm')->each(function ($node, $i)
		{
			//print_r($node);
			//$this->contador = $this->contador + 1;

		});

		//$count =  $this->contador;
	}

	public function spammer(){

		$client = new Client();
		$constante = "https://m.facebook.com/login.php?next=";
		$crawler = $client->request('GET', 'https://m.facebook.com/login.php?next=https://m.facebook.com/edeleonreyes?fref=hovercard&soft=composer');

		$form = $crawler->selectButton('Iniciar sesión')->form();
		$crawler = $client->submit($form, array('email' => 'frankiperex@hotmail.com', 'pass' => 'strong'));
		// dd($crawler->html());
		// $input = $this->aleatorio();

		$input = $this->insultos();

		$num = $input['num'];
		//$palabra = $input['palabra'];

		for($i=0;$i<$num;$i++){

			$pal = $this->insultos();

			$form = $crawler->selectButton('Publicar')->form();
			$crawler = $client->submit($form, array('xc_message' => $pal['palabra']));

		}


		dd($crawler->html());
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

	public function insultos(){
		$insultos = "Fuck you: vete a la mierda
		Motherfucker: hijo p
		Son of a bitch: hijo p
		Jerk: idiota
		Jakass: jilipollas
		Screw you: que te jodan
		Moron: capullo
		Cocksucker: chupaeso
		Dickhead: gilipollas
		Dumbass: idiota
		Douch bag: imbecil o algo por el estilo
		Scumbag: cabronazo, basura
		Redneck: cateto
		Fag/Faggot: maricón
		Asshole: cabrón
		Slut: guarra
		Hilly billy: paleto
		Scoundrel: bellaco
		Twit: berzotas
		Smarty: botarate
		Toothpuller: sacamuelas
		Prudish: gazmoño
		Maggot: gusano
		Weakling: alfeñique, cobarde, débil
		Bitch/whore: puta
		Twat/Cunt: coño";

		$porciones = explode(": ", $insultos);

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
