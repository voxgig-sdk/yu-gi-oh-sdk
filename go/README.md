# YuGiOh Golang SDK



The Golang SDK for the YuGiOh API — an entity-oriented client using standard Go conventions. No generics required; data flows as `map[string]any`.

It exposes the API as capitalised, semantic **Entities** — e.g. `client.Cardinfo(nil)` — each with the same small set of operations (`List`) instead of raw URL paths and query strings. You call meaning, not endpoints, which keeps the cognitive load low.

> Also generated from this model: `go-cli`, `go-mcp`, `lua`, `php`, `py`, `rb`, `ts` — see
> the [top-level README](../README.md).


## Install
```bash
go get github.com/voxgig-sdk/yu-gi-oh-sdk/go@latest
```

The Go module proxy resolves the version from the `go/vX.Y.Z` GitHub
release tag — see [Releases](https://github.com/voxgig-sdk/yu-gi-oh-sdk/releases) for the available versions.

To vendor from a local checkout instead, clone this repo alongside your
project and add a `replace` directive pointing at the checked-out
`go/` directory:

```bash
go mod edit -replace github.com/voxgig-sdk/yu-gi-oh-sdk/go=../yu-gi-oh-sdk/go
```


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### Quickstart

A complete program: create a client, then call the entity operations.
Each operation returns `(value, error)` — the value is the data itself
(there is no `{ok, data}` wrapper), so check `err` and use the value
directly.

```go
package main

import (
    "fmt"
    sdk "github.com/voxgig-sdk/yu-gi-oh-sdk/go"
)

func main() {
    client := sdk.New()

    // List cardinfo records — the value is the array of records itself.
    cardinfos, err := client.Cardinfo(nil).List(nil, nil)
    if err != nil {
        panic(err)
    }
    for _, item := range cardinfos.([]any) {
        fmt.Println(item)
    }
}
```


## Error handling

Every entity operation returns `(value, error)`. Check `err` before
using the value — there is no exception to catch:

```go
cardinfos, err := client.Cardinfo(nil).List(nil, nil)
if err != nil {
    // handle err
    return
}
_ = cardinfos
```

`Direct` follows the same `(value, error)` convention:

```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example_id"},
})
if err != nil {
    // handle err
}
_ = result
```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
if err != nil {
    panic(err)
}

if result["ok"] == true {
    fmt.Println(result["status"]) // 200
    fmt.Println(result["data"])   // response body
}
```

### Prepare a request without sending it

```go
fetchdef, err := client.Prepare(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "DELETE",
    "params": map[string]any{"id": "example"},
})
if err != nil {
    panic(err)
}

fmt.Println(fetchdef["url"])
fmt.Println(fetchdef["method"])
fmt.Println(fetchdef["headers"])
```

### Use test mode

Create a mock client for unit testing — no server required:

```go
client := sdk.Test()

cardinfo, err := client.Cardinfo(nil).List(
    nil, nil,
)
if err != nil {
    panic(err)
}
fmt.Println(cardinfo) // the returned mock data
```

### Use a custom fetch function

Replace the HTTP transport with your own function:

```go
mockFetch := func(url string, init map[string]any) (map[string]any, error) {
    return map[string]any{
        "status":     200,
        "statusText": "OK",
        "headers":    map[string]any{},
        "json": (func() any)(func() any {
            return map[string]any{"id": "mock01"}
        }),
    }, nil
}

