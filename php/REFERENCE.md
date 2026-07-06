# YuGiOh PHP SDK Reference

Complete API reference for the YuGiOh PHP SDK.


## YuGiOhSDK

### Constructor

```php
require_once __DIR__ . '/yugioh_sdk.php';

$client = new YuGiOhSDK($options);
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `$options` | `array` | SDK configuration options. |
| `$options["base"]` | `string` | Base URL for API requests. |
| `$options["prefix"]` | `string` | URL prefix appended after base. |
| `$options["suffix"]` | `string` | URL suffix appended after path. |
| `$options["headers"]` | `array` | Custom headers for all requests. |
| `$options["feature"]` | `array` | Feature configuration. |
| `$options["system"]` | `array` | System overrides (e.g. custom fetch). |


### Static Methods

#### `YuGiOhSDK::test($testopts = null, $sdkopts = null)`

Create a test client with mock features active. Both arguments may be `null`.

```php
$client = YuGiOhSDK::test();
```


### Instance Methods

#### `Cardinfo($data = null)`

Create a new `CardinfoEntity` instance. Pass `null` for no initial data.

#### `options_map(): array`

Return a deep copy of the current SDK options.

#### `get_utility(): YuGiOhUtility`

Return a copy of the SDK utility object.

#### `direct(array $fetchargs = []): array`

Make a direct HTTP request to any API endpoint. This is the raw-HTTP escape
hatch: it does **not** throw. It returns a result array
`["ok" => bool, "status" => int, "headers" => array, "data" => mixed]`, or
`["ok" => false, "err" => \Exception]` on failure. Branch on `$result["ok"]`.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `$fetchargs["path"]` | `string` | URL path with optional `{param}` placeholders. |
| `$fetchargs["method"]` | `string` | HTTP method (default: `"GET"`). |
| `$fetchargs["params"]` | `array` | Path parameter values for `{param}` substitution. |
| `$fetchargs["query"]` | `array` | Query string parameters. |
| `$fetchargs["headers"]` | `array` | Request headers (merged with defaults). |
| `$fetchargs["body"]` | `mixed` | Request body (arrays are JSON-serialized). |
| `$fetchargs["ctrl"]` | `array` | Control options. |

**Returns:** `array` — the result dict (see above); never throws.

#### `prepare(array $fetchargs = []): mixed`

Prepare a fetch definition without sending the request. Returns the
`$fetchdef` array. Throws on error.


---

## CardinfoEntity

```php
$cardinfo = $client->Cardinfo();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `archetype` | `string` | No |  |
| `atk` | `int` | No |  |
| `attribute` | `string` | No |  |
| `banlist_info` | `array` | No |  |
| `beta_name` | `string` | No |  |
| `card_image` | `array` | No |  |
| `card_price` | `array` | No |  |
| `card_set` | `array` | No |  |
| `def` | `int` | No |  |
| `desc` | `string` | Yes |  |
| `downvote` | `int` | No |  |
| `format` | `array` | No |  |
| `frame_type` | `string` | Yes |  |
| `genesys_point` | `int` | No |  |
| `has_effect` | `int` | No |  |
| `id` | `int` | Yes |  |
| `konami_id` | `int` | No |  |
| `level` | `int` | No |  |
| `linkmarker` | `array` | No |  |
| `linkval` | `int` | No |  |
| `md_rarity` | `string` | No |  |
| `name` | `string` | Yes |  |
| `ocg_date` | `string` | No |  |
| `race` | `string` | No |  |
| `scale` | `int` | No |  |
| `tcg_date` | `string` | No |  |
| `treated_a` | `string` | No |  |
| `type` | `string` | Yes |  |
| `upvote` | `int` | No |  |
| `view` | `int` | No |  |
| `viewsweek` | `int` | No |  |
| `ygoprodeck_url` | `string` | No |  |

### Operations

#### `list(?array $reqmatch = null, ?array $ctrl = null): mixed`

List entities matching the given criteria (call with no argument to list all). Returns an array. Throws on error.

```php
$results = $client->Cardinfo()->list();
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): CardinfoEntity`

Create a new `CardinfoEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```php
$client = new YuGiOhSDK([
  "feature" => [
    "test" => ["active" => true],
  ],
]);
```

