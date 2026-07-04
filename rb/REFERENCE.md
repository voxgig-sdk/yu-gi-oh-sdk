# YuGiOh Ruby SDK Reference

Complete API reference for the YuGiOh Ruby SDK.


## YuGiOhSDK

### Constructor

```ruby
require_relative 'yu-gi-oh_sdk'

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
cardinfo = client.cardinfo
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

#### `list(reqmatch, ctrl = nil) -> Array`

List entities matching the given criteria. Returns an array. Raises on error.

```ruby
results = client.cardinfo.list(nil)
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

