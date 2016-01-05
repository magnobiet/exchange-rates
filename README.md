# Taxas de Câmbio - BCB

> Taxas de câmbio do Banco Central do Brasil

## Exemplo

```bash
git clone git@github.com:magnobiet/exchange-rates.git
cd exchange-rates
composer install
php -S localhost:8080
x-www-browser http://localhost:8080/sample.php
```

### Retorno do exemplo

```json
{
	"source": "Banco Central do Brasil",
	"date": "04012016",
	"currency": {
		"id": "978",
		"type": "B",
		"name": "EUR",
		"buy": "4,3752",
		"sale": "4,3771"
	}
}
```

## Documentação

- [Tabela de moedas](http://www4.bcb.gov.br/pec/taxas/batch/tabmoedas.asp?id=tabmoeda)

## Licença
[MIT License](http://magno.mit-license.org/2015) © Magno Biét
