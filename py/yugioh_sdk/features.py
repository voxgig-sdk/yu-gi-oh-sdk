# YuGiOh SDK feature factory

from yugioh_sdk.feature.base_feature import YuGiOhBaseFeature
from yugioh_sdk.feature.test_feature import YuGiOhTestFeature


def _make_feature(name):
    features = {
        "base": lambda: YuGiOhBaseFeature(),
        "test": lambda: YuGiOhTestFeature(),
    }
    factory = features.get(name)
    if factory is not None:
        return factory()
    return features["base"]()
