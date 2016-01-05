<?php

class ExchangeRates {

	// http://www4.bcb.gov.br/pec/taxas/port/ptaxnpesq.asp?id=txcotacao

	private $_source = 'Banco Central do Brasil';
	private $_api    = 'https://ptax.bcb.gov.br/ptax_internet/consultaBoletim.do?method=gerarCSVFechamentoMoedaNoPeriodo';

	private $_currency   = null;
	private $_start_date = null;
	private $_end_date   = null;

	public function __construct($currency = 220) {

		$date = new Moment\Moment($date, 'America/Sao_Paulo');
		Moment\Moment::setLocale('pt_BR');

		$this->_currency = $currency;

		$this->_end_date   = $date->setHour(0)->setMinute(0)->setSecond(0)->format('d/m/Y');
		$this->_start_date = $date->setHour(0)->setMinute(0)->setSecond(0)->subtractDays(1)->format('d/m/Y');

	}

	private function _getData($start, $end) {
		return file($this->_api . "&ChkMoeda={$this->_currency}&DATAINI={$this->_start_date}&DATAFIM={$this->_end_date}")[0];
	}

	public function get() {

		$data = explode(';', $this->_getData());

		$result         = new stdClass();
		$result->source = $this->_source;
		$result->date   = $data[0];

		$result->currency       = new stdClass();
		$result->currency->id   = $data[1];
		$result->currency->type = $data[2];
		$result->currency->name = $data[3];
		$result->currency->buy  = $data[4];
		$result->currency->sale = $data[5];

		return $result;

	}

}
