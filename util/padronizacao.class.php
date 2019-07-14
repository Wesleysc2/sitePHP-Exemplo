<?php
	class Padronizacao{
		public static function padronizarNome($n){
			return ucwords(strtolower($n));
		}
		public static function padronizarEmail($n){
     	return strtolower($n);
   		}
	}
