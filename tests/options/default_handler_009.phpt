--TEST--
Default options handler 009 - Long options returned as array
--ARGS--
--format="xhtml" --noindex --forceindex --notoc --docbook="tests/options/default_handler_009.phpt" --output="tests/options/" --outputfilename="tests/options/default_handler_009.xml" --partial="bookId" --skip="idToSkip" --verbose=E_ALL --lang="en" --color=1 --highlighter="highlighter" --package="PHP" --css="some.css" --xinclude --ext=".html" --memoryindex --packagedir="tests/options/"
--SKIPIF--
<?php
if (file_exists(__DIR__ . "/../../phd.config.php")) {
    die("Skipped: existing phd.config.php file will overwrite command line options.");
}
?>
--FILE--
<?php
namespace phpdotnet\phd;

require_once __DIR__ . "/../setup.php";

$optionsParser = new Options_Parser(
    new Options_Handler(
      $config, 
      new Package_Generic_Factory, 
      new OutputHandler($config)
    )
);
$commandLineOptions = $optionsParser->getopt();

var_dump($commandLineOptions);
?>
--EXPECTF--
array(20) {
  ["outputFormat"]=>
  array(1) {
    [0]=>
    string(5) "xhtml"
  }
  ["noIndex"]=>
  bool(true)
  ["forceIndex"]=>
  bool(true)
  ["noToc"]=>
  bool(true)
  ["xmlRoot"]=>
  string(13) "tests/options"
  ["xmlFile"]=>
  string(38) "tests/options/default_handler_009.phpt"
  ["outputDir"]=>
  string(14) "tests/options/"
  ["outputFilename"]=>
  string(23) "default_handler_009.xml"
  ["renderIds"]=>
  array(1) {
    ["bookId"]=>
    bool(true)
  }
  ["skipIds"]=>
  array(1) {
    ["idToSkip"]=>
    bool(true)
  }
  ["verbose"]=>
  int(%d)
  ["language"]=>
  string(2) "en"
  ["colorOutput"]=>
  bool(true)
  ["highlighter"]=>
  string(11) "highlighter"
  ["package"]=>
  array(1) {
    [0]=>
    string(3) "PHP"
  }
  ["css"]=>
  array(1) {
    [0]=>
    string(8) "some.css"
  }
  ["processXincludes"]=>
  bool(true)
  ["ext"]=>
  string(5) ".html"
  ["memoryIndex"]=>
  bool(true)
  ["packageDirs"]=>
  array(2) {
    [0]=>
    string(%d) "%s"
    [1]=>
    string(%d) "%s"
  }
}
