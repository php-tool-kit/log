<?php

require 'vendor/autoload.php';

$defaultWriter = new PTK\Log\Writer\StreamWriter('php://stdout');
$errorWriter = new PTK\Log\Writer\StreamWriter('errors.log');
$defaultFormatter = new \PTK\Log\Formatter\LineFormatter();
$noticeFormatter = new \PTK\Log\Formatter\LineFormatter("[%datetime%]\t[%level%]\t(!) [%message%]".PHP_EOL);

$logger = new PTK\Log\Logger\Logger($defaultWriter, $defaultFormatter);

$logger->setFormatterForLevel(\Psr\Log\LogLevel::NOTICE, $noticeFormatter);
$logger->setWriterForLevel(\Psr\Log\LogLevel::ERROR, $errorWriter);

$logger->info('Hello world {className}!', ['className' => 'PTK\\Log']);
$logger->notice('Isso é uma notícia.');
$logger->error('Isso é um erro.');