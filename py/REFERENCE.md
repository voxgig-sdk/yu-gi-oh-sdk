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
| `archetype` | `str` | No | The archetype the card belongs to |
| `atk` | `int` | No | ATK value (Monster cards only) |
| `attribute` | `str` | No | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `dict` | No | Banlist status information for the card |
| `beta_name` | `str` | No | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `list` | No | Array of card images including alternate artworks |
| `card_prices` | `list` | No | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `list` | No | Array of card sets this card appears in |
| `def` | `int` | No | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `str` | Yes | Card description/effect text |
| `downvotes` | `int` | No | Number of downvotes (only when misc=yes) |
| `formats` | `list` | No | Available formats the card is in (only when misc=yes) |
| `frameType` | `str` | Yes | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `int` | No | Genesys format points code (only when format=genesys). |
| `has_effect` | `int` | No | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `int` | Yes | 8-digit passcode/ID of the card |
| `konami_id` | `int` | No | Konami ID of the card (only when misc=yes) |
| `level` | `int` | No | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `list` | No | Link Markers (Link Monsters only) |
| `linkval` | `int` | No | Link value (Link Monsters only) |
| `md_rarity` | `str` | No | Master Duel rarity (only when misc=yes) |
| `name` | `str` | Yes | Name of the card |
| `ocg_date` | `str` | No | Original OCG release date (only when misc=yes) |
| `race` | `str` | No | Card race/type. |
| `scale` | `int` | No | Pendulum Scale value (Pendulum Monsters only) |
| `tcg_date` | `str` | No | Original TCG release date (only when misc=yes) |
| `treated_as` | `str` | No | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `type` | `str` | Yes | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `upvotes` | `int` | No | Number of upvotes (only when misc=yes) |
| `views` | `int` | No | Number of times card has been viewed in database (only when misc=yes) |
| `viewsweek` | `int` | No | Number of times card has been viewed this week (only when misc=yes) |
| `ygoprodeck_url` | `str` | No | URL to the card's page on YGOPRODeck |

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

