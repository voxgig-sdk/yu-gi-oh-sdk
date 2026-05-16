<?php
declare(strict_types=1);

// YuGiOh SDK utility registration

require_once __DIR__ . '/../core/UtilityType.php';
require_once __DIR__ . '/Clean.php';
require_once __DIR__ . '/Done.php';
require_once __DIR__ . '/MakeError.php';
require_once __DIR__ . '/FeatureAdd.php';
require_once __DIR__ . '/FeatureHook.php';
require_once __DIR__ . '/FeatureInit.php';
require_once __DIR__ . '/Fetcher.php';
require_once __DIR__ . '/MakeFetchDef.php';
require_once __DIR__ . '/MakeContext.php';
require_once __DIR__ . '/MakeOptions.php';
require_once __DIR__ . '/MakeRequest.php';
require_once __DIR__ . '/MakeResponse.php';
require_once __DIR__ . '/MakeResult.php';
require_once __DIR__ . '/MakePoint.php';
require_once __DIR__ . '/MakeSpec.php';
require_once __DIR__ . '/MakeUrl.php';
require_once __DIR__ . '/Param.php';
require_once __DIR__ . '/PrepareAuth.php';
require_once __DIR__ . '/PrepareBody.php';
require_once __DIR__ . '/PrepareHeaders.php';
require_once __DIR__ . '/PrepareMethod.php';
require_once __DIR__ . '/PrepareParams.php';
require_once __DIR__ . '/PreparePath.php';
require_once __DIR__ . '/PrepareQuery.php';
require_once __DIR__ . '/ResultBasic.php';
require_once __DIR__ . '/ResultBody.php';
require_once __DIR__ . '/ResultHeaders.php';
require_once __DIR__ . '/TransformRequest.php';
require_once __DIR__ . '/TransformResponse.php';

YuGiOhUtility::setRegistrar(function (YuGiOhUtility $u): void {
    $u->clean = [YuGiOhClean::class, 'call'];
    $u->done = [YuGiOhDone::class, 'call'];
    $u->make_error = [YuGiOhMakeError::class, 'call'];
    $u->feature_add = [YuGiOhFeatureAdd::class, 'call'];
    $u->feature_hook = [YuGiOhFeatureHook::class, 'call'];
    $u->feature_init = [YuGiOhFeatureInit::class, 'call'];
    $u->fetcher = [YuGiOhFetcher::class, 'call'];
    $u->make_fetch_def = [YuGiOhMakeFetchDef::class, 'call'];
    $u->make_context = [YuGiOhMakeContext::class, 'call'];
    $u->make_options = [YuGiOhMakeOptions::class, 'call'];
    $u->make_request = [YuGiOhMakeRequest::class, 'call'];
    $u->make_response = [YuGiOhMakeResponse::class, 'call'];
    $u->make_result = [YuGiOhMakeResult::class, 'call'];
    $u->make_point = [YuGiOhMakePoint::class, 'call'];
    $u->make_spec = [YuGiOhMakeSpec::class, 'call'];
    $u->make_url = [YuGiOhMakeUrl::class, 'call'];
    $u->param = [YuGiOhParam::class, 'call'];
    $u->prepare_auth = [YuGiOhPrepareAuth::class, 'call'];
    $u->prepare_body = [YuGiOhPrepareBody::class, 'call'];
    $u->prepare_headers = [YuGiOhPrepareHeaders::class, 'call'];
    $u->prepare_method = [YuGiOhPrepareMethod::class, 'call'];
    $u->prepare_params = [YuGiOhPrepareParams::class, 'call'];
    $u->prepare_path = [YuGiOhPreparePath::class, 'call'];
    $u->prepare_query = [YuGiOhPrepareQuery::class, 'call'];
    $u->result_basic = [YuGiOhResultBasic::class, 'call'];
    $u->result_body = [YuGiOhResultBody::class, 'call'];
    $u->result_headers = [YuGiOhResultHeaders::class, 'call'];
    $u->transform_request = [YuGiOhTransformRequest::class, 'call'];
    $u->transform_response = [YuGiOhTransformResponse::class, 'call'];
});
