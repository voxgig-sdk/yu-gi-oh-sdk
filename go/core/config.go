package core

import (
	"sync"
)

// MakeConfig builds a fresh, fully materialised config map. Every call
// rebuilds the whole structure, so prefer SharedConfig unless you need a
// private copy you intend to mutate.
func MakeConfig() map[string]any {
	return map[string]any{
		"main": map[string]any{
			"name": "YuGiOh",
			"slug": "yu-gi-oh",
			"version": "0.0.1",
			"target": "go",
		},
		"feature": map[string]any{
			"ratelimit": map[string]any{
				"options": map[string]any{
					"active": false,
					"burst": 5,
					"rate": 5,
				},
				"optspec": map[string]any{
					"now": "`$FUNCTION`",
					"sleep": "`$FUNCTION`",
				},
				"strict": false,
				"transport": "wrap",
			},
			"retry": map[string]any{
				"options": map[string]any{
					"active": false,
					"factor": 2,
					"maxDelay": 2000,
					"minDelay": 50,
					"retries": 2,
					"statuses": []any{
						408,
						425,
						429,
						500,
						502,
						503,
						504,
					},
				},
				"optspec": map[string]any{
					"jitter": "`$BOOLEAN`",
					"sleep": "`$FUNCTION`",
				},
				"strict": false,
				"transport": "wrap",
			},
			"test": map[string]any{
				"options": map[string]any{
					"active": false,
				},
				"optspec": map[string]any{
					"entity": "`$MAP`",
					"net": "`$MAP`",
				},
				"strict": false,
				"transport": "base",
			},
			"timeout": map[string]any{
				"options": map[string]any{
					"active": false,
					"ms": 30000,
				},
				"optspec": map[string]any{
					"clearTimer": "`$FUNCTION`",
					"setTimer": "`$FUNCTION`",
				},
				"strict": false,
				"transport": "wrap",
			},
		},
		"options": map[string]any{
			"base": "https://db.ygoprodeck.com/api/v7",
			"headers": map[string]any{
				"content-type": "application/json",
			},
			"entity": map[string]any{
				"cardinfo": map[string]any{},
			},
		},
		"entity": map[string]any{
			"cardinfo": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "archetype",
						"title": "Archetype",
						"type": "`$STRING`",
						"short": "The archetype the card belongs to",
					},
					map[string]any{
						"name": "atk",
						"title": "Atk",
						"type": "`$INTEGER`",
						"short": "ATK value (Monster cards only)",
					},
					map[string]any{
						"name": "attribute",
						"title": "Attribute",
						"type": "`$STRING`",
						"short": "Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE)",
					},
					map[string]any{
						"name": "banlist_info",
						"title": "Banlist Info",
						"type": "`$OBJECT`",
						"short": "Banlist status information for the card",
					},
					map[string]any{
						"name": "beta_name",
						"title": "Beta Name",
						"type": "`$STRING`",
						"short": "Old/temporary/translated name (only when misc=yes)",
					},
					map[string]any{
						"name": "card_images",
						"title": "Card Images",
						"type": "`$ARRAY`",
						"short": "Array of card images including alternate artworks",
					},
					map[string]any{
						"name": "card_prices",
						"title": "Card Prices",
						"type": "`$ARRAY`",
						"short": "Array of card prices from various vendors (lowest price across all versions)",
					},
					map[string]any{
						"name": "card_sets",
						"title": "Card Sets",
						"type": "`$ARRAY`",
						"short": "Array of card sets this card appears in",
					},
					map[string]any{
						"name": "def",
						"title": "Def",
						"type": "`$INTEGER`",
						"short": "DEF value (Monster cards only, not Link Monsters)",
					},
					map[string]any{
						"name": "desc",
						"title": "Desc",
						"type": "`$STRING`",
						"req": true,
						"short": "Card description/effect text",
					},
					map[string]any{
						"name": "downvotes",
						"title": "Downvotes",
						"type": "`$INTEGER`",
						"short": "Number of downvotes (only when misc=yes)",
					},
					map[string]any{
						"name": "formats",
						"title": "Formats",
						"type": "`$ARRAY`",
						"short": "Available formats the card is in (only when misc=yes)",
					},
					map[string]any{
						"name": "frameType",
						"title": "Frame Type",
						"type": "`$STRING`",
						"req": true,
						"short": "The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.)",
					},
					map[string]any{
						"name": "genesys_points",
						"title": "Genesys Points",
						"type": "`$INTEGER`",
						"short": "Genesys format points code (only when format=genesys).",
					},
					map[string]any{
						"name": "has_effect",
						"title": "Has Effect",
						"type": "`$INTEGER`",
						"short": "Whether card has an actual text effect (1=true, 0=false) (only when misc=yes)",
					},
					map[string]any{
						"name": "id",
						"title": "Id",
						"type": "`$INTEGER`",
						"req": true,
						"short": "8-digit passcode/ID of the card",
					},
					map[string]any{
						"name": "konami_id",
						"title": "Konami Id",
						"type": "`$INTEGER`",
						"short": "Konami ID of the card (only when misc=yes)",
					},
					map[string]any{
						"name": "level",
						"title": "Level",
						"type": "`$INTEGER`",
						"short": "Level or RANK of the card (Monster cards only, not Link Monsters)",
					},
					map[string]any{
						"name": "linkmarkers",
						"title": "Linkmarkers",
						"type": "`$ARRAY`",
						"short": "Link Markers (Link Monsters only)",
					},
					map[string]any{
						"name": "linkval",
						"title": "Linkval",
						"type": "`$INTEGER`",
						"short": "Link value (Link Monsters only)",
					},
					map[string]any{
						"name": "md_rarity",
						"title": "Md Rarity",
						"type": "`$STRING`",
						"short": "Master Duel rarity (only when misc=yes)",
					},
					map[string]any{
						"name": "name",
						"title": "Name",
						"type": "`$STRING`",
						"req": true,
						"short": "Name of the card",
					},
					map[string]any{
						"name": "ocg_date",
						"title": "Ocg Date",
						"type": "`$STRING`",
						"short": "Original OCG release date (only when misc=yes)",
						"format": "date",
					},
					map[string]any{
						"name": "race",
						"title": "Race",
						"type": "`$STRING`",
						"short": "Card race/type.",
					},
					map[string]any{
						"name": "scale",
						"title": "Scale",
						"type": "`$INTEGER`",
						"short": "Pendulum Scale value (Pendulum Monsters only)",
					},
					map[string]any{
						"name": "tcg_date",
						"title": "Tcg Date",
						"type": "`$STRING`",
						"short": "Original TCG release date (only when misc=yes)",
						"format": "date",
					},
					map[string]any{
						"name": "treated_as",
						"title": "Treated As",
						"type": "`$STRING`",
						"short": "If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes)",
					},
					map[string]any{
						"name": "type",
						"title": "Type",
						"type": "`$STRING`",
						"req": true,
						"short": "The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.)",
					},
					map[string]any{
						"name": "upvotes",
						"title": "Upvotes",
						"type": "`$INTEGER`",
						"short": "Number of upvotes (only when misc=yes)",
					},
					map[string]any{
						"name": "views",
						"title": "Views",
						"type": "`$INTEGER`",
						"short": "Number of times card has been viewed in database (only when misc=yes)",
					},
					map[string]any{
						"name": "viewsweek",
						"title": "Viewsweek",
						"type": "`$INTEGER`",
						"short": "Number of times card has been viewed this week (only when misc=yes)",
					},
					map[string]any{
						"name": "ygoprodeck_url",
						"title": "Ygoprodeck Url",
						"type": "`$STRING`",
						"short": "URL to the card's page on YGOPRODeck",
						"format": "uri",
					},
				},
				"id": map[string]any{
					"field": "id",
					"name": "id",
				},
				"name": "cardinfo",
				"op": map[string]any{
					"list": map[string]any{
						"input": "data",
						"name": "list",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "GET",
								"orig": "/cardinfo.php",
								"segments": []any{
									map[string]any{
										"lit": "cardinfo.php",
									},
								},
								"parts": []any{
									"cardinfo.php",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.data`",
								},
								"args": map[string]any{
									"query": []any{
										map[string]any{
											"name": "archetype",
											"orig": "archetype",
											"type": "`$STRING`",
											"kind": "query",
											"example": "Blue-Eyes",
										},
										map[string]any{
											"name": "atk",
											"orig": "atk",
											"type": "`$STRING`",
											"kind": "query",
											"example": "2100",
										},
										map[string]any{
											"name": "attribute",
											"orig": "attribute",
											"type": "`$STRING`",
											"kind": "query",
											"example": "WIND",
										},
										map[string]any{
											"name": "banlist",
											"orig": "banlist",
											"type": "`$STRING`",
											"kind": "query",
											"example": "tcg",
										},
										map[string]any{
											"name": "cardset",
											"orig": "cardset",
											"type": "`$STRING`",
											"kind": "query",
											"example": "Metal Raiders",
										},
										map[string]any{
											"name": "dateregion",
											"orig": "dateregion",
											"type": "`$STRING`",
											"kind": "query",
											"example": "tcg",
										},
										map[string]any{
											"name": "def",
											"orig": "def",
											"type": "`$STRING`",
											"kind": "query",
											"example": "2000",
										},
										map[string]any{
											"name": "enddate",
											"orig": "enddate",
											"type": "`$STRING`",
											"kind": "query",
											"example": "2002-08-23",
										},
										map[string]any{
											"name": "fname",
											"orig": "fname",
											"type": "`$STRING`",
											"kind": "query",
											"example": "Wizard",
										},
										map[string]any{
											"name": "format",
											"orig": "format",
											"type": "`$STRING`",
											"kind": "query",
											"example": "Speed Duel",
										},
										map[string]any{
											"name": "has_effect",
											"orig": "has_effect",
											"type": "`$BOOLEAN`",
											"kind": "query",
										},
										map[string]any{
											"name": "id",
											"orig": "id",
											"type": "`$STRING`",
											"kind": "query",
											"example": "6983839",
										},
										map[string]any{
											"name": "konami_id",
											"orig": "konami_id",
											"type": "`$INTEGER`",
											"kind": "query",
										},
										map[string]any{
											"name": "level",
											"orig": "level",
											"type": "`$STRING`",
											"kind": "query",
											"example": "4",
										},
										map[string]any{
											"name": "link",
											"orig": "link",
											"type": "`$INTEGER`",
											"kind": "query",
										},
										map[string]any{
											"name": "linkmarker",
											"orig": "linkmarker",
											"type": "`$STRING`",
											"kind": "query",
											"example": "top,bottom",
										},
										map[string]any{
											"name": "misc",
											"orig": "misc",
											"type": "`$STRING`",
											"kind": "query",
										},
										map[string]any{
											"name": "name",
											"orig": "name",
											"type": "`$STRING`",
											"kind": "query",
											"example": "Dark Magician",
										},
										map[string]any{
											"name": "race",
											"orig": "race",
											"type": "`$STRING`",
											"kind": "query",
											"example": "Wyrm",
										},
										map[string]any{
											"name": "scale",
											"orig": "scale",
											"type": "`$INTEGER`",
											"kind": "query",
										},
										map[string]any{
											"name": "sort",
											"orig": "sort",
											"type": "`$STRING`",
											"kind": "query",
											"example": "name",
										},
										map[string]any{
											"name": "staple",
											"orig": "staple",
											"type": "`$STRING`",
											"kind": "query",
										},
										map[string]any{
											"name": "startdate",
											"orig": "startdate",
											"type": "`$STRING`",
											"kind": "query",
											"example": "2000-01-01",
										},
										map[string]any{
											"name": "tcgplayer_data",
											"orig": "tcgplayer_data",
											"type": "`$STRING`",
											"kind": "query",
										},
										map[string]any{
											"name": "type",
											"orig": "type",
											"type": "`$STRING`",
											"kind": "query",
											"example": "Spell Card",
										},
									},
								},
								"select": map[string]any{
									"exist": []any{
										"archetype",
										"atk",
										"attribute",
										"banlist",
										"cardset",
										"dateregion",
										"def",
										"enddate",
										"fname",
										"format",
										"has_effect",
										"id",
										"konami_id",
										"level",
										"link",
										"linkmarker",
										"misc",
										"name",
										"race",
										"scale",
										"sort",
										"staple",
										"startdate",
										"tcgplayer_data",
										"type",
									},
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
		},
	}
}

// The plugin definitions the model selected per feature, as []any so a
// feature package can consume them without core naming its types. Empty
// when no active feature declares active plugin groups for this target.
var featurePlugins = map[string][]any{
}

// FeaturePlugins is the definitions list for one feature's chain.
func FeaturePlugins(name string) []any {
	return featurePlugins[name]
}

var (
	sharedConfigOnce sync.Once
	sharedConfigVal  map[string]any
)

// SharedConfig returns the process-wide config, built once on first use.
// The SDK reads the config on every request and never writes to it, so one
// instance is shared by every client rather than rebuilt per client.
//
// The returned map is shared: treat it as read-only. Callers that need to
// mutate should use MakeConfig, which always returns a fresh copy.
func SharedConfig() map[string]any {
	sharedConfigOnce.Do(func() {
		sharedConfigVal = MakeConfig()
	})
	return sharedConfigVal
}

func makeFeature(name string) Feature {
	switch name {
	case "ratelimit":
		if NewRatelimitFeatureFunc != nil {
			return NewRatelimitFeatureFunc()
		}
	case "retry":
		if NewRetryFeatureFunc != nil {
			return NewRetryFeatureFunc()
		}
	case "test":
		if NewTestFeatureFunc != nil {
			return NewTestFeatureFunc()
		}
	case "timeout":
		if NewTimeoutFeatureFunc != nil {
			return NewTimeoutFeatureFunc()
		}
	default:
		if NewBaseFeatureFunc != nil {
			return NewBaseFeatureFunc()
		}
	}
	return nil
}
