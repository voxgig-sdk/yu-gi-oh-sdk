
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { YuGiOhSDK } from '..'


describe('exists', async () => {

  test('test-mode', async () => {
    const testsdk = await YuGiOhSDK.test()
    equal(null !== testsdk, true)
  })

})
