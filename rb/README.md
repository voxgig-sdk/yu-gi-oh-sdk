# YuGiOh Ruby SDK



The Ruby SDK for the YuGiOh API — an entity-oriented client using idiomatic Ruby conventions.

The SDK exposes the API as capitalised, semantic **Entities** — for example `client.Cardinfo` — with named operations (`list`) instead of raw URL paths and query strings. Working with resources and verbs keeps call sites self-describing and reduces cognitive load.

> Other languages, the CLI, and MCP server live alongside this one — see
> the [top-level README](../README.md).


## Install
This package is not yet published to RubyGems. Install it from the
GitHub release tag (`rb/vX.Y.Z`):

- Releases: [https://github.com/voxgig-sdk/yu-gi-oh-sdk/releases](https://github.com/voxgig-sdk/yu-gi-oh-sdk/releases)


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```ruby
require_relative "YuGiOh_sdk"

client = YuGiOhSDK.new
```

### 2. List cardinfo records

```ruby
begin
  # list returns an Array of Cardinfo records — iterate directly.
  cardinfos = client.Cardinfo.list
  cardinfos.each do |item|
    puts "#{item["id"]} #{item["archetype"]}"
  end
rescue => err
  warn "list failed: #{err}"
end
```


## Error handling

Entity operations raise on failure, so rescue them:

```ruby
begin
  cardinfos = client.Cardinfo.list()
rescue => err
  warn "list failed: #{err}"
end
```

`direct` does **not** raise — it returns the result hash. Branch on
`ok`; on failure `status` holds the HTTP status (for error responses) and
`err` holds a transport error, so read both defensively:

```ruby
result = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example_id" },
})

warn "request failed: #{result["err"] || "HTTP #{result["status"]}"}" unless result["ok"]
```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```ruby
result = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})

if result["ok"]
  puts result["status"]  # 200
  puts result["data"]    # response body
else
  # On an HTTP error status there is no err (only a transport failure sets
  # it), so fall back to the status code.
  warn(result["err"] || "HTTP #{result["status"]}")
end
```

### Prepare a request without sending it

```ruby
begin
  fetchdef = client.prepare({
    "path" => "/api/resource/{id}",
    "method" => "DELETE",
    "params" => { "id" => "example" },
  })
  puts fetchdef["url"]
  puts fetchdef["method"]
  puts fetchdef["headers"]
rescue => err
  warn "prepare failed: #{err}"
end
```

### Use test mode

Create a mock client for unit testing — no server required:

```ruby
client = YuGiOhSDK.test

# Entity ops return the ENTITY (raises on error);
# call data_get for the mock record.
cardinfo = client.Cardinfo.list()
puts cardinfo
```

### Use a custom fetch function

Replace the HTTP transport with your own function:

```ruby
mock_fetch = ->(url, init) {
  return {
    "status" => 200,
    "statusText" => "OK",
    "headers" => {},
    "json" => ->() { { "id" => "mock01" } },
  }, nil
}

client = YuGiOhSDK.new({
  "base" => "http://localhost:8080",
  "system" => {
    "fetch" => mock_fetch,
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
cd rb && ruby -Itest -e "Dir['test/*_test.rb'].each { |f| require_relative f }"
```


## Reference

### YuGiOhSDK

```ruby
require_relative "YuGiOh_sdk"
client = YuGiOhSDK.new(options)
```

Creates a new SDK client.

| Option | Type | Description |
| --- | --- | --- |
| `base` | `String` | Base URL of the API server. |
| `prefix` | `String` | URL path prefix prepended to all requests. |
| `suffix` | `String` | URL path suffix appended to all requests. |
| `feature` | `Hash` | Feature activation flags. |
| `extend` | `Hash` | Additional Feature instances to load. |
| `system` | `Hash` | System overrides (e.g. custom `fetch` lambda). |

### test

```ruby
client = YuGiOhSDK.test(testopts, sdkopts)
```

Creates a test-mode client with mock transport. Both arguments may be `nil`.

### YuGiOhSDK methods

| Method | Signature | Description |
| --- | --- | --- |
| `options_map` | `() -> Hash` | Deep copy of current SDK options. |
| `get_utility` | `() -> Utility` | Copy of the SDK utility object. |
| `prepare` | `(fetchargs) -> Hash` | Build an HTTP request definition without sending. Raises on error. |
| `direct` | `(fetchargs) -> Hash` | Build and send an HTTP request. Returns a result hash (`result["ok"]`); does not raise. |
| `Cardinfo` | `(data) -> CardinfoEntity` | Create a Cardinfo entity instance. |

### Entity interface

All entities share the same interface.

| Method | Signature | Description |
| --- | --- | --- |
| `list` | `(reqmatch = nil, ctrl) -> Array` | List entities matching the criteria (call with no argument to list all). Raises on error. |
| `data_get` | `() -> Hash` | Get entity data. |
| `data_set` | `(data)` | Set entity data. |
| `match_get` | `() -> Hash` | Get entity match criteria. |
| `match_set` | `(match)` | Set entity match criteria. |
| `make` | `() -> Entity` | Create a new instance with the same options. |
| `get_name` | `() -> String` | Return the entity name. |

### Result shape

Entity operations return the result data directly. On failure they
raise a `YuGiOhError` (a `StandardError` subclass), so wrap
calls in `begin`/`rescue` where you need to handle errors.

The `direct` escape hatch is the exception: it never raises and instead
returns a result `Hash` with these keys:

| Key | Type | Description |
| --- | --- | --- |
| `ok` | `Boolean` | `true` if the HTTP status is 2xx. |
| `status` | `Integer` | HTTP status code. |
| `headers` | `Hash` | Response headers. |
| `data` | `any` | Parsed JSON response body. |
| `err` | `Error` | Present when `ok` is `false`. |

### Entities

#### Cardinfo

| Field | Description |
| --- | --- |
| `archetype` | The archetype the card belongs to |
| `atk` | ATK value (Monster cards only) |
| `attribute` | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | Banlist status information for the card |
| `beta_name` | Old/temporary/translated name (only when misc=yes) |
| `card_images` | Array of card images including alternate artworks |
| `card_prices` | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | Array of card sets this card appears in |
| `def` | DEF value (Monster cards only, not Link Monsters) |
| `desc` | Card description/effect text |
| `downvotes` | Number of downvotes (only when misc=yes) |
| `formats` | Available formats the card is in (only when misc=yes) |
| `frameType` | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | Genesys format points code (only when format=genesys). |
| `has_effect` | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | 8-digit passcode/ID of the card |
| `konami_id` | Konami ID of the card (only when misc=yes) |
| `level` | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | Link Markers (Link Monsters only) |
| `linkval` | Link value (Link Monsters only) |
| `md_rarity` | Master Duel rarity (only when misc=yes) |
| `name` | Name of the card |
| `ocg_date` | Original OCG release date (only when misc=yes) |
| `race` | Card race/type. |
| `scale` | Pendulum Scale value (Pendulum Monsters only) |
| `tcg_date` | Original TCG release date (only when misc=yes) |
| `treated_as` | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `type` | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `upvotes` | Number of upvotes (only when misc=yes) |
| `views` | Number of times card has been viewed in database (only when misc=yes) |
| `viewsweek` | Number of times card has been viewed this week (only when misc=yes) |
| `ygoprodeck_url` | URL to the card's page on YGOPRODeck |

Operations: List.

API path: `/cardinfo.php`



## Entities


### Cardinfo

Create an instance: `cardinfo = client.Cardinfo`

#### Operations

| Method | Description |
| --- | --- |
| `list(match)` | List entities matching the criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `archetype` | `String` | The archetype the card belongs to |
| `atk` | `Integer` | ATK value (Monster cards only) |
| `attribute` | `String` | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `Hash` | Banlist status information for the card |
| `beta_name` | `String` | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `Array` | Array of card images including alternate artworks |
| `card_prices` | `Array` | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `Array` | Array of card sets this card appears in |
| `def` | `Integer` | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `String` | Card description/effect text |
| `downvotes` | `Integer` | Number of downvotes (only when misc=yes) |
| `formats` | `Array` | Available formats the card is in (only when misc=yes) |
| `frameType` | `String` | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `Integer` | Genesys format points code (only when format=genesys). |
| `has_effect` | `Integer` | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `Integer` | 8-digit passcode/ID of the card |
| `konami_id` | `Integer` | Konami ID of the card (only when misc=yes) |
| `level` | `Integer` | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `Array` | Link Markers (Link Monsters only) |
| `linkval` | `Integer` | Link value (Link Monsters only) |
| `md_rarity` | `String` | Master Duel rarity (only when misc=yes) |
| `name` | `String` | Name of the card |
| `ocg_date` | `String` | Original OCG release date (only when misc=yes) |
| `race` | `String` | Card race/type. |
| `scale` | `Integer` | Pendulum Scale value (Pendulum Monsters only) |
| `tcg_date` | `String` | Original TCG release date (only when misc=yes) |
| `treated_as` | `String` | If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes) |
| `type` | `String` | The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.) |
| `upvotes` | `Integer` | Number of upvotes (only when misc=yes) |
| `views` | `Integer` | Number of times card has been viewed in database (only when misc=yes) |
| `viewsweek` | `Integer` | Number of times card has been viewed this week (only when misc=yes) |
| `ygoprodeck_url` | `String` | URL to the card's page on YGOPRODeck |

