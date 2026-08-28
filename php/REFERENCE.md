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
| `archetype` | `string` | No | The archetype the card belongs to |
| `atk` | `int` | No | ATK value (Monster cards only) |
| `attribute` | `string` | No | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `array` | No | Banlist status information for the card |
| `beta_name` | `string` | No | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `array` | No | Array of card images including alternate artworks |
| `card_prices` | `array` | No | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `array` | No | Array of card sets this card appears in |
| `def` | `int` | No | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `string` | Yes | Card description/effect text |
| `downvotes` | `int` | No | Number of downvotes (only when misc=yes) |
| `formats` | `array` | No | Available formats the card is in (only when misc=yes) |
| `frameType` | `string` | Yes | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `int` | No | Genesys format points code (only when format=genesys). |
| `has_effect` | `int` | No | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `int` | Yes | 8-digit passcode/ID of the card |
| `konami_id` | `int` | No | Konami ID of the card (only when misc=yes) |
| `level` | `int` | No | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `array` | No | Link Markers (Link Monsters only) |
| `linkval` | `int` | No | Link value (Link Monsters only) |
| `md_rarity` | `string` | No | Master Duel rarity (only when misc=yes) |
| `name` | `string` | Yes | Name of the card |
| `ocg_date` | `string` | No | Original OCG release date (only when misc=yes) |
| `race` | `string` | No | Card race/type. |
| `scale` | `int` | No | Pendulum Scale value (Pendulum Monsters only) |
| `tcg_date` | `string` | No | Original TCG release date (only when misc=yes) |
| `treated_as` | `string` | No | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `type` | `string` | Yes | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `upvotes` | `int` | No | Number of upvotes (only when misc=yes) |
| `views` | `int` | No | Number of times card has been viewed in database (only when misc=yes) |
| `viewsweek` | `int` | No | Number of times card has been viewed this week (only when misc=yes) |
| `ygoprodeck_url` | `string` | No | URL to the card's page on YGOPRODeck |

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


### Configuring features

Each feature is inactive until switched on, and an SDK with no feature
configured does no feature work at all. Every option below keeps its default
unless you name it.

The array form of \`feature\` is significant: several features wrap the
transport, and the order you list them in is the order they nest.

#### `test`

In-memory mock transport for testing without a live server.

**Configuration**

| Option | Default |
|---|---|
| `active` | `false` |

Options above are those the model carries a default for. A feature may
also accept callback options — a `sink` to receive each record, for
instance — which have no default and are covered in the full feature
reference.

**Usage**

Set `feature.test.active` to true in the client options, and override any option above in the same entry. Every option keeps
its default unless you name it.

**Considerations**

- Attaches to pipeline hooks, not the transport, so activation order does
  not change what it observes.
- Installs the BASE transport that the wrapping features wrap, so it must be
  activated before them.
- Inactive by default: leaving it out costs nothing at runtime.

