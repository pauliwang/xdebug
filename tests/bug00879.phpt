--TEST--
Test for bug #879: Closing brace in trait-using class definitions is counted towards code coverage. (PHP >= 5.4)
--SKIPIF--
<?php if (version_compare(phpversion(), "5.4", '<')) echo "skip >= PHP 5.4 needed\n"; ?>
--INI--
xdebug.default_enable=1
xdebug.auto_trace=0
xdebug.trace_options=0
xdebug.trace_output_dir=/tmp
xdebug.collect_params=1
xdebug.collect_return=0
xdebug.collect_assignments=0
xdebug.auto_profile=0
xdebug.profiler_enable=0
xdebug.dump_globals=0
xdebug.show_mem_delta=0
xdebug.trace_format=0
xdebug.extended_info=1
xdebug.coverage_enable=1
xdebug.overload_var_dump=0
--FILE--
<?php

xdebug_start_code_coverage(XDEBUG_CC_UNUSED);

$file = realpath('./tests/bug00879.inc');
include $file;

new WithTrait;

var_dump(xdebug_get_code_coverage());
?>
--EXPECTF--
array(2) {
  ["%sbug00879.inc"]=>
  array(5) {
    [3]=>
    int(1)
    [5]=>
    int(1)
    [6]=>
    int(1)
    [7]=>
    int(1)
    [8]=>
    int(1)
  }
  ["%sbug00879.php"]=>
  array(4) {
    [5]=>
    int(1)
    [6]=>
    int(1)
    [8]=>
    int(1)
    [10]=>
    int(1)
  }
}
