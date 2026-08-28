# YuGiOh Lua SDK Reference

Complete API reference for the YuGiOh Lua SDK.


## YuGiOhSDK

### Constructor

```lua
local sdk = require("yu-gi-oh_sdk")
local client = sdk.new(options)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `table` | SDK configuration options. |
| `options.base` | `string` | Base URL for API requests. |
| `options.prefix` | `string` | URL prefix appended after base. |
| `options.suffix` | `string` | URL suffix appended after path. |
| `options.headers` | `table` | Custom headers for all requests. |
| `options.feature` | `table` | Feature configuration. |
| `options.system` | `table` | System overrides (e.g. custom fetch). |


### Static Methods

#### `sdk.test(testopts?, sdkopts?)`

Create a test client with mock features active. Both arguments are optional.

```lua
local client = sdk.test()
```


### Instance Methods

#### `Cardinfo(data)`

Create a new `Cardinfo` entity instance. Pass `nil` for no initial data.

#### `options_map() -> table`

Return a deep copy of the current SDK options.

#### `get_utility() -> Utility`

Return a copy of the SDK utility object.

#### `direct(fetchargs) -> table, err`

Make a direct HTTP request to any API endpoint.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs.path` | `string` | URL path with optional `{param}` placeholders. |
| `fetchargs.method` | `string` | HTTP method (default: `"GET"`). |
| `fetchargs.params` | `table` | Path parameter values for `{param}` substitution. |
| `fetchargs.query` | `table` | Query string parameters. |
| `fetchargs.headers` | `table` | Request headers (merged with defaults). |
| `fetchargs.body` | `any` | Request body (tables are JSON-serialized). |
| `fetchargs.ctrl` | `table` | Control options (e.g. `{ explain = true }`). |

**Returns:** `table, err`

#### `prepare(fetchargs) -> table, err`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `direct()`.

**Returns:** `table, err`


---

## CardinfoEntity

```lua
local cardinfo = client:Cardinfo(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `archetype` | `string` | No | The archetype the card belongs to |
| `atk` | `number` | No | ATK value (Monster cards only) |
| `attribute` | `string` | No | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `table` | No | Banlist status information for the card |
| `beta_name` | `string` | No | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `table` | No | Array of card images including alternate artworks |
| `card_prices` | `table` | No | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `table` | No | Array of card sets this card appears in |
| `def` | `number` | No | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `string` | Yes | Card description/effect text |
| `downvotes` | `number` | No | Number of downvotes (only when misc=yes) |
| `formats` | `table` | No | Available formats the card is in (only when misc=yes) |
| `frameType` | `string` | Yes | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `number` | No | Genesys format points code (only when format=genesys). |
| `has_effect` | `number` | No | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `number` | Yes | 8-digit passcode/ID of the card |
| `konami_id` | `number` | No | Konami ID of the card (only when misc=yes) |
| `level` | `number` | No | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `table` | No | Link Markers (Link Monsters only) |
| `linkval` | `number` | No | Link value (Link Monsters only) |
| `md_rarity` | `string` | No | Master Duel rarity (only when misc=yes) |
| `name` | `string` | Yes | Name of the card |
| `ocg_date` | `string` | No | Original OCG release date (only when misc=yes) |
| `race` | `string` | No | Card race/type. |
| `scale` | `number` | No | Pendulum Scale value (Pendulum Monsters only) |
| `tcg_date` | `string` | No | Original TCG release date (only when misc=yes) |
| `treated_as` | `string` | No | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `type` | `string` | Yes | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `upvotes` | `number` | No | Number of upvotes (only when misc=yes) |
| `views` | `number` | No | Number of times card has been viewed in database (only when misc=yes) |
| `viewsweek` | `number` | No | Number of times card has been viewed this week (only when misc=yes) |
| `ygoprodeck_url` | `string` | No | URL to the card's page on YGOPRODeck |

### Operations

#### `list(reqmatch, ctrl) -> any, err`

List entities matching the given criteria. Returns an array.

```lua
local results, err = client:Cardinfo():list()
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `CardinfoEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```lua
local client = sdk.new({
  feature = {
    test = { active = true },
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

