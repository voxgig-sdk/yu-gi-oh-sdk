
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { YuGiOhSDK } from '..'


describe('exists', async () => {

  test('test-mode', () => {
    const testsdk = YuGiOhSDK.test()
    equal(testsdk instanceof YuGiOhSDK, true,
      'YuGiOhSDK.test() must return a client synchronously')
  })

})
