<?php
use Goutte\Client;
//use Guzzle\Http\Client;
use Guzzle\Plugin\Cookie\CookiePlugin;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;

class SmsController extends \BaseController {

	public $contador;
	private $url;

	public function __construct(){
		$this->contador = 0;
	}

	public function __get($atributo){

		return $this->$atributo;
	}
	public function __set($atributo, $valor){

		$this->$atributo = $valor;
	}

	public function emailAnonimo(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://meltmail.com/home/index?locale=es-ES');
		//$crawler = $client->click($crawler->selectLink('Inscribirse')->link());
		// dd($crawler->html());
		$form = $crawler->selectButton('Create Melt Mail')->form();
		$crawler = $client->submit($form, array('meltmail[email]' => 'sample@mail.com'));

		$crawler->filter('#the_meltmail');

		// $crawler->filter('#the_meltmail')->each(function ($node, $i)
		// {
		// 	//print_r($node->attr('href'));
		// 	print_r ($node);
		// 	// $url = $node->attr('href');
		//
		// });

		dd($crawler->html());


	}

	public function anonimo(){

		$client = new Client();
		$crawler = $client->request('GET', 'http://notsharingmy.info/');
		$form = $crawler->selectButton('Create Melt Mail')->form();
		$crawler = $client->submit($form, array('email' => 'sample@mail.com'));

	}

	public function clickTell(){

		$client = new Client();
		$crawler = $client->request('GET', 'https://www.clickatell.com/Register/');
		dd($crawler->html());
		//$crawler->selectLink('Inscribirse')->link();
		// dd($crawler->filter('#main > div.content-middle > div > form > div.gform_body > ul > li.gfield.product-select > div:nth-child(2) > ul > li.communicator > label')->text());
		$crawler = $client->click($crawler->selectLink("Reliable, scalable, customisable.
		Integrates with your system via APIs.")->link());
		dd($crawler->html());

	}
    public function emailAleatorio(){

        $alias =  User::construir_nombre();
        $email = $alias."@robertico412.33mail.com";



    }




}
