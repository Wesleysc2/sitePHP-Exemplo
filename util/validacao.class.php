<?php
  class Validacao{
    public static function validarNome($n){
      $exp = "/^[a-zA-ZáÁéÉíÍóÓúÚçÇâÂãÃõÕüÜñÑ ]{2,30}$/";
      return preg_match($exp, $n);
    }
    public static function validarEstado($n){
      $exp = "/^[a-zA-ZáÁéÉíÍóÓúÚçÇâÂãÃõÕüÜñÑ ]{2,30}$/";
      return preg_match($exp, $n);
    }
    public static function validarCidade($n){
      $exp = "/^[a-zA-ZáÁéÉíÍóÓúÚçÇâÂãÃõÕüÜñÑ ]{2,30}$/";
      return preg_match($exp, $n);
    }
    public static function validarBairro($n){
      $exp = "/^[a-zA-ZáÁéÉíÍóÓúÚçÇâÂãÃõÕüÜñÑ ]{2,30}$/";
      return preg_match($exp, $n);
    }
    public static function validarGenero($n){
      $exp = "/^(masculino|feminino|outros|Masculino|Feminino|Outros)$/";
      return preg_match($exp, $n);
    }
    public static function validarAnoNasc($v){
      $exp = "/^[0-9]{2,4}$/";
      return preg_match($exp, $v);
    }
    public static function validarEmail($n){
    	$exp = "/^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$/";
    	return preg_match($exp, $n);
    }
    public static function validarContato($n){
      $exp = "/^[()0-9- ]{8,16}$/";
      return preg_match($exp, $n);
    }
    public static function validarCategoria($n){
      $exp = "/^(A|B|AB|C|D|E)$/";
      return preg_match($exp, $n);
    }
    public static function validarSenha($n){
      $exp = "/^[a-zA-Z0-9]{5,20}$/";
      return preg_match($exp,$n);
    }
    public static function validarCodigo($n){
      $exp = "/^(12345678)$/";
      return preg_match($exp,$n);
    }
  }
