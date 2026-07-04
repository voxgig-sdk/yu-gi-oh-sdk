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
const cardinfo = client.cardinfo
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

#### `list(match: object, ctrl?: object)`

List entities matching the given criteria. Returns an array.

```ts
const results = await client.cardinfo.list()
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