client := sdk.NewYuGiOhSDK(map[string]any{
    "base": "http://localhost:8080",
    "system": map[string]any{
        "fetch": (func(string, map[string]any) (map[string]any, error))(mockFetch),
    },
})
```

### Run live tests

Create a `.env.local` file at the project root:

```
YU_GI_OH_TEST_LIVE=TRUE
```

Then run:

```bash
cd go && go test ./test/...
```


## Reference

### NewYuGiOhSDK

```go
func NewYuGiOhSDK(options map[string]any) *YuGiOhSDK
```

Creates a new SDK client.

| Option | Type | Description |
| --- | --- | --- |
| `"base"` | `string` | Base URL of the API server. |
| `"prefix"` | `string` | URL path prefix prepended to all requests. |
| `"suffix"` | `string` | URL path suffix appended to all requests. |
| `"feature"` | `map[string]any` | Feature activation flags. |
| `"extend"` | `[]any` | Additional Feature instances to load. |
| `"system"` | `map[string]any` | System overrides (e.g. custom `"fetch"` function). |

### TestSDK

```go
func TestSDK(testopts map[string]any, sdkopts map[string]any) *YuGiOhSDK
```

Creates a test-mode client with mock transport. Both arguments may be `nil`.

### YuGiOhSDK methods

| Method | Signature | Description |
| --- | --- | --- |
| `OptionsMap` | `() map[string]any` | Deep copy of current SDK options. |
| `GetUtility` | `() *Utility` | Copy of the SDK utility object. |
| `Prepare` | `(fetchargs map[string]any) (map[string]any, error)` | Build an HTTP request definition without sending. |
| `Direct` | `(fetchargs map[string]any) (map[string]any, error)` | Build and send an HTTP request. |
| `Cardinfo` | `(data map[string]any) YuGiOhEntity` | Create a Cardinfo entity instance. |

### Entity interface (YuGiOhEntity)

All entities implement the `YuGiOhEntity` interface.

| Method | Signature | Description |
| --- | --- | --- |
| `List` | `(reqmatch, ctrl map[string]any) (any, error)` | List entities matching the criteria. |
| `Data` | `(args ...any) any` | Get or set entity data. |
| `Match` | `(args ...any) any` | Get or set entity match criteria. |
| `Make` | `() Entity` | Create a new instance with the same options. |
| `GetName` | `() string` | Return the entity name. |

### Result shape

Entity operations return `(value, error)`. The `value` is the
operation's data **directly** — there is no wrapper:

| Operation | `value` |
| --- | --- |
| `List` | a `[]any` of entity records |

Check `err` first, then use the value directly (or the typed
`...Typed` variants, which return the entity's model struct and a typed
slice):

    cardinfo, err := client.Cardinfo(nil).List(map[string]any{/* fields */}, nil)
    if err != nil { /* handle */ }
    // cardinfo is the returned record

Only `Direct()` returns a response envelope — a `map[string]any` with
`"ok"`, `"status"`, `"headers"`, and `"data"` keys.

### Entities

#### Cardinfo

| Field | Description |
| --- | --- |
| `"archetype"` | The archetype the card belongs to |
| `"atk"` | ATK value (Monster cards only) |
| `"attribute"` | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `"banlist_info"` | Banlist status information for the card |
| `"beta_name"` | Old/temporary/translated name (only when misc=yes) |
| `"card_images"` | Array of card images including alternate artworks |
| `"card_prices"` | Array of card prices from various vendors (lowest price across all versions) |
| `"card_sets"` | Array of card sets this card appears in |
| `"def"` | DEF value (Monster cards only, not Link Monsters) |
| `"desc"` | Card description/effect text |
| `"downvotes"` | Number of downvotes (only when misc=yes) |
| `"formats"` | Available formats the card is in (only when misc=yes) |
| `"frameType"` | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `"genesys_points"` | Genesys format points code (only when format=genesys). |
| `"has_effect"` | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `"id"` | 8-digit passcode/ID of the card |
| `"konami_id"` | Konami ID of the card (only when misc=yes) |
| `"level"` | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `"linkmarkers"` | Link Markers (Link Monsters only) |
| `"linkval"` | Link value (Link Monsters only) |
| `"md_rarity"` | Master Duel rarity (only when misc=yes) |
| `"name"` | Name of the card |
| `"ocg_date"` | Original OCG release date (only when misc=yes) |
| `"race"` | Card race/type. |
| `"scale"` | Pendulum Scale value (Pendulum Monsters only) |
| `"tcg_date"` | Original TCG release date (only when misc=yes) |
| `"treated_as"` | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `"type"` | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `"upvotes"` | Number of upvotes (only when misc=yes) |
| `"views"` | Number of times card has been viewed in database (only when misc=yes) |
| `"viewsweek"` | Number of times card has been viewed this week (only when misc=yes) |
| `"ygoprodeck_url"` | URL to the card's page on YGOPRODeck |

Operations: List.

API path: `/cardinfo.php`



## Entities


### Cardinfo

Create an instance: `cardinfo := client.Cardinfo(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `List(match, ctrl)` | List entities matching the criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `archetype` | `string` | The archetype the card belongs to |
| `atk` | `int` | ATK value (Monster cards only) |
| `attribute` | `string` | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `map[string]any` | Banlist status information for the card |
| `beta_name` | `string` | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `[]any` | Array of card images including alternate artworks |
| `card_prices` | `[]any` | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `[]any` | Array of card sets this card appears in |
| `def` | `int` | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `string` | Card description/effect text |
| `downvotes` | `int` | Number of downvotes (only when misc=yes) |
| `formats` | `[]any` | Available formats the card is in (only when misc=yes) |
| `frameType` | `string` | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `int` | Genesys format points code (only when format=genesys). |
| `has_effect` | `int` | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `int` | 8-digit passcode/ID of the card |
| `konami_id` | `int` | Konami ID of the card (only when misc=yes) |
| `level` | `int` | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `[]any` | Link Markers (Link Monsters only) |
| `linkval` | `int` | Link value (Link Monsters only) |
| `md_rarity` | `string` | Master Duel rarity (only when misc=yes) |
| `name` | `string` | Name of the card |
| `ocg_date` | `string` | Original OCG release date (only when misc=yes) |
| `race` | `string` | Card race/type. |
| `scale` | `int` | Pendulum Scale value (Pendulum Monsters only) |
| `tcg_date` | `string` | Original TCG release date (only when misc=yes) |
| `treated_as` | `string` | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `type` | `string` | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `upvotes` | `int` | Number of upvotes (only when misc=yes) |
| `views` | `int` | Number of times card has been viewed in database (only when misc=yes) |
| `viewsweek` | `int` | Number of times card has been viewed this week (only when misc=yes) |
| `ygoprodeck_url` | `string` | URL to the card's page on YGOPRODeck |

#### Example: List

```go
cardinfos, err := client.Cardinfo(nil).List(nil, nil)
if err != nil {
    panic(err)
}
fmt.Println(cardinfos) // the array of records
```


## Advanced

> The sections above cover everyday use. The material below explains the
> SDK's internals — useful when extending it with custom features, but not
> needed for normal use.

### The operation pipeline

Every entity operation follows a six-stage pipeline. Each stage fires a
feature hook before executing:

```
PrePoint → PreSpec → PreRequest → PreResponse → PreResult → PreDone
```

- **PrePoint**: Resolves which API endpoint to call based on the
  operation name and entity configuration.
- **PreSpec**: Builds the HTTP spec — URL, method, headers, body —
  from the resolved point and the caller's parameters.
- **PreRequest**: Sends the HTTP request. Features can intercept here
  to replace the transport (as TestFeature does with mocks).
- **PreResponse**: Parses the raw HTTP response.
- **PreResult**: Extracts the business data from the parsed response.
- **PreDone**: Final stage before returning to the caller. Entity
  state (match, data) is updated here.

If any stage errors, the pipeline short-circuits and the error surfaces
to the caller — see [Error handling](#error-handling) for how that looks
in this language.

### Features and hooks

Features are the extension mechanism. A feature implements the
`Feature` interface and provides hooks — functions keyed by pipeline
stage names.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Data as maps

The Go SDK uses `map[string]any` throughout rather than typed structs.
This mirrors the dynamic nature of the API and keeps the SDK
flexible — no code generation is needed when the API schema changes.

Use `core.ToMapAny()` to safely cast results and nested data.

### Package structure

```
github.com/voxgig-sdk/yu-gi-oh-sdk/go/
├── yu-gi-oh.go        # Root package — type aliases and constructors
├── core/               # SDK core — client, types, pipeline
├── entity/             # Entity implementations
├── feature/            # Built-in features (Base, Test, Log)
├── utility/            # Utility functions and struct library
└── test/               # Test suites
```

The root package (`github.com/voxgig-sdk/yu-gi-oh-sdk/go`) re-exports everything needed
for normal use. Import sub-packages only when you need specific types
like `core.ToMapAny`.

### Entity state

Entity instances are stateful. After a successful `List`, the entity
stores the returned data and match criteria internally.

```go
cardinfo := client.Cardinfo(nil)
cardinfo.List(nil, nil)

// cardinfo.Data() now returns the cardinfo data from the last list
// cardinfo.Match() returns the last match criteria
```

Call `Make()` to create a fresh instance with the same configuration
but no stored state.

### Direct vs entity access

The entity interface handles URL construction, parameter placement,
and response parsing automatically. Use it for standard CRUD operations.

`Direct()` gives full control over the HTTP request. Use it for
non-standard endpoints, bulk operations, or any path not modelled as
an entity. `Prepare()` builds the request without sending it — useful
for debugging or custom transport.


## Full Reference

See [REFERENCE.md](REFERENCE.md) for complete API reference
documentation including all method signatures, entity field schemas,
and detailed usage examples.
