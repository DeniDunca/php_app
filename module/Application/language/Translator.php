<?php
use Laminas\I18n\Translator\Translator;

$translator = new Translator();
$translator->addTranslationFile($type, $filename, $textDomain, $locale);