# YuGiOh Ruby SDK Reference

Complete API reference for the YuGiOh Ruby SDK.


## YuGiOhSDK

### Constructor

```ruby
require_relative 'YuGiOh_sdk'

client = YuGiOhSDK.new(options)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `Hash` | SDK configuration options. |
| `options["base"]` | `String` | Base URL for API requests. |
| `options["prefix"]` | `String` | URL prefix appended after base. |
| `options["suffix"]` | `String` | URL suffix appended after path. |
| `options["headers"]` | `Hash` | Custom headers for all requests. |
| `options["feature"]` | `Hash` | Feature configuration. |
| `options["system"]` | `Hash` | System overrides (e.g. custom fetch). |


### Static Methods

#### `YuGiOhSDK.test(testopts = nil, sdkopts = nil)`

Create a test client with mock features active. Both arguments may be `nil`.

```ruby
client = YuGiOhSDK.test
```


### Instance Methods

#### `Cardinfo(data = nil)`

Create a new `Cardinfo` entity instance. Pass `nil` for no initial data.

#### `options_map -> Hash`

Return a deep copy of the current SDK options.

#### `get_utility -> Utility`

Return a copy of the SDK utility object.

#### `direct(fetchargs = {}) -> Hash`

Make a direct HTTP request to any API endpoint. Returns a result hash
(`{ "ok" => ..., "status" => ..., "data" => ..., "err" => ... }`); it
does not raise — inspect `result["ok"]`.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs["path"]` | `String` | URL path with optional `{param}` placeholders. |
| `fetchargs["method"]` | `String` | HTTP method (default: `"GET"`). |
| `fetchargs["params"]` | `Hash` | Path parameter values for `{param}` substitution. |
| `fetchargs["query"]` | `Hash` | Query string parameters. |
| `fetchargs["headers"]` | `Hash` | Request headers (merged with defaults). |
| `fetchargs["body"]` | `any` | Request body (hashes are JSON-serialized). |
| `fetchargs["ctrl"]` | `Hash` | Control options (e.g. `{ "explain" => true }`). |

**Returns:** `Hash`

#### `prepare(fetchargs = {}) -> Hash`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `direct()`. Raises on error.

**Returns:** `Hash` (the fetch definition; raises on error)


---

## CardinfoEntity

```ruby
cardinfo = client.Cardinfo
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `archetype` | `String` | No | The archetype the card belongs to |
| `atk` | `Integer` | No | ATK value (Monster cards only) |
| `attribute` | `String` | No | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `Hash` | No | Banlist status information for the card |
| `beta_name` | `String` | No | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `Array` | No | Array of card images including alternate artworks |
| `card_prices` | `Array` | No | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `Array` | No | Array of card sets this card appears in |
| `def` | `Integer` | No | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `String` | Yes | Card description/effect text |
| `downvotes` | `Integer` | No | Number of downvotes (only when misc=yes) |
| `formats` | `Array` | No | Available formats the card is in (only when misc=yes) |
| `frameType` | `String` | Yes | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `Integer` | No | Genesys format points code (only when format=genesys). |
| `has_effect` | `Integer` | No | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `Integer` | Yes | 8-digit passcode/ID of the card |
| `konami_id` | `Integer` | No | Konami ID of the card (only when misc=yes) |
| `level` | `Integer` | No | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `Array` | No | Link Markers (Link Monsters only) |
| `linkval` | `Integer` | No | Link value (Link Monsters only) |
| `md_rarity` | `String` | No | Master Duel rarity (only when misc=yes) |
| `name` | `String` | Yes | Name of the card |
| `ocg_date` | `String` | No | Original OCG release date (only when misc=yes) |
| `race` | `String` | No | Card race/type. |
| `scale` | `Integer` | No | Pendulum Scale value (Pendulum Monsters only) |
| `tcg_date` | `String` | No | Original TCG release date (only when misc=yes) |
| `treated_as` | `String` | No | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `type` | `String` | Yes | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `upvotes` | `Integer` | No | Number of upvotes (only when misc=yes) |
| `views` | `Integer` | No | Number of times card has been viewed in database (only when misc=yes) |
| `viewsweek` | `Integer` | No | Number of times card has been viewed this week (only when misc=yes) |
| `ygoprodeck_url` | `String` | No | URL to the card's page on YGOPRODeck |

### Operations

#### `list(reqmatch = nil, ctrl = nil) -> Array`

List entities matching the given criteria (call with no argument to list all). Returns an array. Raises on error.

```ruby
results = client.Cardinfo.list
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `CardinfoEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```ruby
client = YuGiOhSDK.new({
  "feature" => {
    "test" => { "active" => true },
  },
})
```

