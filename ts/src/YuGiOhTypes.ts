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
  card_images?: any[]
  card_prices?: any[]
  card_sets?: any[]
  def?: number
  desc: string
  downvotes?: number
  formats?: any[]
  frameType: string
  genesys_points?: number
  has_effect?: number
  id: number
  konami_id?: number
  level?: number
  linkmarkers?: any[]
  linkval?: number
  md_rarity?: string
  name: string
  ocg_date?: string
  race?: string
  scale?: number
  tcg_date?: string
  treated_as?: string
  type: string
  upvotes?: number
  views?: number
  viewsweek?: number
  ygoprodeck_url?: string
}

export interface CardinfoListMatch {
  archetype?: string
  atk?: number
  attribute?: string
  banlist_info?: Record<string, any>
  beta_name?: string
  card_images?: any[]
  card_prices?: any[]
  card_sets?: any[]
  def?: number
  desc?: string
  downvotes?: number
  formats?: any[]
  frameType?: string
  genesys_points?: number
  has_effect?: number
  id?: number
  konami_id?: number
  level?: number
  linkmarkers?: any[]
  linkval?: number
  md_rarity?: string
  name?: string
  ocg_date?: string
  race?: string
  scale?: number
  tcg_date?: string
  treated_as?: string
  type?: string
  upvotes?: number
  views?: number
  viewsweek?: number
  ygoprodeck_url?: string
}

