// Typed models for the YuGiOh SDK.
//
// GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
// params (op.<name>.points[].args.params[]). Field/param types come from the
// canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
// @voxgig/apidef VALID_CANON). Do not edit by hand.

export interface Cardinfo {
  archetype?: string
  atk?: number
  attribute?: string
  banlist_info?: Record<string, any>
  beta_name?: string
  card_image?: any[]
  card_price?: any[]
  card_set?: any[]
  def?: number
  desc: string
  downvote?: number
  format?: any[]
  frame_type: string
  genesys_point?: number
  has_effect?: number
  id: number
  konami_id?: number
  level?: number
  linkmarker?: any[]
  linkval?: number
  md_rarity?: string
  name: string
  ocg_date?: string
  race?: string
  scale?: number
  tcg_date?: string
  treated_a?: string
  type: string
  upvote?: number
  view?: number
  viewsweek?: number
  ygoprodeck_url?: string
}

export interface CardinfoListMatch {
  archetype?: string
  atk?: number
  attribute?: string
  banlist_info?: Record<string, any>
  beta_name?: string
  card_image?: any[]
  card_price?: any[]
  card_set?: any[]
  def?: number
  desc?: string
  downvote?: number
  format?: any[]
  frame_type?: string
  genesys_point?: number
  has_effect?: number
  id?: number
  konami_id?: number
  level?: number
  linkmarker?: any[]
  linkval?: number
  md_rarity?: string
  name?: string
  ocg_date?: string
  race?: string
  scale?: number
  tcg_date?: string
  treated_a?: string
  type?: string
  upvote?: number
  view?: number
  viewsweek?: number
  ygoprodeck_url?: string
}

