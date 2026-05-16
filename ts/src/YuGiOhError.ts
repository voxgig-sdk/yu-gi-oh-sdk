
import { Context } from './Context'


class YuGiOhError extends Error {

  isYuGiOhError = true

  sdk = 'YuGiOh'

  code: string
  ctx: Context

  constructor(code: string, msg: string, ctx: Context) {
    super(msg)
    this.code = code
    this.ctx = ctx
  }

}

export {
  YuGiOhError
}

