<?php
echo dirname(__FILE__).'\font\ginga.otf';
echo "<hr>";
echo realpath('./font');
echo "<hr>";
echo putenv('GDFONTPATH=' . realpath('.'));
echo "<hr>";
