<?php

namespace ptk\log;

/**
 * Exibe em STDOUT uma informação.
 * 
 * @param string $message
 * @param array $context Um array com chave/valor onde a chave é um marcador usado na mensagem que irá receber o conteúdo do valor do elemento do array.
 * @return void
 */
function info(string $message, array $context = []): void {
    if($context){
        foreach ($context as $k => $v){
            $message = str_replace($k, $v, $message);
        }
    }
    
    fwrite(STDOUT, $message.PHP_EOL);
}

/**
 * Exibe em STDOUT uma notícia.
 * 
 * Notícias são emitidas quando algo importante acontece no programa, como a conclusão de uma nova etapa, por exemplo.
 * 
 * @param string $message
 * @param array $context Um array com chave/valor onde a chave é um marcador usado na mensagem que irá receber o conteúdo do valor do elemento do array.
 * @param bool $colors
 * @return void
 */
function notice(string $message, array $context = [], bool $colors = true): void {
    if($colors){
        fwrite(STDOUT, "\033[32m");
    }
    
    info($message, $context);
    
    if($colors){
        fwrite(STDOUT, "\033[0m");
    }
}

/**
 * Exibe em STDOUT um alerta.
 * 
 * Alertas são emitidos quando algo acontece com o programa que possa influenciar o resultado final.
 * 
 * @param string $message
 * @param array $context Um array com chave/valor onde a chave é um marcador usado na mensagem que irá receber o conteúdo do valor do elemento do array.
 * @param bool $colors
 * @return void
 */
function warn(string $message, array $context = [], bool $colors = true): void {
    if($colors){
        fwrite(STDOUT, "\033[33m");
    }
    
    info($message, $context);
    
    if($colors){
        fwrite(STDOUT, "\033[0m");
    }
}

/**
 * Exibe em STDOUT um erro.
 * 
 * Erros são mostrados quando acontece algo que faz com que o programa não possa ou não deva continuar.
 * 
 * @param string $message
 * @param array $context Um array com chave/valor onde a chave é um marcador usado na mensagem que irá receber o conteúdo do valor do elemento do array.
 * @param bool $colors
 * @return void
 */
function error(string $message, array $context = [], bool $colors = true): void {
    if($colors){
        fwrite(STDOUT, "\033[31m");
    }
    
    info($message, $context);
    
    if($colors){
        fwrite(STDOUT, "\033[0m");
    }
}