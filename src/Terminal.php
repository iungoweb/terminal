<?php

namespace IungoWeb;

class Terminal {

	private function cores(string $cor): string {

		switch ($cor) {
			case 'azul':
				return '0;34';

			case 'azulClaro':
				return '1;34';

			case 'preto':
				return '0;30';

			case 'cinzaEscuro':
				return '1;30';

			case 'cinzaClaro':
				return '0;37';

			case 'vermelho':
				return '0;31';

			case 'vermelhoClaro':
				return '1;31';

			case 'verde':
				return '0;32';

			case 'verdeClaro':
				return '1;32';

			case 'laranja':
				return '0;33';

			case 'amarelo':
				return '1;33';

			case 'roxo':
				return '0;35';

			case 'roxoClaro':
				return '1;35';

			case 'ciano':
				return '0;36';

			case 'cianoClaro':
				return '1;36';

			case 'branco':
				return '1;37';

			default:
				return 'Código inexistente';
		}
	}

	public function novaLinha(int $qnt = 1): void {
		$pulaLinha = '';

		for ($i = 0; $i < $qnt; $i++)
			$pulaLinha .= PHP_EOL;

		print_r($pulaLinha);
	}

	public function log(string $msg = '', int $novasLinhas = 1, string $cor = 'ciano'): void {

		if ($cor)
			echo "\e[" . $this->cores($cor) . 'm';

		if ($cor == 'ciano')
			echo '>>> ';

		echo $msg;

		if ($cor)
			echo "\e[0m";

		if ((bool) $novasLinhas)
			$this->novaLinha((int) $novasLinhas);
	}

	public function info(string $msg = '', int $novasLinhas = 1): void {

		$this->log(
			'!!! ' . $msg,
			$novasLinhas,
			'azul'
		);
	}

	public function erro(string $msg = '', int $novasLinhas = 1): void {

		$this->log(
			'[ERRO] ' . $msg,
			$novasLinhas,
			'vermelho'
		);
	}

	public function sucesso(string $msg = '', int $novasLinhas = 1): void {

		$this->log(
			'[OK] ' . $msg,
			$novasLinhas,
			'verde'
		);
	}
}