#### Example: List

```ruby
# list returns an Array of Cardinfo records (raises on error).
cardinfos = client.Cardinfo.list
```

## Features

This SDK ships 1 optional features. Each is **inactive until you
switch it on**, so an SDK you have not configured behaves exactly as if none of
them existed — no retries, no cache, no logging, no measurable overhead.

Activate a feature by name in the client options, alongside the options shown
above:

| Feature | What it does |
|---|---|
| [`test`](#test) | In-memory mock transport for testing without a live server |

### test

In-memory mock transport for testing without a live server.

| Option | Default |
|---|---|
| `active` | `false` |

Set `feature.test.active` to enable it, then override any of the options above.


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

Features are the extension mechanism. A feature is a Ruby class
with hook methods named after pipeline stages (e.g. `PrePoint`,
`PreSpec`). Each method receives the context.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Data as hashes

The Ruby SDK uses plain Ruby hashes throughout rather than typed
objects. This mirrors the dynamic nature of the API and keeps the
SDK flexible — no code generation is needed when the API schema
changes.

Use `Helpers.to_map()` to safely validate that a value is a hash.

### Module structure

```
rb/
├── YuGiOh_sdk.rb       -- Main SDK module
├── config.rb                  -- Configuration
├── features.rb                -- Feature factory
├── core/                      -- Core types and context
├── entity/                    -- Entity implementations
├── feature/                   -- Built-in features (Base, Test, Log)
├── utility/                   -- Utility functions and struct library
└── test/                      -- Test suites
```

The main module (`YuGiOh_sdk`) exports the SDK class
and test helper. Import entity or utility modules directly only
when needed.

### Entity state

Entity instances are stateful. After a successful `list`, the entity
stores the returned data and match criteria internally.

```ruby
cardinfo = client.Cardinfo
cardinfo.list()

# cardinfo.data_get now returns the cardinfo data from the last list
# cardinfo.match_get returns the last match criteria
```

Call `make` to create a fresh instance with the same configuration
but no stored state.

### Direct vs entity access

The entity interface handles URL construction, parameter placement,
and response parsing automatically. Use it for standard CRUD operations.

`direct` gives full control over the HTTP request. Use it for
non-standard endpoints, bulk operations, or any path not modelled as
an entity. `prepare` builds the request without sending it — useful
for debugging or custom transport.


## Full Reference

See [REFERENCE.md](REFERENCE.md) for complete API reference
documentation including all method signatures, entity field schemas,
and detailed usage examples.
