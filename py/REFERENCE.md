# YuGiOh Python SDK Reference

Complete API reference for the YuGiOh Python SDK.


## YuGiOhSDK

### Constructor

```python
from yu-gi-oh_sdk import YuGiOhSDK

client = YuGiOhSDK(options)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `dict` | SDK configuration options. |
| `options["apikey"]` | `str` | API key for authentication. |
| `options["base"]` | `str` | Base URL for API requests. |
| `options["prefix"]` | `str` | URL prefix appended after base. |
| `options["suffix"]` | `str` | URL suffix appended after path. |
| `options["headers"]` | `dict` | Custom headers for all requests. |
| `options["feature"]` | `dict` | Feature configuration. |
| `options["system"]` | `dict` | System overrides (e.g. custom fetch). |


### Static Methods

#### `YuGiOhSDK.test(testopts=None, sdkopts=None)`

Create a test client with mock features active. Both arguments may be `None`.

```python
client = YuGiOhSDK.test()
```


### Instance Methods

#### `Cardinfo(data=None)`

Create a new `CardinfoEntity` instance. Pass `None` for no initial data.

#### `options_map() -> dict`

Return a deep copy of the current SDK options.

#### `get_utility() -> Utility`

Return a copy of the SDK utility object.

#### `direct(fetchargs=None) -> tuple`

Make a direct HTTP request to any API endpoint. Returns `(result, err)`.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs["path"]` | `str` | URL path with optional `{param}` placeholders. |
| `fetchargs["method"]` | `str` | HTTP method (default: `"GET"`). |
| `fetchargs["params"]` | `dict` | Path parameter values. |
| `fetchargs["query"]` | `dict` | Query string parameters. |
| `fetchargs["headers"]` | `dict` | Request headers (merged with defaults). |
| `fetchargs["body"]` | `any` | Request body (dicts are JSON-serialized). |

**Returns:** `(result_dict, err)`

#### `prepare(fetchargs=None) -> tuple`

Prepare a fetch definition without sending. Returns `(fetchdef, err)`.


---

## CardinfoEntity

```python
cardinfo = client.Cardinfo()
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

#### `list(reqmatch, ctrl=None) -> tuple`

List entities matching the given criteria. Returns an array.

```python
results, err = client.Cardinfo().list({})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `CardinfoEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```python
client = YuGiOhSDK({
    "feature": {
        "test": {"active": True},
    },
})
```

