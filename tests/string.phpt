--TEST--
Testing string handler methods
--SKIPIF--
<?php if (!extension_loaded('scalar_objects')) echo 'skip'; ?>
--FILE--
<?php

require __DIR__ . '/bootstrap.php';

$str = 'foobar';

echo "Working on string \"$str\"\n\n";

p('length()',          $str->length());

p('indexOf("o")',      $str->indexOf("o"));
p('lastIndexOf("o")',  $str->lastIndexOf("o"));
p('contains("ooba")',  $str->contains("ooba"));
p('contains("aboo")',  $str->contains("aboo"));
p('startsWith("foo")', $str->startsWith("foo"));
p('startsWith("bar")', $str->startsWith("bar"));
p('endsWith("bar")',   $str->endsWith("bar"));
p('endsWith("foo")',   $str->endsWith("foo"));

p('slice(1)',          $str->slice(1));
p('slice(1, 3)',       $str->slice(1, 3));
p('slice(1, -1)',      $str->slice(1, -1));

p('repeat(3)',         $str->repeat(3));
p('reverse()',         $str->reverse());

p('chunk()',           $str->chunk());
p('chunk(2)',          $str->chunk(2));

$str = "FoObAr";

echo "\nWorking on string \"$str\"\n\n";

p('toLower()',         $str->toLower());
p('toUpper()',         $str->toUpper());

$str = "123,456,789";

echo "\nWorking on string \"$str\"\n\n";

p('split(",")',        $str->split(","));
p('split(",", 1)',     $str->split(",", 1));
p('split(",", 2)',     $str->split(",", 2));
p('split(",", -1)',    $str->split(",", -1));

?>
--EXPECTF--
Working on string "foobar"

length(): int(6)
indexOf("o"): int(1)
lastIndexOf("o"): int(2)
contains("ooba"): bool(true)
contains("aboo"): bool(false)
startsWith("foo"): bool(true)
startsWith("bar"): bool(false)
endsWith("bar"): bool(true)
endsWith("foo"): bool(false)
slice(1): string(5) "oobar"
slice(1, 3): string(3) "oob"
slice(1, -1): string(4) "ooba"
repeat(3): string(18) "foobarfoobarfoobar"
reverse(): string(6) "raboof"
chunk(): array(6) {
  [0]=>
  string(1) "f"
  [1]=>
  string(1) "o"
  [2]=>
  string(1) "o"
  [3]=>
  string(1) "b"
  [4]=>
  string(1) "a"
  [5]=>
  string(1) "r"
}
chunk(2): array(3) {
  [0]=>
  string(2) "fo"
  [1]=>
  string(2) "ob"
  [2]=>
  string(2) "ar"
}

Working on string "FoObAr"

toLower(): string(6) "foobar"
toUpper(): string(6) "FOOBAR"

Working on string "123,456,789"

split(","): array(3) {
  [0]=>
  string(3) "123"
  [1]=>
  string(3) "456"
  [2]=>
  string(3) "789"
}
split(",", 1): array(1) {
  [0]=>
  string(11) "123,456,789"
}
split(",", 2): array(2) {
  [0]=>
  string(3) "123"
  [1]=>
  string(7) "456,789"
}
split(",", -1): array(2) {
  [0]=>
  string(3) "123"
  [1]=>
  string(3) "456"
}
