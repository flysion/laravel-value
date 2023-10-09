# laravel-value

# example
```php
$context = [
    'userInfo' => new ExecValue(function() {
        return [
            'level' => 11,
            'age' => 22,
            'vip' => 6,
            "gender" => "2",
        ];
    }),
];

$and1 = new _AND([
    new GT(new ContextValue('userInfo.level'), 10),
    new EQ(new ContextValue('userInfo.nickname'), null),
]);

$and2 = new _AND([
    new GE(new ContextValue('userInfo.age'), 18),
    new EQ(new ContextValue('userInfo.vip'), 6),
    new IN(new ContextValue('userInfo.gender'), ["1", "2"]),
]);

$or = new _OR([$and1, $and2]);

$cond = toString($or, $context);
// ((`userInfo.level` > 10 and `userInfo.nickname` == null) or (`userInfo.age` >= 18 and `userInfo.vip` == 6 and `userInfo.gender` in ["1","2"]))

$result = \App\Services\Value\value($or, $context);
// true

dd($cond, $result, $context);
```