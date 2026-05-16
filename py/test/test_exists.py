# ProjectName SDK exists test

import pytest
from yugioh_sdk import YuGiOhSDK


class TestExists:

    def test_should_create_test_sdk(self):
        testsdk = YuGiOhSDK.test(None, None)
        assert testsdk is not None
