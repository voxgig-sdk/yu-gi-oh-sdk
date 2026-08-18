<?php
declare(strict_types=1);

// YuGiOh SDK configuration

class YuGiOhConfig
{
    /** @var array<string,mixed>|null */
    private static ?array $shared_config = null;

    /**
     * Return the process-wide config, built once on first use. The SDK reads
     * the config on every request and never writes to it, so one instance is
     * shared by every client rather than rebuilt per client.
     *
     * PHP arrays are copy-on-write, so callers that do mutate the result get
     * their own copy and cannot disturb the shared one.
     */
    public static function shared_config(): array
    {
        if (self::$shared_config === null) {
            self::$shared_config = self::make_config();
        }
        return self::$shared_config;
    }

    /**
     * Build a fresh, fully materialised config array. Every call rebuilds the
     * whole structure, so prefer shared_config unless you need a private copy.
     */
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "YuGiOh",
            ],
            "feature" => [
                "test" => [
          'options' => [
            'active' => false,
          ],
        ],
            ],
            "options" => [
                "base" => "https://db.ygoprodeck.com/api/v7",
                "headers" => [
          'content-type' => 'application/json',
        ],
                "entity" => [
                    "cardinfo" => [],
                ],
            ],
            "entity" => [
        'cardinfo' => [
          'fields' => [
            [
              'name' => 'archetype',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'atk',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'attribute',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'banlist_info',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'beta_name',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'card_images',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'card_prices',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'card_sets',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'def',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'desc',
              'req' => true,
              'type' => '`$STRING`',
            ],
            [
              'name' => 'downvotes',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'formats',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'frameType',
              'req' => true,
              'type' => '`$STRING`',
            ],
            [
              'name' => 'genesys_points',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'has_effect',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'konami_id',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'level',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'linkmarkers',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'linkval',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'md_rarity',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'name',
              'req' => true,
              'type' => '`$STRING`',
            ],
            [
              'name' => 'ocg_date',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'race',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'scale',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'tcg_date',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'treated_as',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'type',
              'req' => true,
              'type' => '`$STRING`',
            ],
            [
              'name' => 'upvotes',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'views',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'viewsweek',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ygoprodeck_url',
              'type' => '`$STRING`',
            ],
          ],
          'name' => 'cardinfo',
          'op' => [
            'list' => [
              'input' => 'data',
              'name' => 'list',
              'points' => [
                [
                  'args' => [
                    'query' => [
                      [
                        'example' => 'Blue-Eyes',
                        'kind' => 'query',
                        'name' => 'archetype',
                        'orig' => 'archetype',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => '2100',
                        'kind' => 'query',
                        'name' => 'atk',
                        'orig' => 'atk',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'WIND',
                        'kind' => 'query',
                        'name' => 'attribute',
                        'orig' => 'attribute',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'tcg',
                        'kind' => 'query',
                        'name' => 'banlist',
                        'orig' => 'banlist',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'Metal Raiders',
                        'kind' => 'query',
                        'name' => 'cardset',
                        'orig' => 'cardset',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'tcg',
                        'kind' => 'query',
                        'name' => 'dateregion',
                        'orig' => 'dateregion',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => '2000',
                        'kind' => 'query',
                        'name' => 'def',
                        'orig' => 'def',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => '2002-08-23',
                        'kind' => 'query',
                        'name' => 'enddate',
                        'orig' => 'enddate',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'Wizard',
                        'kind' => 'query',
                        'name' => 'fname',
                        'orig' => 'fname',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'Speed Duel',
                        'kind' => 'query',
                        'name' => 'format',
                        'orig' => 'format',
                        'type' => '`$STRING`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'has_effect',
                        'orig' => 'has_effect',
                        'type' => '`$BOOLEAN`',
                      ],
                      [
                        'example' => '6983839',
                        'kind' => 'query',
                        'name' => 'id',
                        'orig' => 'id',
                        'type' => '`$STRING`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'konami_id',
                        'orig' => 'konami_id',
                        'type' => '`$INTEGER`',
                      ],
                      [
                        'example' => '4',
                        'kind' => 'query',
                        'name' => 'level',
                        'orig' => 'level',
                        'type' => '`$STRING`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'link',
                        'orig' => 'link',
                        'type' => '`$INTEGER`',
                      ],
                      [
                        'example' => 'top,bottom',
                        'kind' => 'query',
                        'name' => 'linkmarker',
                        'orig' => 'linkmarker',
                        'type' => '`$STRING`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'misc',
                        'orig' => 'misc',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'Dark Magician',
                        'kind' => 'query',
                        'name' => 'name',
                        'orig' => 'name',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'Wyrm',
                        'kind' => 'query',
                        'name' => 'race',
                        'orig' => 'race',
                        'type' => '`$STRING`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'scale',
                        'orig' => 'scale',
                        'type' => '`$INTEGER`',
                      ],
                      [
                        'example' => 'name',
                        'kind' => 'query',
                        'name' => 'sort',
                        'orig' => 'sort',
                        'type' => '`$STRING`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'staple',
                        'orig' => 'staple',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => '2000-01-01',
                        'kind' => 'query',
                        'name' => 'startdate',
                        'orig' => 'startdate',
                        'type' => '`$STRING`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'tcgplayer_data',
                        'orig' => 'tcgplayer_data',
                        'type' => '`$STRING`',
                      ],
                      [
                        'example' => 'Spell Card',
                        'kind' => 'query',
                        'name' => 'type',
                        'orig' => 'type',
                        'type' => '`$STRING`',
                      ],
                    ],
                  ],
                  'kind' => 'http',
                  'method' => 'GET',
                  'orig' => '/cardinfo.php',
                  'parts' => [
                    'cardinfo.php',
                  ],
                  'select' => [
                    'exist' => [
                      'archetype',
                      'atk',
                      'attribute',
                      'banlist',
                      'cardset',
                      'dateregion',
                      'def',
                      'enddate',
                      'fname',
                      'format',
                      'has_effect',
                      'id',
                      'konami_id',
                      'level',
                      'link',
                      'linkmarker',
                      'misc',
                      'name',
                      'race',
                      'scale',
                      'sort',
                      'staple',
                      'startdate',
                      'tcgplayer_data',
                      'type',
                    ],
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.data`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
      ],
        ];
    }


    public static function make_feature(string $name)
    {
        require_once __DIR__ . '/features.php';
        return YuGiOhFeatures::make_feature($name);
    }
}
