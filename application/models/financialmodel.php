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
	public function getCurrencyFullDate($currency, $rangeFrom = NULL, $rangeTo = NULL){

		$currenciesXml = simplexml_load_file('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-hist.xml');
		$upperBody = $currenciesXml->children()->children();

		$i = 0;
		$lastDate = false;
		foreach ($upperBody	 as $key => $dateBranch) {
			$currentDate = (string)$dateBranch->attributes();
			if(!$lastDate){
				$lastDate = $currentDate;
			}						
			$firstDate = $currentDate;
		}
		$currencies['startDate'] = $firstDate;

		$currentDate = $firstDate;
		foreach ($upperBody	 as $key => $dateBranch) {
			$xmlDate = (string)$dateBranch->attributes();
			if(strtotime($firstDate) < strtotime($lastDate)){

				foreach ($dateBranch->children() as $key => $currencyName) {
					$name = (string)$currencyName->attributes()->currency;

					if($name == $currency){
						$rate = (string)$currencyName->attributes()->rate;
							
						while($lastDate != $xmlDate && strtotime($firstDate) < strtotime($lastDate)){
							$currencies['values'][$i] = $rate;
							$lastDate = date('Y-m-d', strtotime($lastDate . ' - 1 day'));
							$i++;
						}
					}
				}
			}
		}
		return $currencies;			
	}
}
	


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
