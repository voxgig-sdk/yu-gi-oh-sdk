# YuGiOh Golang SDK Reference

Complete API reference for the YuGiOh Golang SDK.


## YuGiOhSDK

### Constructor

```go
func NewYuGiOhSDK(options map[string]any) *YuGiOhSDK
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `map[string]any` | SDK configuration options. |
| `options["base"]` | `string` | Base URL for API requests. |
| `options["prefix"]` | `string` | URL prefix appended after base. |
| `options["suffix"]` | `string` | URL suffix appended after path. |
| `options["headers"]` | `map[string]any` | Custom headers for all requests. |
| `options["feature"]` | `map[string]any` | Feature configuration. |
| `options["system"]` | `map[string]any` | System overrides (e.g. custom fetch). |


### Static Methods

#### `Test() *YuGiOhSDK`

No-arg convenience constructor for the common no-options test case.

```go
client := sdk.Test()
```

#### `TestSDK(testopts, sdkopts map[string]any) *YuGiOhSDK`

Test client with options. Both arguments may be `nil`.

```go
client := sdk.TestSDK(testopts, sdkopts)
```


### Instance Methods

#### `Cardinfo(data map[string]any) YuGiOhEntity`

Create a new `Cardinfo` entity instance. Pass `nil` for no initial data.

#### `OptionsMap() map[string]any`

Return a deep copy of the current SDK options.

#### `GetUtility() *Utility`

Return a copy of the SDK utility object.

#### `Direct(fetchargs map[string]any) (map[string]any, error)`

Make a direct HTTP request to any API endpoint.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs["path"]` | `string` | URL path with optional `{param}` placeholders. |
| `fetchargs["method"]` | `string` | HTTP method (default: `"GET"`). |
| `fetchargs["params"]` | `map[string]any` | Path parameter values for `{param}` substitution. |
| `fetchargs["query"]` | `map[string]any` | Query string parameters. |
| `fetchargs["headers"]` | `map[string]any` | Request headers (merged with defaults). |
| `fetchargs["body"]` | `any` | Request body (maps are JSON-serialized). |
| `fetchargs["ctrl"]` | `map[string]any` | Control options (e.g. `map[string]any{"explain": true}`). |

**Returns:** `(map[string]any, error)`

#### `Prepare(fetchargs map[string]any) (map[string]any, error)`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `Direct()`.

**Returns:** `(map[string]any, error)`


---

## CardinfoEntity

```go
cardinfo := client.Cardinfo(nil)
fmt.Println(cardinfo.GetName()) // "cardinfo"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `archetype` | `string` | No | The archetype the card belongs to |
| `atk` | `int` | No | ATK value (Monster cards only) |
| `attribute` | `string` | No | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `map[string]any` | No | Banlist status information for the card |
| `beta_name` | `string` | No | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `[]any` | No | Array of card images including alternate artworks |
| `card_prices` | `[]any` | No | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `[]any` | No | Array of card sets this card appears in |
| `def` | `int` | No | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `string` | Yes | Card description/effect text |
| `downvotes` | `int` | No | Number of downvotes (only when misc=yes) |
| `formats` | `[]any` | No | Available formats the card is in (only when misc=yes) |
| `frameType` | `string` | Yes | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `int` | No | Genesys format points code (only when format=genesys). |
| `has_effect` | `int` | No | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `int` | Yes | 8-digit passcode/ID of the card |
| `konami_id` | `int` | No | Konami ID of the card (only when misc=yes) |
| `level` | `int` | No | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `[]any` | No | Link Markers (Link Monsters only) |
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

#### `List(reqmatch, ctrl map[string]any) (any, error)`

List entities matching the given criteria. Returns an array.

```go
results, err := client.Cardinfo(nil).List(nil, nil)
if err != nil {
    panic(err)
}
fmt.Println(results)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `CardinfoEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```go
client := sdk.NewYuGiOhSDK(map[string]any{
    "feature": map[string]any{
        "test": map[string]any{"active": true},
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

