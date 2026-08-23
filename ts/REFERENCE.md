# YuGiOh TypeScript SDK Reference

Complete API reference for the YuGiOh TypeScript SDK.


## YuGiOhSDK

### Constructor

```ts
new YuGiOhSDK(options?: object)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `object` | SDK configuration options. |
| `options.base` | `string` | Base URL for API requests. |
| `options.prefix` | `string` | URL prefix appended after base. |
| `options.suffix` | `string` | URL suffix appended after path. |
| `options.headers` | `object` | Custom headers for all requests. |
| `options.feature` | `object` | Feature configuration. |
| `options.system` | `object` | System overrides (e.g. custom fetch). |


### Static Methods

#### `YuGiOhSDK.test(testopts?, sdkopts?)`

Create a test client with mock features active.

```ts
const client = YuGiOhSDK.test()
```

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `testopts` | `object` | Test feature options. |
| `sdkopts` | `object` | Additional SDK options merged with test defaults. |

**Returns:** `YuGiOhSDK` instance in test mode.


### Instance Methods

#### `Cardinfo(data?: object)`

Create a new `Cardinfo` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `CardinfoEntity` instance.

#### `options()`

Return a deep copy of the current SDK options.

**Returns:** `object`

#### `utility()`

Return a copy of the SDK utility object.

**Returns:** `object`

#### `direct(fetchargs?: object)`

Make a direct HTTP request to any API endpoint.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs.path` | `string` | URL path with optional `{param}` placeholders. |
| `fetchargs.method` | `string` | HTTP method (default: `GET`). |
| `fetchargs.params` | `object` | Path parameter values for `{param}` substitution. |
| `fetchargs.query` | `object` | Query string parameters. |
| `fetchargs.headers` | `object` | Request headers (merged with defaults). |
| `fetchargs.body` | `any` | Request body (objects are JSON-serialized). |
| `fetchargs.ctrl` | `object` | Control options (e.g. `{ explain: true }`). |

**Returns:** `Promise<{ ok, status, headers, data } | Error>`

#### `prepare(fetchargs?: object)`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `direct()`.

**Returns:** `Promise<{ url, method, headers, body } | Error>`

#### `tester(testopts?, sdkopts?)`

Alias for `YuGiOhSDK.test()`.

**Returns:** `YuGiOhSDK` instance in test mode.


---

## CardinfoEntity

```ts
const cardinfo = client.Cardinfo()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `archetype` | `string` | No | The archetype the card belongs to |
| `atk` | `number` | No | ATK value (Monster cards only) |
| `attribute` | `string` | No | Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE) |
| `banlist_info` | `Record<string, any>` | No | Banlist status information for the card |
| `beta_name` | `string` | No | Old/temporary/translated name (only when misc=yes) |
| `card_images` | `any[]` | No | Array of card images including alternate artworks |
| `card_prices` | `any[]` | No | Array of card prices from various vendors (lowest price across all versions) |
| `card_sets` | `any[]` | No | Array of card sets this card appears in |
| `def` | `number` | No | DEF value (Monster cards only, not Link Monsters) |
| `desc` | `string` | Yes | Card description/effect text |
| `downvotes` | `number` | No | Number of downvotes (only when misc=yes) |
| `formats` | `any[]` | No | Available formats the card is in (only when misc=yes) |
| `frameType` | `string` | Yes | The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.) |
| `genesys_points` | `number` | No | Genesys format points code (only when format=genesys). |
| `has_effect` | `number` | No | Whether card has an actual text effect (1=true, 0=false) (only when misc=yes) |
| `id` | `number` | Yes | 8-digit passcode/ID of the card |
| `konami_id` | `number` | No | Konami ID of the card (only when misc=yes) |
| `level` | `number` | No | Level or RANK of the card (Monster cards only, not Link Monsters) |
| `linkmarkers` | `any[]` | No | Link Markers (Link Monsters only) |
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

#### `list(match: object, ctrl?: object)`

List entities matching the given criteria. Returns an array.

```ts
const results = await client.Cardinfo().list()
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `CardinfoEntity` instance with the same client and
options.

#### `client()`

Return the parent `YuGiOhSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```ts
const client = new YuGiOhSDK({
  feature: {
    test: { active: true },
  }
})
```

