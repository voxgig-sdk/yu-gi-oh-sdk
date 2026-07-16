
import { BaseFeature } from './feature/base/BaseFeature'
import { TestFeature } from './feature/test/TestFeature'



const FEATURE_CLASS: Record<string, typeof BaseFeature> = {
   test: TestFeature,

}


class Config {

  makeFeature(this: any, fn: string) {
    const fc = FEATURE_CLASS[fn]
    const fi = new fc()
    // TODO: errors etc
    return fi
  }


  main = {
    name: 'ProjectName',
  }


  feature = {
     test:     {
      "options": {
        "active": false
      }
    },

  }


  options = {
    base: 'https://db.ygoprodeck.com/api/v7',

    headers: {
      "content-type": "application/json"
    },

    entity: {
      
      cardinfo: {
      },

    }
  }


  entity = {
    "cardinfo": {
      "fields": [
        {
          "active": true,
          "name": "archetype",
          "req": false,
          "type": "`$STRING`",
          "index$": 0
        },
        {
          "active": true,
          "name": "atk",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 1
        },
        {
          "active": true,
          "name": "attribute",
          "req": false,
          "type": "`$STRING`",
          "index$": 2
        },
        {
          "active": true,
          "name": "banlist_info",
          "req": false,
          "type": "`$OBJECT`",
          "index$": 3
        },
        {
          "active": true,
          "name": "beta_name",
          "req": false,
          "type": "`$STRING`",
          "index$": 4
        },
        {
          "active": true,
          "name": "card_image",
          "req": false,
          "type": "`$ARRAY`",
          "index$": 5
        },
        {
          "active": true,
          "name": "card_price",
          "req": false,
          "type": "`$ARRAY`",
          "index$": 6
        },
        {
          "active": true,
          "name": "card_set",
          "req": false,
          "type": "`$ARRAY`",
          "index$": 7
        },
        {
          "active": true,
          "name": "def",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 8
        },
        {
          "active": true,
          "name": "desc",
          "req": true,
          "type": "`$STRING`",
          "index$": 9
        },
        {
          "active": true,
          "name": "downvote",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 10
        },
        {
          "active": true,
          "name": "format",
          "req": false,
          "type": "`$ARRAY`",
          "index$": 11
        },
        {
          "active": true,
          "name": "frame_type",
          "req": true,
          "type": "`$STRING`",
          "index$": 12
        },
        {
          "active": true,
          "name": "genesys_point",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 13
        },
        {
          "active": true,
          "name": "has_effect",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 14
        },
        {
          "active": true,
          "name": "id",
          "req": true,
          "type": "`$INTEGER`",
          "index$": 15
        },
        {
          "active": true,
          "name": "konami_id",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 16
        },
        {
          "active": true,
          "name": "level",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 17
        },
        {
          "active": true,
          "name": "linkmarker",
          "req": false,
          "type": "`$ARRAY`",
          "index$": 18
        },
        {
          "active": true,
          "name": "linkval",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 19
        },
        {
          "active": true,
          "name": "md_rarity",
          "req": false,
          "type": "`$STRING`",
          "index$": 20
        },
        {
          "active": true,
          "name": "name",
          "req": true,
          "type": "`$STRING`",
          "index$": 21
        },
        {
          "active": true,
          "name": "ocg_date",
          "req": false,
          "type": "`$STRING`",
          "index$": 22
        },
        {
          "active": true,
          "name": "race",
          "req": false,
          "type": "`$STRING`",
          "index$": 23
        },
        {
          "active": true,
          "name": "scale",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 24
        },
        {
          "active": true,
          "name": "tcg_date",
          "req": false,
          "type": "`$STRING`",
          "index$": 25
        },
        {
          "active": true,
          "name": "treated_a",
          "req": false,
          "type": "`$STRING`",
          "index$": 26
        },
        {
          "active": true,
          "name": "type",
          "req": true,
          "type": "`$STRING`",
          "index$": 27
        },
        {
          "active": true,
          "name": "upvote",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 28
        },
        {
          "active": true,
          "name": "view",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 29
        },
        {
          "active": true,
          "name": "viewsweek",
          "req": false,
          "type": "`$INTEGER`",
          "index$": 30
        },
        {
          "active": true,
          "name": "ygoprodeck_url",
          "req": false,
          "type": "`$STRING`",
          "index$": 31
        }
      ],
      "name": "cardinfo",
      "op": {
        "list": {
          "input": "data",
          "name": "list",
          "points": [
            {
              "active": true,
              "args": {
                "query": [
                  {
                    "active": true,
                    "example": "Blue-Eyes",
                    "kind": "query",
                    "name": "archetype",
                    "orig": "archetype",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "2100",
                    "kind": "query",
                    "name": "atk",
                    "orig": "atk",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "WIND",
                    "kind": "query",
                    "name": "attribute",
                    "orig": "attribute",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "tcg",
                    "kind": "query",
                    "name": "banlist",
                    "orig": "banlist",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "Metal Raiders",
                    "kind": "query",
                    "name": "cardset",
                    "orig": "cardset",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "tcg",
                    "kind": "query",
                    "name": "dateregion",
                    "orig": "dateregion",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "2000",
                    "kind": "query",
                    "name": "def",
                    "orig": "def",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "2002-08-23",
                    "kind": "query",
                    "name": "enddate",
                    "orig": "enddate",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "Wizard",
                    "kind": "query",
                    "name": "fname",
                    "orig": "fname",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "Speed Duel",
                    "kind": "query",
                    "name": "format",
                    "orig": "format",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "kind": "query",
                    "name": "has_effect",
                    "orig": "has_effect",
                    "reqd": false,
                    "type": "`$BOOLEAN`"
                  },
                  {
                    "active": true,
                    "example": "6983839",
                    "kind": "query",
                    "name": "id",
                    "orig": "id",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "kind": "query",
                    "name": "konami_id",
                    "orig": "konami_id",
                    "reqd": false,
                    "type": "`$INTEGER`"
                  },
                  {
                    "active": true,
                    "example": "4",
                    "kind": "query",
                    "name": "level",
                    "orig": "level",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "kind": "query",
                    "name": "link",
                    "orig": "link",
                    "reqd": false,
                    "type": "`$INTEGER`"
                  },
                  {
                    "active": true,
                    "example": "top,bottom",
                    "kind": "query",
                    "name": "linkmarker",
                    "orig": "linkmarker",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "kind": "query",
                    "name": "misc",
                    "orig": "misc",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "Dark Magician",
                    "kind": "query",
                    "name": "name",
                    "orig": "name",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "Wyrm",
                    "kind": "query",
                    "name": "race",
                    "orig": "race",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "kind": "query",
                    "name": "scale",
                    "orig": "scale",
                    "reqd": false,
                    "type": "`$INTEGER`"
                  },
                  {
                    "active": true,
                    "example": "name",
                    "kind": "query",
                    "name": "sort",
                    "orig": "sort",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "kind": "query",
                    "name": "staple",
                    "orig": "staple",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "2000-01-01",
                    "kind": "query",
                    "name": "startdate",
                    "orig": "startdate",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "kind": "query",
                    "name": "tcgplayer_data",
                    "orig": "tcgplayer_data",
                    "reqd": false,
                    "type": "`$STRING`"
                  },
                  {
                    "active": true,
                    "example": "Spell Card",
                    "kind": "query",
                    "name": "type",
                    "orig": "type",
                    "reqd": false,
                    "type": "`$STRING`"
                  }
                ]
              },
              "method": "GET",
              "orig": "/cardinfo.php",
              "parts": [
                "cardinfo.php"
              ],
              "select": {
                "exist": [
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
                  "type"
                ]
              },
              "transform": {
                "req": "`reqdata`",
                "res": "`body`"
              },
              "index$": 0
            }
          ],
          "key$": "list"
        }
      },
      "relations": {
        "ancestors": []
      }
    }
  }
}


const config = new Config()

export {
  config
}

