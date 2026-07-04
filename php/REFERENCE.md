# YuGiOh PHP SDK Reference

Complete API reference for the YuGiOh PHP SDK.


## YuGiOhSDK

### Constructor

```php
require_once __DIR__ . '/yu-gi-oh_sdk.php';

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

#### `optionsMap(): array`

Return a deep copy of the current SDK options.

#### `getUtility(): ProjectNameUtility`

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
$cardinfo = $client->cardinfo();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `archetype` | ``$STRING`` | No |  |
| `atk` | ``$INTEGER`` | No |  |
| `attribute` | ``$STRING`` | No |  |
| `banlist_info` | ``$OBJECT`` | No |  |
| `beta_name` | ``$STRING`` | No |  |
| `card_image` | ``$ARRAY`` | No |  |
| `card_price` | ``$ARRAY`` | No |  |
| `card_set` | ``$ARRAY`` | No |  |
| `def` | ``$INTEGER`` | No |  |
| `desc` | ``$STRING`` | Yes |  |
| `downvote` | ``$INTEGER`` | No |  |
| `format` | ``$ARRAY`` | No |  |
| `frame_type` | ``$STRING`` | Yes |  |
| `genesys_point` | ``$INTEGER`` | No |  |
| `has_effect` | ``$INTEGER`` | No |  |
| `id` | ``$INTEGER`` | Yes |  |
| `konami_id` | ``$INTEGER`` | No |  |
| `level` | ``$INTEGER`` | No |  |
| `linkmarker` | ``$ARRAY`` | No |  |
| `linkval` | ``$INTEGER`` | No |  |
| `md_rarity` | ``$STRING`` | No |  |
| `name` | ``$STRING`` | Yes |  |
| `ocg_date` | ``$STRING`` | No |  |
| `race` | ``$STRING`` | No |  |
| `scale` | ``$INTEGER`` | No |  |
| `tcg_date` | ``$STRING`` | No |  |
| `treated_a` | ``$STRING`` | No |  |
| `type` | ``$STRING`` | Yes |  |
| `upvote` | ``$INTEGER`` | No |  |
| `view` | ``$INTEGER`` | No |  |
| `viewsweek` | ``$INTEGER`` | No |  |
| `ygoprodeck_url` | ``$STRING`` | No |  |

### Operations

#### `list(array $reqmatch, ?array $ctrl = null): mixed`

List entities matching the given criteria. Returns an array. Throws on error.

```php
$results = $client->cardinfo()->list([]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): CardinfoEntity`

Create a new `CardinfoEntity` instance with the same client and
options.

#### `getName(): string`

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

