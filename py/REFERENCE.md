# YuGiOh Python SDK Reference

Complete API reference for the YuGiOh Python SDK.


## YuGiOhSDK

### Constructor

```python
from yugioh_sdk import YuGiOhSDK

client = YuGiOhSDK(options)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `dict` | SDK configuration options. |
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

#### `direct(fetchargs=None) -> dict`

Make a direct HTTP request to any API endpoint. Returns a result `dict` with `ok`, `status`, `headers`, and `data` (or `err` on failure). This escape hatch never raises — branch on `result["ok"]`.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs["path"]` | `str` | URL path with optional `{param}` placeholders. |
| `fetchargs["method"]` | `str` | HTTP method (default: `"GET"`). |
| `fetchargs["params"]` | `dict` | Path parameter values. |
| `fetchargs["query"]` | `dict` | Query string parameters. |
| `fetchargs["headers"]` | `dict` | Request headers (merged with defaults). |
| `fetchargs["body"]` | `any` | Request body (dicts are JSON-serialized). |

**Returns:** `result_dict`

#### `prepare(fetchargs=None) -> dict`

Prepare a fetch definition without sending. Returns the `fetchdef` and raises on error.


---

## CardinfoEntity

```python
cardinfo = client.Cardinfo()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `archetype` | `str` | No |  |
| `atk` | `int` | No |  |
| `attribute` | `str` | No |  |
| `banlist_info` | `dict` | No |  |
| `beta_name` | `str` | No |  |
| `card_images` | `list` | No |  |
| `card_prices` | `list` | No |  |
| `card_sets` | `list` | No |  |
| `def` | `int` | No |  |
| `desc` | `str` | Yes |  |
| `downvotes` | `int` | No |  |
| `formats` | `list` | No |  |
| `frameType` | `str` | Yes |  |
| `genesys_points` | `int` | No |  |
| `has_effect` | `int` | No |  |
| `id` | `int` | Yes |  |
| `konami_id` | `int` | No |  |
| `level` | `int` | No |  |
| `linkmarkers` | `list` | No |  |
| `linkval` | `int` | No |  |
| `md_rarity` | `str` | No |  |
| `name` | `str` | Yes |  |
| `ocg_date` | `str` | No |  |
| `race` | `str` | No |  |
| `scale` | `int` | No |  |
| `tcg_date` | `str` | No |  |
| `treated_as` | `str` | No |  |
| `type` | `str` | Yes |  |
| `upvotes` | `int` | No |  |
| `views` | `int` | No |  |
| `viewsweek` | `int` | No |  |
| `ygoprodeck_url` | `str` | No |  |

### Operations

#### `list(reqmatch=None, ctrl=None) -> list`

List entities matching the given criteria. The match is optional — call `list()` with no argument to list all records. Returns a list and raises on error.

```python
results = client.Cardinfo().list()
for cardinfo in results:
    print(cardinfo)
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

