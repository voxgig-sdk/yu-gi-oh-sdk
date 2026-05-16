package core

var UtilityRegistrar func(u *Utility)

var NewBaseFeatureFunc func() Feature

var NewTestFeatureFunc func() Feature

var NewCardinfoEntityFunc func(client *YuGiOhSDK, entopts map[string]any) YuGiOhEntity

