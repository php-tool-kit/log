<?php

require 'vendor/autoload.php';

//$defaultWriter = new PTK\Log\Writer\StreamWriter('php://stdout');
$defaultWriter = new PTK\Log\Writer\CLImateWriter();
//$errorWriter = new PTK\Log\Writer\StreamWriter('errors.log');
//$defaultFormatter = new \PTK\Log\Formatter\LineFormatter();
$defaultFormatter = new \PTK\Log\Formatter\CLImateFormatter();
//$noticeFormatter = new \PTK\Log\Formatter\LineFormatter("[%datetime%]\t[%level%]\t(!) [%message%]".PHP_EOL);

$logger = new PTK\Log\Logger\Logger($defaultWriter, $defaultFormatter);

//$logger->setFormatterForLevel(\Psr\Log\LogLevel::NOTICE, $noticeFormatter);
//$logger->setWriterForLevel(\Psr\Log\LogLevel::ERROR, $errorWriter);

$logger->info('Hello world {className}!', ['className' => 'PTK\\Log']);
$logger->notice('Isso é uma notícia.');
$logger->error('Isso é um erro.');
$logger->alert('Isso é um alerta.');
$logger->critical('Isso é um erro crítico.');
$logger->debug('Isso é um debug.');
$logger->emergency('Isso é uma emergência.');
$logger->warning('Isso é um aviso.');