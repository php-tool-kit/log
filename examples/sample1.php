<?php

require 'vendor/autoload.php';

\ptk\log\info('Início do registro em %data%', ['%data%' => date('d/m/Y H:i:s')]);
\ptk\log\notice('Notícia emitida em :data', [':data' => date('d/m/Y H:i:s')]);
\ptk\log\notice('Notícia emitida em :data, às :hora', [':data' => date('d/m/Y'), ':hora' => date('H:i:s')], false);
\ptk\log\warn('Alerta emitido em :data', [':data' => date('d/m/Y H:i:s')]);
\ptk\log\error('Erro emitido em :data', [':data' => date('d/m/Y H:i:s')]);
\ptk\log\info('Início do registro.');