# laravel-value

# example

```php
use Flysion\Value\_AND;
use Flysion\Value\_OR;
use Flysion\Value\ContextValue;
use Flysion\Value\EQ;
use Flysion\Value\ExecValue;
use Flysion\Value\GE;
use Flysion\Value\GT;
use Flysion\Value\IN;

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

$cond = $or->toString($context);
// ((`userInfo.level` > 10 and `userInfo.nickname` == null) or (`userInfo.age` >= 18 and `userInfo.vip` == 6 and `userInfo.gender` in ["1","2"]))

$result = $or->value($context);
// true

dd($cond, $result, $context);
```