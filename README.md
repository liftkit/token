# token
A library for working with string identifiers.

## Capitalized

```php
use LiftKit\Token\Token;

$token = new Token('some string');

echo $token->capitalized();
// Some String
```

## Uppercase

```php
$token = new Token('some string');

echo $token->uppercase();
// SOME STRING
```

## Lowercase

```php
$token = new Token('SOme stRing');

echo $token->lowercase();
// some string
```

## Camelcase

```php
$token = new Token('some string');

echo $token->camelcase();
// someString
```

## Join

```php
$token = new Token('some string with words');

echo $token->join('$');
// some$string$with$words
```

## Dashed

```php
$token = new Token('some string with words');

echo $token->dashed();
// some-string-with-words
```

## Underscored

```php
$token = new Token('some string with words');

echo $token->underscored();
// some_string_with_words
```

## Combination

```php
$token = new Token('some string with words');

echo $token->uppercase()->underscored();
// SOME_STRING_WITH_WORDS
```
