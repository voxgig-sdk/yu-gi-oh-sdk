// Typed models for the YuGiOh SDK.
//
// GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
// params (op.<name>.points[].args.params[]). Field/param types come from the
// canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
// @voxgig/apidef VALID_CANON). Do not edit by hand.
package entity

import "encoding/json"

// Cardinfo is the typed data model for the cardinfo entity.
type Cardinfo struct {
	Archetype *string `json:"archetype,omitempty"`
	Atk *int `json:"atk,omitempty"`
	Attribute *string `json:"attribute,omitempty"`
	BanlistInfo *map[string]any `json:"banlist_info,omitempty"`
	BetaName *string `json:"beta_name,omitempty"`
	CardImage *[]any `json:"card_image,omitempty"`
	CardPrice *[]any `json:"card_price,omitempty"`
	CardSet *[]any `json:"card_set,omitempty"`
	Def *int `json:"def,omitempty"`
	Desc string `json:"desc"`
	Downvote *int `json:"downvote,omitempty"`
	Format *[]any `json:"format,omitempty"`
	FrameType string `json:"frame_type"`
	GenesysPoint *int `json:"genesys_point,omitempty"`
	HasEffect *int `json:"has_effect,omitempty"`
	Id int `json:"id"`
	KonamiId *int `json:"konami_id,omitempty"`
	Level *int `json:"level,omitempty"`
	Linkmarker *[]any `json:"linkmarker,omitempty"`
	Linkval *int `json:"linkval,omitempty"`
	MdRarity *string `json:"md_rarity,omitempty"`
	Name string `json:"name"`
	OcgDate *string `json:"ocg_date,omitempty"`
	Race *string `json:"race,omitempty"`
	Scale *int `json:"scale,omitempty"`
	TcgDate *string `json:"tcg_date,omitempty"`
	TreatedA *string `json:"treated_a,omitempty"`
	Type string `json:"type"`
	Upvote *int `json:"upvote,omitempty"`
	View *int `json:"view,omitempty"`
	Viewsweek *int `json:"viewsweek,omitempty"`
	YgoprodeckUrl *string `json:"ygoprodeck_url,omitempty"`
}

// CardinfoListMatch mirrors the cardinfo fields as an all-optional match
// filter (Go analog of Partial<Cardinfo>).
type CardinfoListMatch struct {
	Archetype *string `json:"archetype,omitempty"`
	Atk *int `json:"atk,omitempty"`
	Attribute *string `json:"attribute,omitempty"`
	BanlistInfo *map[string]any `json:"banlist_info,omitempty"`
	BetaName *string `json:"beta_name,omitempty"`
	CardImage *[]any `json:"card_image,omitempty"`
	CardPrice *[]any `json:"card_price,omitempty"`
	CardSet *[]any `json:"card_set,omitempty"`
	Def *int `json:"def,omitempty"`
	Desc *string `json:"desc,omitempty"`
	Downvote *int `json:"downvote,omitempty"`
	Format *[]any `json:"format,omitempty"`
	FrameType *string `json:"frame_type,omitempty"`
	GenesysPoint *int `json:"genesys_point,omitempty"`
	HasEffect *int `json:"has_effect,omitempty"`
	Id *int `json:"id,omitempty"`
	KonamiId *int `json:"konami_id,omitempty"`
	Level *int `json:"level,omitempty"`
	Linkmarker *[]any `json:"linkmarker,omitempty"`
	Linkval *int `json:"linkval,omitempty"`
	MdRarity *string `json:"md_rarity,omitempty"`
	Name *string `json:"name,omitempty"`
	OcgDate *string `json:"ocg_date,omitempty"`
	Race *string `json:"race,omitempty"`
	Scale *int `json:"scale,omitempty"`
	TcgDate *string `json:"tcg_date,omitempty"`
	TreatedA *string `json:"treated_a,omitempty"`
	Type *string `json:"type,omitempty"`
	Upvote *int `json:"upvote,omitempty"`
	View *int `json:"view,omitempty"`
	Viewsweek *int `json:"viewsweek,omitempty"`
	YgoprodeckUrl *string `json:"ygoprodeck_url,omitempty"`
}

// asMap turns a typed request/data struct into the map[string]any the
// runtime op pipeline consumes, honouring the json tags above.
func asMap(v any) map[string]any {
	out := map[string]any{}
	b, err := json.Marshal(v)
	if err != nil {
		return out
	}
	_ = json.Unmarshal(b, &out)
	return out
}

// typedFrom decodes a runtime value (a map[string]any produced by the op
// pipeline) into a typed model T via a JSON round-trip. On any error it
// returns the zero value of T; the op's own (value, error) tuple carries the
// real error.
func typedFrom[T any](v any) T {
	var out T
	if v == nil {
		return out
	}
	b, err := json.Marshal(v)
	if err != nil {
		return out
	}
	_ = json.Unmarshal(b, &out)
	return out
}

// typedSliceFrom decodes a runtime list value ([]any of maps) into a typed
// slice []T via a JSON round-trip, for list ops.
func typedSliceFrom[T any](v any) []T {
	var out []T
	if v == nil {
		return out
	}
	b, err := json.Marshal(v)
	if err != nil {
		return out
	}
	_ = json.Unmarshal(b, &out)
	return out
}
