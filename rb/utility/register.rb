# YuGiOh SDK utility registration
require_relative '../core/utility_type'
require_relative 'clean'
require_relative 'done'
require_relative 'make_error'
require_relative 'feature_add'
require_relative 'feature_hook'
require_relative 'feature_init'
require_relative 'fetcher'
require_relative 'make_fetch_def'
require_relative 'make_context'
require_relative 'make_options'
require_relative 'make_request'
require_relative 'make_response'
require_relative 'make_result'
require_relative 'make_point'
require_relative 'make_spec'
require_relative 'make_url'
require_relative 'param'
require_relative 'prepare_auth'
require_relative 'prepare_body'
require_relative 'prepare_headers'
require_relative 'prepare_method'
require_relative 'prepare_params'
require_relative 'prepare_path'
require_relative 'prepare_query'
require_relative 'result_basic'
require_relative 'result_body'
require_relative 'result_headers'
require_relative 'transform_request'
require_relative 'transform_response'

YuGiOhUtility.registrar = ->(u) {
  u.clean = YuGiOhUtilities::Clean
  u.done = YuGiOhUtilities::Done
  u.make_error = YuGiOhUtilities::MakeError
  u.feature_add = YuGiOhUtilities::FeatureAdd
  u.feature_hook = YuGiOhUtilities::FeatureHook
  u.feature_init = YuGiOhUtilities::FeatureInit
  u.fetcher = YuGiOhUtilities::Fetcher
  u.make_fetch_def = YuGiOhUtilities::MakeFetchDef
  u.make_context = YuGiOhUtilities::MakeContext
  u.make_options = YuGiOhUtilities::MakeOptions
  u.make_request = YuGiOhUtilities::MakeRequest
  u.make_response = YuGiOhUtilities::MakeResponse
  u.make_result = YuGiOhUtilities::MakeResult
  u.make_point = YuGiOhUtilities::MakePoint
  u.make_spec = YuGiOhUtilities::MakeSpec
  u.make_url = YuGiOhUtilities::MakeUrl
  u.param = YuGiOhUtilities::Param
  u.prepare_auth = YuGiOhUtilities::PrepareAuth
  u.prepare_body = YuGiOhUtilities::PrepareBody
  u.prepare_headers = YuGiOhUtilities::PrepareHeaders
  u.prepare_method = YuGiOhUtilities::PrepareMethod
  u.prepare_params = YuGiOhUtilities::PrepareParams
  u.prepare_path = YuGiOhUtilities::PreparePath
  u.prepare_query = YuGiOhUtilities::PrepareQuery
  u.result_basic = YuGiOhUtilities::ResultBasic
  u.result_body = YuGiOhUtilities::ResultBody
  u.result_headers = YuGiOhUtilities::ResultHeaders
  u.transform_request = YuGiOhUtilities::TransformRequest
  u.transform_response = YuGiOhUtilities::TransformResponse
}
