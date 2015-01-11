<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Financialmodel extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function getCurrneciesToday()
	{
		$currenciesXml = simplexml_load_file('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
		$upperBody = $currenciesXml->children()->children();
		$date = (string)$upperBody->attributes();
		$day = $upperBody->children();
		$currencies['date'] = $date;

		foreach ($day as $key => $value) {
			$name = (string)$value->attributes()->currency;
			$rate = (string)$value->attributes()->rate;
			$currencies['currencies'][$name]['rate'] = $rate;
		}

		return $currencies;
	}
	public function getCurrencyRates($from = "PLN", $to = NULL, $dateFrom = NULL, $dateTo = NULL)
	{
		if($to == NULL){
			$to = "USD";
		}
		if($dateFrom == NULL){
			$dateFrom = "2002-01-01";
		}
		if($dateTo == NULL){
			$dateTo = date('Y-m-d');
		}
		$jsonUrl = file_get_contents("http://jsonrates.com/historical/?from=$from&to=$to&dateStart=$dateFrom&dateEnd=$dateTo");
		echo $jsonUrl;

	}
}
	


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
