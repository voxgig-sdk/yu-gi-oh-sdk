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
		},
		"feature": map[string]any{
			"test": map[string]any{
				"options": map[string]any{
					"active": false,
				},
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
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "atk",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "attribute",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "banlist_info",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "beta_name",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "card_images",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "card_prices",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "card_sets",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "def",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "desc",
						"req": true,
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "downvotes",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "formats",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "frameType",
						"req": true,
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "genesys_points",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "has_effect",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "konami_id",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "level",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "linkmarkers",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "linkval",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "md_rarity",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "name",
						"req": true,
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "ocg_date",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "race",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "scale",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "tcg_date",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "treated_as",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "type",
						"req": true,
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "upvotes",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "views",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "viewsweek",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ygoprodeck_url",
						"type": "`$STRING`",
					},
				},
				"name": "cardinfo",
				"op": map[string]any{
					"list": map[string]any{
						"input": "data",
						"name": "list",
						"points": []any{
							map[string]any{
								"args": map[string]any{
									"query": []any{
										map[string]any{
											"example": "Blue-Eyes",
											"kind": "query",
											"name": "archetype",
											"orig": "archetype",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "2100",
											"kind": "query",
											"name": "atk",
											"orig": "atk",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "WIND",
											"kind": "query",
											"name": "attribute",
											"orig": "attribute",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "tcg",
											"kind": "query",
											"name": "banlist",
											"orig": "banlist",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "Metal Raiders",
											"kind": "query",
											"name": "cardset",
											"orig": "cardset",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "tcg",
											"kind": "query",
											"name": "dateregion",
											"orig": "dateregion",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "2000",
											"kind": "query",
											"name": "def",
											"orig": "def",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "2002-08-23",
											"kind": "query",
											"name": "enddate",
											"orig": "enddate",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "Wizard",
											"kind": "query",
											"name": "fname",
											"orig": "fname",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "Speed Duel",
											"kind": "query",
											"name": "format",
											"orig": "format",
											"type": "`$STRING`",
										},
										map[string]any{
											"kind": "query",
											"name": "has_effect",
											"orig": "has_effect",
											"type": "`$BOOLEAN`",
										},
										map[string]any{
											"example": "6983839",
											"kind": "query",
											"name": "id",
											"orig": "id",
											"type": "`$STRING`",
										},
										map[string]any{
											"kind": "query",
											"name": "konami_id",
											"orig": "konami_id",
											"type": "`$INTEGER`",
										},
										map[string]any{
											"example": "4",
											"kind": "query",
											"name": "level",
											"orig": "level",
											"type": "`$STRING`",
										},
										map[string]any{
											"kind": "query",
											"name": "link",
											"orig": "link",
											"type": "`$INTEGER`",
										},
										map[string]any{
											"example": "top,bottom",
											"kind": "query",
											"name": "linkmarker",
											"orig": "linkmarker",
											"type": "`$STRING`",
										},
										map[string]any{
											"kind": "query",
											"name": "misc",
											"orig": "misc",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "Dark Magician",
											"kind": "query",
											"name": "name",
											"orig": "name",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "Wyrm",
											"kind": "query",
											"name": "race",
											"orig": "race",
											"type": "`$STRING`",
										},
										map[string]any{
											"kind": "query",
											"name": "scale",
											"orig": "scale",
											"type": "`$INTEGER`",
										},
										map[string]any{
											"example": "name",
											"kind": "query",
											"name": "sort",
											"orig": "sort",
											"type": "`$STRING`",
										},
										map[string]any{
											"kind": "query",
											"name": "staple",
											"orig": "staple",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "2000-01-01",
											"kind": "query",
											"name": "startdate",
											"orig": "startdate",
											"type": "`$STRING`",
										},
										map[string]any{
											"kind": "query",
											"name": "tcgplayer_data",
											"orig": "tcgplayer_data",
											"type": "`$STRING`",
										},
										map[string]any{
											"example": "Spell Card",
											"kind": "query",
											"name": "type",
											"orig": "type",
											"type": "`$STRING`",
										},
									},
								},
								"kind": "http",
								"method": "GET",
								"orig": "/cardinfo.php",
								"parts": []any{
									"cardinfo.php",
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
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.data`",
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
	case "test":
		if NewTestFeatureFunc != nil {
			return NewTestFeatureFunc()
		}
	default:
		if NewBaseFeatureFunc != nil {
			return NewBaseFeatureFunc()
		}
	}
	return nil
}
